<?php

namespace Don47\Interact;

use Closure;
use Carbon\Carbon;
use Don47\Interact\Event;
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

  /**
   * Forget a channel
   *
   * @param string $channel The name of the channel
   * @return bool
   */
  public static function forget(string $channel) : bool
  {
    $message = Message::where('name', strtolower($channel))->first();

    if ($message !== null) {
      return $message->delete();
    }

    return true;
  }

  /**
   * Listen to a channel
   *
   * @param string $channel The name of the channel
   * @param Closure $callback The callback
   * @return string
   */
  public static function listen(string $channel, Closure $callback) : string
  {
    return Event::listen($channel, $callback);
  }
}
