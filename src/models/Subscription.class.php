<?php
require_once(PROJECT_ROOT_PATH ."/src/models/BaseModel.class.php");

class SubscriptionModel extends BaseModel
{
    public function __construct()
    {
		parent::__construct();
		$this->table = "subscription";
    }

	public function insertSubscription($id_user, $id_artist){
        $this->db->query('INSERT INTO ' . $this->table . ' (id_user, id_artist) VALUES (:id_user, :id_artist)');
        $this->db->bind('id_user', $id_user);
        $this->db->bind('id_artist', $id_artist);
        $this->db->execute();
        return $this->db->rowCount();
    }


    public function getSubscriptionbyId($id_user){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_user = :id_user');
        $this->db->bind('id_user', $id_user);
        $this->db->execute();
        return $this->db->resultSet();
    }


    public function getSubscriptionbyIdUserAndIdArtist($id_user, $id_artist){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_user = :id_user AND id_artist = :id_artist');
        $this->db->bind('id_user', $id_user);
        $this->db->bind('id_artist', $id_artist);
        $this->db->execute();
        return $this->db->single();
    }
}

// $model = new ArtistModel();
// var_dump($model->getMaxId());