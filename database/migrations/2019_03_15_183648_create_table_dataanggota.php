<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDataanggota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('data_anggota', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('email')->unique();
          $table->string('firm');
          $table->string('division');
          $table->string('api_token')->nullable();
          $table->rememberToken();
          $table->timestamps();
      });

      DB::table('data_anggota')->insert(
        array(
            'name' => 'Daniel Rio Christian',
            'email' => 'daniel41697@gmail.com',
            'firm' => 'PT Asuransi Jiwa Indonesia',
            'division' => 'Tax',
            'api_token' => ''
        )
    );

    DB::table('data_anggota')->insert(
      array(
          'name' => 'Cecep Budiman',
          'email' => 'c3budiman@gmail.com',
          'firm' => 'PT Asuransi Jiwa Indonesia',
          'division' => 'Tax',
          'api_token' => ''
      )
  );
  DB::table('data_anggota')->insert(
    array(
        'name' => 'Reza',
        'email' => 'reza@gmail.com',
        'firm' => 'PT Asuransi Jiwa Indonesia',
        'division' => 'Audit',
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
      Schema::dropIfExists('data_anggota');
    }
}
