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
          $table->unsignedInteger('division_id')->nullable();
          $table->string('api_token')->nullable();
          $table->rememberToken();
          $table->timestamps();
      });

      Schema::create('division', function(Blueprint $kolom) {
        $kolom->increments('id');
        $kolom->string('namaDivisi');
      });

      Schema::table('data_anggota', function(Blueprint $kolom){
        $kolom->foreign('division_id')->references('id')->on('division')->onDelete('cascade')->onUpdate('cascade');
      });

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

      DB::table('data_anggota')->insert(
        array(
            'name' => 'Daniel Rio Christian',
            'email' => 'daniel41697@gmail.com',
            'firm' => 'PT Asuransi Jiwa Indonesia',
            'division_id' => 1,
            'api_token' => ''
        )
    );

    DB::table('data_anggota')->insert(
      array(
          'name' => 'Cecep Budiman',
          'email' => 'c3budiman@gmail.com',
          'firm' => 'PT Asuransi Jiwa Indonesia',
          'division_id' => 1,
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
      Schema::dropIfExists('division');
    }
}
