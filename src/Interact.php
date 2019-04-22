<?php

namespace Don47\Interact;

use Modulus\Utility\Plugin;
use Don47\Interact\Http\Middleware\ProtectsChannelMessages;

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

  /*
  |--------------------------------------------------------------------------
  | Start Plugin
  |--------------------------------------------------------------------------
  */

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

  /**
   * Load routes
   *
   * @param Route $router
   * @return void
   */
  public static function routes($router)
  {
    $router->group(['namespace' => '\Don47\Interact\Http\Controllers'], function () use ($router) {

      $router->post(self::getUrl(), 'Action')
            ->middleware(self::getMiddleware())
            ->name('don47.interact.messages');

    });
  }

  /**
   * Get route url
   *
   * @return string
   */
  public static function getUrl() : string
  {
    return self::$config['interact-messages']['request']['url'] ?? '/interact/messages';
  }

  /**
   * Get route middleware
   *
   * @return string
   */
  public static function getMiddleware() : string
  {
    $middleware = self::$config['interact-messages']['middleware'] ?? ProtectsChannelMessages::class;

    return is_array($middleware) ? implode(',', $middleware) : $middleware;
  }
}

