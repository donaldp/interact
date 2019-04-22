<?php

namespace Don47\Interact;

use Closure;
use Don47\Interact\Foundation\EventInterface;

class Event implements EventInterface
{
  /**
   * Listen to channels
   *
   * @param string $channel
   * @param Closure $callback
   * @return string
   */
  public static function listen(string $channel, Closure $callback) : string
  {
    $results = call_user_func($callback, 'response');

    return ("
      <script>
        channel.listen('{$channel}', (response) => { {$results} });
      </script>
    ");
  }
}
