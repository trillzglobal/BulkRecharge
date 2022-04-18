<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_packages', function (Blueprint $table) {
            $table->id();
            $table->string('mno');
            $table->unsignedBigInteger('mno_id');
            $table->enum('validity',['M','W','D']);
            $table->string('description')->nullable();
            $table->float('amount');
            $table->float('code');
            $table->softDeletes();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

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
        Schema::dropIfExists('data_packages');
    }
}
