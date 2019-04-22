<?php

namespace Don47\Interact;

use Don47\Interact\Interact;
use Don47\Interact\Foundation\JavaScriptInterface;

class JavaScript implements JavaScriptInterface
{
  /**
   * JavaScript library
   *
   * @var string
   */
  protected static $script = __DIR__ .'/../resources/js/interact.min.js';

  /**
   * Add script to the page
   *
   * @param boolean $withContig
   * @return string
   */
  public static function show(bool $withConfig = false) : string
  {
    if (!file_exists(self::$script)) throw new \Exception(self::$script . ' does not exist');

    $script = file_get_contents(self::$script);

    $config = json_encode(Interact::$config['interact-messages']['request']);

    $config = $withConfig ? "channel.config({$config});" : '';

    return '<script>
    ' . $script .
        $config . '
    </script>';
  }
}
