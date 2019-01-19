<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    private $table_name = 'company';

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

                    $table->string('name', 128)->nullable(false)->comment('Name of a company');

                    $table->text('description')->nullable(true)->comment('Note about company...');

                    $table->tinyInteger('inactive')->nullable(true)->comment('If other than null than the company is inactive');

                    $table->unique('name');
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
