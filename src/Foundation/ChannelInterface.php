<?php

namespace Don47\Interact\Foundation;

use Closure;

interface ChannelInterface
{
  /**
   * Trigger interaction
   *
   * @param string $channel
   * @param array $data
   * @return boolean
   */
  public static function trigger(string $channel, array $data = []) : bool;

  /**
   * Forget a channel
   *
   * @param string $channel
   * @return bool
   */
  public static function forget(string $channel) : bool;

  /**
   * Listen to channels
   *
   * @param string $channel The name of the channel
   * @param Closure $callback The callback
   * @return string
   */
  public static function listen(string $channel, Closure $callback) : string;
}
