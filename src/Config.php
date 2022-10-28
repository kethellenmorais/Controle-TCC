<?php

/** BASE URL */
define("ROOT", "http://localhost/Controle-TCC");

/** DATABASE CONNECT */
define("DATA_LAYER_CONFIG", [
  "driver" => "mysql",
  "host" => "localhost",
  "port" => "3308",
  "dbname" => "controle_tcc",
  "username" => "root",
  "passwd" => "",
  "options" => [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_CASE => PDO::CASE_NATURAL
  ]
]);

/**
 * @param string $path
 * @return string
 */
function url(string $path): string
{
  if ($path) {
    return ROOT . "{$path}";
  }
  return ROOT;
}

/**
 * @param string $path
 * @return string
 */
function images(string $path): string
{
  if ($path) {
    return ROOT . "/theme/assets/images/{$path}";
  }
  return ROOT;
}

/**
 * @param string $path
 * @return string
 */
function css(string $path): string
{
  if ($path) {
    return ROOT . "/theme/assets/css/{$path}";
  }
  return ROOT;
}

/**
 * @param string $path
 * @return string
 */
function js(string $path): string
{
  if ($path) {
    return ROOT . "/theme/assets/js/{$path}";
  }
  return ROOT;
}

/**
 * @param string $path
 * @return string
 */
function plugins(string $path): string
{
  if ($path) {
    return ROOT . "/theme/assets/plugins/{$path}";
  }
  return ROOT;
}

