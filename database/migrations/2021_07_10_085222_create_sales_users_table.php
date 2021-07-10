<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('emailAddress')->nullable();
            $table->string('telephoneNumbers')->nullable();
            $table->dateTime('joinedDates')->nullable();
            $table->string('currentRoutes')->nullable();
            $table->text('comments')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_users');
    }
}
