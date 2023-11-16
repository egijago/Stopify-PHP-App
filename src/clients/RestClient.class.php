<?php
require_once(PROJECT_ROOT_PATH . "/src/utils/HttpCaller.class.php");

class RestClient {
	private static function getOrigin() {
	return $_ENV["NODE_ORIGIN"];
	}  
  
    public static function getLikeSongPremium($idUser, $idArtist, $idMusic, $idAlbum) {
		$url = self::getOrigin() . "/like";
		$data = [
		"idUser" => $idUser,
		"idArtist" => $idArtist,
		"idMusic" => $idMusic,
		"idAlbum" => $idAlbum
		];
		$resp = HttpCaller::post($url, $data);
		return json_decode($resp);
    }
  
    public static function getPoster() {
      $url = self::getOrigin() . "/poster";
      $resp = HttpCaller::get($url);
      return json_decode($resp);
    }
  }
  