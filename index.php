#!/usr/bin/env php
<?php

require_once __DIR__ . '/vendor/autoload.php';

$http = new React\Http\HttpServer(function (Psr\Http\Message\ServerRequestInterface $request) {
    return React\Http\Message\Response::html(
        <<< HTML
        <!DOCTYPE html>
            <html lang='en'>
            <head>
              <meta charset='UTF-8' />
              <link rel='icon' href='/favicon.ico' />
              <link rel="stylesheet" href="https://stingray-app-aijml.ondigitalocean.app/style.css">
              <script type="importmap">
                  {
                    "imports": {
                      "crank-web": "https://stingray-app-aijml.ondigitalocean.app/crank-web.js"
                    }
                  }
              </script>
              <meta name='viewport' content='width=device-width, initial-scale=1.0' />
              <title>Vite App</title>
            </head>
            <body>
            <div id='app'></div>
            <script type='module'>
              import {startVueAppWithoutPath} from 'crank-web'
              startVueAppWithoutPath(
                  'dubai',
                  'https://payments2.crank-fit.com/api/graphql/',
                  '#app'
              )
            </script>
            </body>
            </html>
  HTML
    );
});

$socket = new React\Socket\SocketServer('127.0.0.1:80');
$http->listen($socket);

echo "Server running at http://127.0.0.1:80" . PHP_EOL;
