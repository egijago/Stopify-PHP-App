<?php

class HttpCaller {
  public static function get($url, $data = null) {
    echo("". $url ."". json_encode($data) .""); //DEBUG

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, self::buildGetUrl($url, $data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);

    curl_close($ch);
    return $output;
  }

  private static function buildGetUrl($url, $data = null) {
    if ($data) {
      $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    return $url;
  }

  public static function post($url, $data = null) {
    echo("". $url ."". json_encode($data) .""); //DEBUG

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    if ($data) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    }
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);

    curl_close($ch);
    return $output;
  } 
}
