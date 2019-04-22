<?php

return [

  'database' => [
    'connection' => env('INTERACT_CONNECTION', 'channels'),
  ],

  'request' => [
    'url' => env('INTERACT_REQUEST_URL', '/interact/messages'),
    'key' => env('INTERACT_REQUEST_KEY', 'null')
  ],

  'middleware' => Don47\Interact\Http\Middleware\ProtectsChannelMessages::class

];
