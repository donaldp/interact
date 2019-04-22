<?php

namespace Don47\Interact\Foundation;

interface JavaScriptInterface
{
  /**
   * Add script to the page
   *
   * @param boolean $withContig
   * @return string
   */
  public static function show(bool $withConfig = false) : string;
}
