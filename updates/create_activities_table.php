<?php namespace Vhiearch\UserActivity\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateActivitiesTable extends Migration
{

    public function up()
    {
        Schema::create('vhiearch_useractivity_activities', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('session_id');
            $table->integer('user_id')->unsigned()->nullable();

            $table->integer('activity_type_id');

            $table->string('model_id')->nullable();

            $table->timestamp('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('vhiearch_useractivity_activities');
    }

}
