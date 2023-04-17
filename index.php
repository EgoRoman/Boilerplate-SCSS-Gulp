<?php
// Require PHP 7.3!
const SITE_TITLE = 'Boilerplate';
const DIR_BASE = __DIR__ . '/';
const DIR_TEMPLATES = __DIR__ . '/page-parts/';

const IMG_PATH = '/dist/img/';
const SVG_SPRITE_SRC = '/dist/img/icons/svg/sprite.svg';

$request = $_SERVER['REQUEST_URI'];

require_once DIR_TEMPLATES . 'header.php';

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

require_once DIR_TEMPLATES . 'footer.php';
