<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('image')->nullable(); //画像投稿しない場合に備えてNULL許可しておく
            $table->string('email')->nullable();
            $table->string('teacher_category')->nullable();
            $table->string('archive_teacher')->nullable();
            $table->string('introduce')->nullable();
            // $table->timestamps()としてしまうと、レコードが作成された日時が入らないので、DB:rawで行う
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
          Schema::table('teachers', function (Blueprint $table) {
            $table->dropForeign('teachers_category_id_foreign');
        });
    }
}
