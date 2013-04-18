<?php
include_once('MY_Model.php');

class tag extends MY_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function tagNode($node,$tag){
        $query = "INSERT INTO tag_node VALUES (".$tag.",".$node.")";
        $this->db->query($query);
    }
    
    function getTagByNode($node){
        $query = 'SELECT * FROM tag_node ti LEFT JOIN tag t ON ti.id_tag=t.id WHERE id_node = '.$node.' ';
        $result = $this->db->query($query);
        if($result)
            return $result->result_array();
        else
            return false;
    }
}