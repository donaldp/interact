<?php

use Don47\Interact\Channel;
use Don47\Interact\JavaScript;

if (!function_exists('interact')) {
  /**
   * Interact with the frontend
   *
   * @param string|null $channel The name of the channel
   * @param array|null $data The response data
   * @return bool|Channel
   */
  function interact(?string $channel = null, ?array $data = null) {
    return ($channel && $data ? Channel::trigger($channel, $data) : new Channel);
  }
}

if (!function_exists('stay_alive')) {
  /**
   * Add script to the page
   *
   * @param bool $withContig
   * @return string
   */
  function stay_alive(bool $withConfig = false) {
    return JavaScript::show($withConfig);
  }
}
