<?php

namespace Don47\Interact;

use Carbon\Carbon;
use Don47\Interact\Interact;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  /**
   * The name of the table
   *
   * @var string
   */
  protected $table = 'don47_interact_messages';

  /**
   * The attributes that are mass assignable
   *
   * @var array
   */
  protected $fillable = [
    'name', 'data'
  ];

  /**
   * Cast attributes as something else
   *
   * @var array
   */
  protected $casts = [
    'data' => 'array'
  ];

  /**
   * Get the current connection name for the model
   *
   * @return string
   */
  public function getConnectionName() : string
  {
    $connection = Interact::$config['interact-messages']['database']['connection'];

    return (
      array_key_exists($connection, Interact::$config['database']['connections']) ?
      $connection : Interact::$config['database']['default']
    );
  }

  /**
   * Check if message is not old
   *
   * @return bool
   */
  public function isNotOld() : bool
  {
    return $this->updated_at > Carbon::now()->subSeconds(3);
  }
}
