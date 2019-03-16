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
            $table->unsignedInteger('division_id')->nullable();
            $table->string('api_token')->nullable();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('roles', function(Blueprint $kolom) {
          $kolom->increments('id');
          $kolom->string('namaRule');
        });

        Schema::create('division', function(Blueprint $kolom) {
          $kolom->increments('id');
          $kolom->string('namaDivisi');
        });

        Schema::table('users', function(Blueprint $kolom){
          $kolom->foreign('roles_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('users', function(Blueprint $kolom){
          $kolom->foreign('division_id')->references('id')->on('division')->onDelete('cascade')->onUpdate('cascade');
        });

        DB::table('roles')->insert(
          ['id' => 1, 'namaRule' => 'Super Admin']
        );
        DB::table('roles')->insert(
          ['id' => 2, 'namaRule' => 'Admin']
        );

        DB::table('division')->insert(
          ['id' => 1, 'namaDivisi' => 'Tax']
        );
        DB::table('division')->insert(
          ['id' => 2, 'namaDivisi' => 'Payroll, Accounting & Outsourcing']
        );
        DB::table('division')->insert(
          ['id' => 3, 'namaDivisi' => 'Corporate Finance']
        );
        DB::table('division')->insert(
          ['id' => 4, 'namaDivisi' => 'Audit']
        );

        DB::table('users')->insert(
          array(
              'name' => 'Daniel Rio Christian',
              'email' => 'daniel41697@gmail.com',
              'roles_id' => 1,
              'division_id' => 1,
              'password' => '$2y$12$PIyiHeR5BDSwwjUD8tA8NuoXxYY9ecA0OARz/rTVGl31HsmPTrV6G',
              'api_token' => ''
          )
      );

      DB::table('users')->insert(
        array(
            'name' => 'Daniel Rio',
            'email' => 'danieladmin@gmail.com',
            'roles_id' => 2,
            'division_id' => 1,
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
         Schema::dropIfExists('division');
     }
}
