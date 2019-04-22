<?php

namespace Don47\Interact;

use Carbon\Carbon;
use Don47\Interact\Message;
use Don47\Interact\Foundation\ChannelInterface;

class Channel implements ChannelInterface
{
  /**
   * Trigger interaction
   *
   * @param string $channel The name of the channel
   * @param array $data The response data
   * @return boolean
   */
  public static function trigger(string $channel, array $data = []) : bool
  {
    $message = Message::where('name', strtolower($channel))->first();

    if ($message == null) {

      Message::create(['name' => strtolower($channel), 'data' => $data]);

      return true;

    }

    $message->data       = $data;
    $message->updated_at = Carbon::now()->toDateTimeString();

    return $message->save();
  }
}