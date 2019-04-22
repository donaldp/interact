<?php

namespace Don47\Interact;

use Modulus\Utility\Plugin;

class Interact extends Plugin
{
  /*
  |--------------------------------------------------------------------------
  | Plugin information
  |--------------------------------------------------------------------------
  */

  /**
   * Interact::NAME
   */
  const PACKAGE = 'Modulus Interact';

  /**
   * Interact::VERSION
   */
  const VERSION = '0.1';

  /**
   * Interact::FRAMEWORK
   */
  const FRAMEWORK = '1.9.*|2.*';

  /**
   * Interact::AUTHORS
   */
  const AUTHORS = [
    'Donald Pakkies' => 'donaldpakkies@gmail.com'
  ];

  /*
  |--------------------------------------------------------------------------
  | Plugin installation
  |--------------------------------------------------------------------------
  */

  /**
   * Interact::CONFIG
   */
  const CONFIG = 'interact-messages';

  /**
   * Interact::MIGRATION
   */
  const MIGRATION = 'don47_interact_messages';

  /**
   * Check if the config is present before loading the plugin
   *
   * @return bool
   */
  public function onload() : bool
  {
    return  is_array(config(Interact::CONFIG)) &&
            array_key_exists(config(Interact::CONFIG . '.database.connection'), config('database.connections'));
  }
}

