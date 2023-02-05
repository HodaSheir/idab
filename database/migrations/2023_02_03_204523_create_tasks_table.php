<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->nullable() ;
            $table->integer('project_id')->unsigned();
            $table->string('task_title');
            $table->text('task_desc') ;
            $table->enum('status',[ 'running' , 'cancelled' , 'not_assigned','completed'])->default('not_assigned') ;  
            $table->dateTime('duedate')->nullable(); 
            $table->dateTime('completed_at')->nullable();
            $table->boolean('assigned_by')->unsigned()->nullable(); 
            $table->boolean('created_by')->unsigned(); 
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
        Schema::dropIfExists('tasks');
    }
};
