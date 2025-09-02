<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('nodes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable(); // self reference
            $table->string('type')->default('module'); // module | content
            $table->string('heading')->nullable();
            $table->string('subheading')->nullable();
            $table->text('paragraph1')->nullable();
            $table->text('paragraph2')->nullable();
            $table->text('paragraph3')->nullable();
            $table->string('picture')->nullable();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('nodes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('nodes');
    }
};
