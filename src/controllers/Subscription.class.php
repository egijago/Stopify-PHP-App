<?php 
require_once(PROJECT_ROOT_PATH . "/src/controllers/BaseController.class.php");
require_once(PROJECT_ROOT_PATH . "/src/models/Subscription.class.php");

class SubscriptionController extends BaseController 
{
    protected function __construct() 
    {
        $this->model = new SubscriptionModel();
    }
    
    public static function insertSubscription($path_params) 
    {
        $body_params = self::getBodyParams();
		$params = array_merge($path_params, $body_params);
        $result = self::getInstance()->model->insertSubscription($params["id_user"], $params["id_artist"]);

        self::toResponse(200, "", $result);
    }
  
    public static function getSubscriptionbyId($path_params) 
    {
        $params = $path_params;
        $result = self::getInstance()->model->getSubscriptionbyId($params["id_user"]);
        
        self::toResponse(200, "", $result);
    }
    
    public static function getSubscriptionbyIdUserAndIdArtist($path_params) 
    {
        $params = $path_params;
        $result = self::getInstance()->model->getSubscriptionbyIdUserAndIdArtist($params["id_user"], $params["id_artist"]);

        self::toResponse(200, "", $result);
    }
}