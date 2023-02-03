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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')
                ->on('users');
            $table->string('thumbnail');
            $table->integer('coefficient')->nullable(0);
            $table->unsignedBigInteger('semester_id');
            $table->foreign('semester_id')->references('id')
                ->on('semesters');
            $table->timestamps();
            $table->unsignedBigInteger('teacher')->nullable();
            $table->foreign('teacher')->references('id')
                ->on('users');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
};
