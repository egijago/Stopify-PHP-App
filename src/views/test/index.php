<?php 
include_once (PROJECT_ROOT_PATH . "/src/clients/SubscriptionClient.class.php");


$response= SubscriptionClient::getInstance()->applySubscription(1,4);
echo json_encode($response); 
