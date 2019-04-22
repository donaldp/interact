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
    if ($this->hasAuth($request)) {
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
}
