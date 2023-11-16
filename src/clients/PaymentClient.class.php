<?php

require_once PROJECT_ROOT_PATH . "/src/utils/SoapCaller.class.php";

class PaymentClient {
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

    public function processPayment($idUser, $idArtist, $amount, $cardNumber, $cardOwner, $cardExpMonth, $cardExpYear, $cardCvc) {
        $res = $this->client->call("processPayment",$idUser, $idArtist, $amount, $cardNumber, $cardOwner, $cardExpMonth, $cardExpYear, $cardCvc);
        return $res;
    }
}