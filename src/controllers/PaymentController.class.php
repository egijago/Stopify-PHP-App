<?php 
require_once(PROJECT_ROOT_PATH . "/src/controllers/BaseController.class.php");
require_once(PROJECT_ROOT_PATH . "/src/models/PaymentModel.class.php");

class PaymentController extends BaseController 
{
    protected function __construct() 
    {
        $this->model = new PaymentModel();
    }
    
    public static function getDetailPaymentbyId($path_params) 
    {
        $params = $path_params;
        $result = self::getInstance()->model->getDetailPaymentbyId($params["id_user"]);

        self::toResponse(200, "", $result);
    }
  
    public static function insertDetailPayment($path_params) 
    {
        $body_params = self::getBodyParams();
		$params = array_merge($path_params, $body_params);
        $result = self::getInstance()->model->insertDetailPayment($params["id_user"], $params["card_number"], $params["card_owner"], $params["card_exp_month"], $params["card_exp_year"]);
        
        self::toResponse(200, "", $result);
    }
    
    public static function updateDetailPayment($path_params) 
    {
        $body_params = self::getBodyParams();
		$params = array_merge($path_params, $body_params);
        $result = self::getInstance()->model->updateDetailPayment($params["id_user"], $params["card_number"], $params["card_owner"], $params["card_exp_month"], $params["card_exp_year"]);
        // $result = self::getInstance()->model->updateDetailPayment( 1,2,3,4,5);

        self::toResponse(200, "", $result);
    }
}