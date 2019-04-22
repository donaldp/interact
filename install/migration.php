<?php

use Illuminate\Database\Schema\Blueprint;
use Modulus\Hibernate\{Capsule, Migration};

class Don47InteractMessages extends Migration
{
  /**
   * Default connection
   *
   * @var string
   */
  protected $connection = 'channels';

  /**
   * Run the migrations.
   *
   * @return void
   */
  protected function up()
  {
    Capsule::schema()->create('don47_interact_messages', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->longText('data');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  protected function down()
  {
    Capsule::schema()->dropIfExists('don47_interact_messages');
  }
}
