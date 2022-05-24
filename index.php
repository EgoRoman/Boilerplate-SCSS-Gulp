<?php
// Require PHP 7.3!
const DIR_BASE = __DIR__ . '/';
const DIR_TEMPLATES = __DIR__ . '/template-parts/';

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
  case '/' :
    require DIR_BASE . '/pages/home.php';
    break;
  case '/ui' :
    require DIR_BASE . '/pages/ui.php';
    break;
  default:
    /*TODO 404 page*/
    // http_response_code(404);
    require DIR_BASE . '/pages/404.php';
    break;
}
