<?php
require_once(PROJECT_ROOT_PATH ."/src/models/BaseModel.class.php");

class PaymentModel extends BaseModel
{
    public function __construct()
    {
		parent::__construct();
		$this->table = "paymentinfo";
    }

	public function getDetailPaymentbyId($id_user){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_user = :id_user');
        $this->db->bind('id_user', $id_user);
        return $this->db->single();
    }
    public function updateDetailPayment($id_user, $card_number, $card_owner, $card_exp_month, $card_exp_year){
        $this->db->query('UPDATE paymentinfo SET card_number = :card_number, card_owner = :card_owner, card_exp_month = :card_exp_month, card_exp_year= :card_exp_year WHERE id_user = :id_user');
        $this->db->bind('card_number', $card_number);
        $this->db->bind('card_owner', $card_owner);
        $this->db->bind('card_exp_month', $card_exp_month);
        $this->db->bind('card_exp_year', $card_exp_year);
        $this->db->bind('id_user', $id_user);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function insertDetailPayment($id_user, $card_number, $card_owner, $card_exp_month, $card_exp_year){
        if($this->getDetailPaymentbyId($id_user)){
            return $this->updateDetailPayment($id_user, $card_number, $card_owner, $card_exp_month, $card_exp_year);
        }else{
            $this->db->query('INSERT INTO ' . $this->table . ' (id_user, card_number, card_owner, card_exp_month, card_exp_year) VALUES (:id_user, :card_number, :card_owner, :card_exp_month, :card_exp_year)');
            $this->db->bind('card_number', $card_number);
            $this->db->bind('card_owner', $card_owner);
            $this->db->bind('card_exp_month', $card_exp_month);
            $this->db->bind('card_exp_year', $card_exp_year);
            $this->db->bind('id_user', $id_user);
            $this->db->execute();
        }
        return $this->db->rowCount();
    }
}

// $model = new ArtistModel();
// var_dump($model->getMaxId());