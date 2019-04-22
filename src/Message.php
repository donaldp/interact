<?php

namespace Don47\Interact;

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
}
