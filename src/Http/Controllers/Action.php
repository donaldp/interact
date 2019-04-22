<?php

namespace Don47\Interact\Http\Controllers;

use Modulus\Http\Rest;
use Modulus\Http\Request;
use Don47\Interact\Message;

class Action
{
  /**
   * Message Model
   *
   * @var Message|null
   */
  protected $message;

  /**
   * Validate request and return a new message object
   *
   * @param Request $request
   * @return Message|null
   */
  private function message(Request $request)
  {
    $request->rules = [ 'channel' => 'required' ];

    $request->validate();

    return ($this->message = Message::where('name', strtolower($request->channel))->first());
  }
}
