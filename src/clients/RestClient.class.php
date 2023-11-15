<?php
require_once(PROJECT_ROOT_PATH . "/src/utils/HttpCaller.class.php");

class BinotifyRestClient {
    private static $url = "http://localhost:8004";
  
    public static function likeSongPremium($idUser, $idArtist, $idMusic, $idAlbum) {
      $url = self::$url . "/like";
      $data = [
        "idUser" => $idUser,
        "idArtist" => $idArtist,
        "idMusic" => $idMusic,
        "idAlbum" => $idAlbum
      ];
      $resp = HttpCaller::post($url, $data);
      return $resp;
    }
  
    public static function getPremiumArtist() {
      $url = self::$url . "/artists";
      $resp = HttpCaller::get($url);
      
      return json_decode($resp);
    }
  }
  