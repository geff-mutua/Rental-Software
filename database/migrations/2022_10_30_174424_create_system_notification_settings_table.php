<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemNotificationSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_notification_settings', function (Blueprint $table) {
            $table->id();
            $table->timestamp('sms_date');
            $table->timestamp('invoice_date');
            $table->boolean('when_api_payment_received')->default(0);
            $table->boolean('when_invoices_created')->default(1);
            $table->boolean('when_mapping_failed')->default(1);
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
        Schema::dropIfExists('system_notification_settings');
    }
}
