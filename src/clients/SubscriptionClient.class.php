<?php

require_once PROJECT_ROOT_PATH . "/src/utils/SoapCaller.class.php";

class SubscriptionClient {
    private static $instance;
    private $client;

    private function __construct()
    {
        $this->client = new SoapCaller($_ENV['SOAP_ORIGIN'] . "/ws/subscription?wsdl");
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    public function applySubscription($idArtist, $idUser) {
        $res = $this->client->call("applySubscription", $idArtist, $idUser);
        return $res;
    }

    public function getAllConfirmedSubscribeeByIdUser($idUser) {
        $res = $this->client->call("getAllConfirmedSubscribeeByIdUser", $idUser);
        return $res;
    }

    public function getSubscriptionStatus($idArtist, $idUser) {
        $res = $this->client->call("getSubscriptionStatus", $idArtist, $idUser);
        return $res;
    }
}