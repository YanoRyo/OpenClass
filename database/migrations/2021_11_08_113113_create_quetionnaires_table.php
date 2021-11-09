<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuetionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quetionnaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumInteger('que_1')->nullable();
            $table->mediumInteger('que_2')->nullable();
            $table->mediumInteger('que_3')->nullable();
            $table->mediumInteger('que_4')->nullable();
            $table->mediumInteger('que_5')->nullable();
            $table->text('if_text1')->nullable();
            $table->text('if_text2')->nullable();
            $table->text('better_text')->nullable();
            $table->text('comment')->nullable();
            $table->unsignedInteger('class_id')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quetionnaires');
    }
}
