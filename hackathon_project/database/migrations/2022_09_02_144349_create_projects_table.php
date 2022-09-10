<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title', 25)->nullable(false);
            $table->text('description')->nullable(false);
            $table->string('short_description', 80)->nullable(false);
            $table->text('motivation')->nullable(false);
            $table->text('requirements')->nullable(false);
            $table->integer('current_team')->default(0);
            $table->integer('total_team')->nullable(false);
            $table->boolean('active')->default(0);
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('projects');
    }
}
