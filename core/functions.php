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


function login($user)
{
  $_SESSION['user'] = [
    'name' => $user['name'],
    'email' => $user['email']
  ];
  session_regenerate_id(true);
}

function logout()
{
  $_SESSION = [];
  session_destroy();

  $params = session_get_cookie_params();
  setcookie('PHPSESSID', '', time() - 3600, $params['domain'], $params['secure'], $params['httponly']);
}