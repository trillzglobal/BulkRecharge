<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreLoadStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_load_stores', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id')->unique();
            $table->unsignedBigInteger('upload_requests_id');
            $table->unsignedBigInteger('mno_id');
            $table->string('msisdn');
            $table->string('amount');
            $table->integer('type');
            $table->unsignedBigInteger('data_package_id');
            $table->enum('status', ['failed', 'success', 'pending'])->default('pending');
            $table->string('comm')->nullable();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->foreign('upload_requests_id')->references('id')->on('upload_requests');
            $table->foreign('data_package_id')->references('id')->on('data_packages');
            $table->foreign('mno_id')->references('id')->on('m_n_o_s');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pre_load_stores');
    }
}
