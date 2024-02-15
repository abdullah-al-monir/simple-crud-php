<?php

use Core\Response;
use Core\Router;

function dd($value): void
{
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
  die();
}


function uriIs($value)
{
  return $_SERVER['REQUEST_URI'] === $value;
}
function authorize(
  $condition,
  $status = Response::FORBIDDEN
) {
  if (!$condition) {
   Router::abort();
  }
}

function base_path($path)
{
  return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
  extract($attributes);

  require base_path('views/' . $path);
}