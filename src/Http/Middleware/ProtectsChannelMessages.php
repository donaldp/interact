<?php

namespace Don47\Interact\Http\Middleware;

use Don47\Interact\Interact;

class ProtectsChannelMessages
{
  /**
   * Handle an incoming request.
   *
   * @param  \Modulus\Http\Request $request
   * @param  bool $continue
   * @return bool $continue
   */
  public function handle($request, $continue) : bool
  {
    if (
      $this->hasAuth($request) &&
      $this->hasBearerToken($request) &&
      $this->isAuthSuccessful($request) &&
      $this->isOfSameOrigin($request)
    ) {
      return $continue;
    }
  }

  /**
   * Check if auth header is present
   *
   * @param \Modulus\Http\Request $request
   * @return boolean
   */
  private function hasAuth($request) : bool
  {
    return $request->headers->has('Authorization');
  }

  /**
   * Check if authorization is Bearer
   *
   * @param \Modulus\Http\Request $request
   * @return boolean
   */
  private function hasBearerToken($request) : bool
  {
    return starts_with(strtolower($request->headers->authorization), 'bearer ');
  }

  /**
   * Check if the key matches
   *
   * @param \Modulus\Http\Request $request
   * @return boolean
   */
  private function isAuthSuccessful($request) : bool
  {
    return explode(' ', $request->headers->authorization)[1] == Interact::$config['interact-messages']['request']['key'];
  }

  /**
   * Check if request is of same origin
   *
   * @param \Modulus\Http\Request $request
   * @return boolean
   */
  private function isOfSameOrigin($request) : bool
  {
    $http = ($request->server->has('HTTPS') && $request->server('HTTPS') != 'off') ? 'https://' : 'http://';

    if (
      $request->server->has('HTTP_REFERER') &&
      starts_with($request->server->http_referer, $http . $request->headers->host)
    ) {
      return true;
    }

    return false;
  }
}
