<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->unsignedInteger('roles_id')->nullable();
            $table->string('api_token')->nullable();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('roles', function(Blueprint $kolom) {
          $kolom->increments('id');
          $kolom->string('namaRule');
        });

        Schema::table('users', function(Blueprint $kolom){
          $kolom->foreign('roles_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
        });

        DB::table('roles')->insert(
          ['id' => 1, 'namaRule' => 'Super Admin']
        );
        DB::table('roles')->insert(
          ['id' => 2, 'namaRule' => 'Admin']
        );

        DB::table('users')->insert(
          array(
              'name' => 'Daniel Rio Christian',
              'email' => 'daniel41697@gmail.com',
              'roles_id' => 1,
              'password' => '$2y$12$PIyiHeR5BDSwwjUD8tA8NuoXxYY9ecA0OARz/rTVGl31HsmPTrV6G',
              'api_token' => ''
          )
      );

      DB::table('users')->insert(
        array(
            'name' => 'Daniel Rio',
            'email' => 'danieladmin@gmail.com',
            'roles_id' => 2,
            'password' => '$2y$12$PIyiHeR5BDSwwjUD8tA8NuoXxYY9ecA0OARz/rTVGl31HsmPTrV6G',
            'api_token' => ''
        )
    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
         Schema::dropIfExists('users');
         Schema::dropIfExists('roles');
     }
}
