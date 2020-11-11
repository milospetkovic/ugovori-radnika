<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewColumnsForWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('worker', function (Blueprint $table) {
            $table->date('active_until_date')->nullable()->after('jmbg')->comment('Date until worker should be marked as active');
            $table->tinyInteger('ignore_contract_ended_notification')->nullable()->after('active_until_date')->comment('If flag is active then cron will not notify android users that contract is ended for the worker');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
