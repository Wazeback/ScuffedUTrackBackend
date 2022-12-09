<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('sprint_id');
            $table->foreignId('priority_id');
            $table->foreignId('status_id');
            $table->foreignId('subject_id');
            $table->string('title');
            $table->string('description');
            $table->integer('state')->nullable();
            $table->timestamp('duedate');
            $table->string('estimation');
            $table->string('spenttime')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('issues');
    }
}
