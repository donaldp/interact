<?php

namespace Don47\Interact;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  /**
   * The attributes that are mass assignable
   *
   * @var array
   */
  protected $fillable = [
    'name', 'data'
  ];
}
