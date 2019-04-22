<?php

namespace Don47\Interact\Foundation;

use Closure;

interface EventInterface
{
  /**
   * Listen to channels
   *
   * @param string $channel
   * @param Closure $callback
   * @return string
   */
  public static function listen(string $channel, Closure $callback) : string;
}
