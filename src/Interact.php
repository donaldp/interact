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
}

