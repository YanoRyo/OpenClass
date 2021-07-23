<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTeacherCategoryToTeachersCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teachers_category', function (Blueprint $table) {
            //
            $table->bigInteger('category_id')->unsigned()->after('teacher_id');
            $table->foreign('category_id')->references('id')->on('categorys')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teachers_category', function (Blueprint $table) {
            //
        });
    }
}
