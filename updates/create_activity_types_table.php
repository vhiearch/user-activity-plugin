<?php namespace Vhiearch\UserActivity\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateActivityTypesTable extends Migration
{

    public function up()
    {
        Schema::create('vhiearch_useractivity_activity_types', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vhiearch_useractivity_activity_types');
    }

}
