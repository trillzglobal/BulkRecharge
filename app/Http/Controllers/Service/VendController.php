<?php

namespace App\Http\Controllers\Service;

use App\Exports\DataPackageExport;
use App\Exports\SampleDataExport;
use App\Http\Controllers\Controller;
use App\Models\AirtimeShortcode;
use App\Models\DataPackage;
use App\Models\PreLoadStore;
use App\Models\UploadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use stdClass;

class VendController extends Controller
{
    //

    public function uploadData(Request $request)
    {

        $data =  $this->getArray($request, ["serial", "phone_number", "amount", "period"]);

        if (empty($data) || $data == false) {
            return failed('No data to treat', []);
        }

        $array = $data["array"];


        $user_id =  $this->authUser()->id;

        if (!$user_id) {
            return failed('User is not allowed to perform transaction', []);
        }

        if (!$array || count($array) < 1) {
            return failed('Transaction cannot be treated', []);
        }

        //Create record on Upload Table
        $data = [
            'reference' => $data["reference"],
            'user_id' => $user_id,
            'type' => 2
        ];
        $upload_id = UploadRequest::insertGetId($data);

        $total_amount = 0;
        $total_count = 0;
        $rejected_count = 0;
        $accepted_count = 0;
        $rejected_amount = 0;
        $accepted_amount = 0;
        $success = [];
        $errors = [];

        foreach ($array as $arr) {

            $serial = $arr[0];
            $phone_number = $arr[1];
            $amount = $arr[2];
            $period = $arr[3];

            $network =  $this->getNumberDetails($phone_number);
            $account = $network['account'];
            $mno_id = $network['mno_id'];
            if (!$network or !$account or strlen($account) < 10 or strlen($account) > 11 or !\is_numeric($amount) or $amount <= 0) {
                $errors[] = [
                    'phone_number' => $account,
                    "amount" => $amount,
                    "validity" => $period,
                    "reject_reason" => "Error in formatting"
                ];
                $rejected_count++;
                if (\is_numeric($amount) or $amount >= 0) {
                    $rejected_amount += $amount;
                }
            } else {

                //Confirm if Data type Exist for MNO
                $package_exist = DataPackage::where('amount', $amount)
                    ->where('validity', $period)
                    ->first();

                if (!$package_exist) {
                    $errors[] = [
                        'phone_number' => $account,
                        "amount" => $amount,
                        "validity" => $period,
                        "reject_reason" => "Selected Package does not exist"
                    ];
                    $rejected_count++;
                    if (\is_numeric($amount) or $amount >= 0) {
                        $rejected_amount += $amount;
                    }
                } else {

                    $accepted_amount += $amount;
                    $accepted_count++;
                    $transaction_id = $this->getTransactionId('pre_load_stores');
                    //                    $transaction_id = 1550;
                    $success[] = ["serial" => $serial, "transaction_id" => $transaction_id, "upload_request_id" => $upload_id, "msisdn" => $account, "type" => 2, "m_n_o_id" => $mno_id, 'amount' => $amount, 'data_package_id' => $package_exist->id];
                    //                    dd($success);
                }
            }
        }

        $total_amount = $accepted_amount + $rejected_amount;
        $total_count = $accepted_count + $rejected_count;
        $eta = $accepted_count * 5;
        $data = [
            "total_amount" => $total_amount,
            "total_count" => $total_count,
            "rejected_count" => $rejected_count,
            "rejected_amount" => $rejected_amount,
            "accepted_amount" => $accepted_amount,
            "accepted_count" => $accepted_count,
            "estimated_time" => $eta
        ];
        UploadRequest::where('id', $upload_id)->update($data);

        $data = ["rejected" => $errors, "accepted" => $success, "summary" => $data];

        if (empty($success)) {

            return failed("No accepted transaction", $data);
        }
        $this->saveData($success, PreLoadStore::class);

        return success("transaction accepted", $data);
    }



    private function getNumberDetails($account, $country_code = 234)
    {
        //Remove plus
        if (Str::startsWith($account, ['+'])) {
            $account = Str::substr($account, 1, strlen($account));
        }

        //Remove country code 1
        if (Str::startsWith($account, [$country_code . '0'])) {
            $account = '0' . Str::substr($account, strlen($country_code) + 1, strlen($account));
        }

        //Remove country code 2
        if (Str::startsWith($account, [$country_code])) {
            $account = '0' . Str::substr($account, strlen($country_code), strlen($account));
        }

        if (!Str::startsWith($account, ['0'])) {
            $account = '0' . $account;
        }

        $code = substr($account, 0, 4);
        $network = AirtimeShortcode::where('short_code', $code)->first();
        if (!$network) {
            return false;
        }
        $details = ['account' => $account, 'mno_id' => $network->m_n_o_s->id];
        return $details;
    }


    protected function saveData($data, $model)
    {

        $save = $model::insert($data);
        return $save;
    }

    public function get_data_package()
    {
        return Excel::download(new DataPackageExport, 'Data_packages_sample_data.csv');
    }

    public function get_sample_data()
    {
        return Excel::download(new SampleDataExport, 'sample_data.csv');
    }



    public function uploadAirtime(Request $request)
    {

        $data = $this->getArray($request, ["serial", "phone_number", "amount"]);
        /*check if the file  is coming as an array of data or as Excel CSV
         *
         *
        */
        $array = $data["array"];

        if (empty($data) || $data == false) {
            return failed('No data to treat', []);
        }

        $user_id =  $this->authUser()->id;

        if (!$user_id) {
            return failed('User is not allowed to perform transaction', []);
        }

        if (!$array || count($array) < 1) {
            return failed('Transaction cannot be treated', []);
        }

        //Create record on Upload Table
        $data = [
            'reference' => $data["reference"],
            'user_id' => $user_id,
            'type' => 1
        ];
        $upload_id = UploadRequest::insertGetId($data);

        $total_amount = 0;
        $total_count = 0;
        $rejected_count = 0;
        $accepted_count = 0;
        $rejected_amount = 0;
        $accepted_amount = 0;
        $success = [];
        $errors = [];

        foreach ($array as $arr) {

            $serial = $arr[0];
            $phone_number = $arr[1];
            $amount = $arr[2];

            $network =  $this->getNumberDetails($phone_number);
            $account = $network['account'];
            $mno_id = $network['mno_id'];
            if (!$network or !$account or strlen($account) < 10 or strlen($account) > 11 or !\is_numeric($amount) or $amount <= 0) {
                $errors[] = [
                    'phone_number' => $account,
                    "amount" => $amount,
                    "reject_reason" => "Error in formatting"
                ];
                $rejected_count++;
                if (\is_numeric($amount) or $amount >= 0) {
                    $rejected_amount += $amount;
                }
            } else {


                $accepted_amount += $amount;
                $accepted_count++;
                $transaction_id = $this->getTransactionId('pre_load_airtime_stores');
                //                    $transaction_id = 1550;
                $success[] = ["serial" => $serial, "transaction_id" => $transaction_id, "upload_request_id" => $upload_id, "msisdn" => $account, "type" => 1, "m_n_o_id" => $mno_id, 'amount' => $amount];
                //                 
            }
        }


        $total_amount = $accepted_amount + $rejected_amount;
        $total_count = $accepted_count + $rejected_count;
        $eta = $accepted_count * 5;
        $data = [
            "total_amount" => $total_amount,
            "total_count" => $total_count,
            "rejected_count" => $rejected_count,
            "rejected_amount" => $rejected_amount,
            "accepted_amount" => $accepted_amount,
            "accepted_count" => $accepted_count,
            "estimated_time" => $eta
        ];
        UploadRequest::where('id', $upload_id)->update($data);

        $data = ["rejected" => $errors, "accepted" => $success, "summary" => $data];

        if (empty($success)) {

            return failed("No accepted transaction", $data);
        }
        $this->saveData($success, PreLoadStore::class);

        return success("transaction accepted", $data);
    }


    private function getArray($request, array $arr)
    {
        if ($request->has(['csv_file', 'details'])) {
            return failed('Request cannot contain both type of body', []);
        }

        if ($request->has(['csv_file'])) {

            $this->validate(request(['reference', 'csv_file']), config('rules.upload'));
            $reference = $request->reference;


            // Get the csv rows as an array
            $theArray = \Excel::toArray(new stdClass(), $request->file('csv_file'));
            $array = $theArray[0];

            $header =  $array[0];
            if ($header != $arr) {
                return failed("Arrange input as stated in csv file", []);
            }
            array_shift($array);

            return ["array" => $array, "reference" => $reference];
        }

        if ($request->has('details')) {

            $this->validate(request(['reference', 'details']), config('rules.upload_details'));
            $reference = $request->reference;
            $request = $request->all();

            return ["array" => $request["details"], "reference" => $reference];
        }


        return false;
    }
}
