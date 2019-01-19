<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkerTable extends Migration
{
    private $table_name = 'worker';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $migration = $this;

        if(!\Schema::hasTable($this->table_name)) {

            \Schema::table($this->table_name, function (Blueprint $table) use ($migration) {

                Schema::create($this->table_name, function (Blueprint $table) {

                    $table->integer('id', true, false)->size(11)->comment('Primary key');

                    $table->timestamps();

                    $table->integer('fk_company', false, false)->size(11)->nullable(false)->comment('Link worker to the company');

                    $table->string('first_name', 128)->nullable(false)->comment('First name of a worker');

                    $table->string('last_name', 128)->nullable(false)->comment('Last name of a worker');

                    $table->text('description')->nullable(true)->comment('Note about worker');

                    $table->tinyInteger('inactive')->nullable(true)->comment('If other than null than the worker is inactive');

                    $table->unique(['fk_company', 'first_name', 'last_name']);

                    $table->foreign('fk_company')->references('id')->on('company');
                });
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table_name);
    }
}
