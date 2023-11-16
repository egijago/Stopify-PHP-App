<?php

class SoapCaller {
    private $soapClient;
    public function __construct($wsdl) {
        $this->soapClient = new SoapClient($wsdl,array(
        "exceptions" => 0,
        "trace" => 1,
        "encoding" => "UTF-8",
        'stream_context' => stream_context_create(array(
            'http' => array(
            'header' => 'api-key: ' . $_ENV['API_KEY'],
            ),
        )),
        ));
    }

    public function call($functionName, ...$params) {
        $res = null;
        if (!isset($params)) {
            $res = $this->soapClient->$functionName();
        } else {
            $constructedParams = array();
            foreach ($params as $index=>$param) {
                $constructedParams["arg". $index] = $param;
            }
            $res = $this->soapClient->$functionName($constructedParams);
        }
        return json_encode($res);
    }
}