<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id')->conatrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('rent');
            $table->string('month');
            $table->string('total');
            $table->string('paid')->nullable();
            $table->string('balance')->nullable();
            $table->string('reference')->nullable();
            $table->string('year');
            $table->string('bf')->nullable();
            $table->string('status')->nullable();// paid, unpaid, partial, overdue
            $table->unsignedBigInteger('property_id')->conatrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('rents');
    }
}
