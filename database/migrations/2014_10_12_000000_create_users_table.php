<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 80);
            $table->string('username', 50)->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role');

            //personal detail
            $table->string('profile_picture')->nullable();
            $table->boolean('status')->default(0);

            $table->string('nip')->nullable();
            $table->string('nik')->nullable();
            $table->enum('gender', ['F', 'M']);
            $table->string('address')->nullable();
            $table->string('no_hp')->nullable();

            //personal detail
            $table->string('work_unit', 100)->nullable();
            $table->string('position_kpb', 80)->nullable();
            $table->string('position_department', 80)->nullable();


            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
