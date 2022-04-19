<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_requests', function (Blueprint $table) {
            $table->id();
            $table->string('serial');
            $table->unsignedBigInteger('user_id');
            $table->string('reference');

            $table->float('total_amount',14)->nullable();
            $table->integer('total_count')->nullable();
            $table->integer('rejected_count')->nullable();
            $table->bigInteger('rejected_amount')->nullable();
            $table->integer('accepted_count')->nullable();
            $table->bigInteger('accepted_amount')->nullable();



            $table->integer('failed_count')->nullable();
            $table->integer('success_count')->nullable();
            $table->float('total_amount_failed',14)->nullable();
            $table->float('total_amount_success',14)->nullable();

            $table->float('estimated_time')->nullable();
            $table->float('actual_time')->nullable();
            $table->enum("webhook_status",['sent', 'waiting'])->default('waiting');

            $table->enum('status', ['pending', 'started', 'treated'])->default('pending');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upload_requests');
    }
}
