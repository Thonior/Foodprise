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
        $query = 'SELECT * FROM tag_node ti LEFT JOIN tag t ON ti.id_tag=t.id WHERE id_node = '.$node.' 
            AND t.category=0';
        $result = $this->db->query($query);
        if($result)
            return $result->result_array();
        else
            return false;
    }
    
    function getCategory($node){
        $query = 'SELECT * FROM tag_node ti LEFT JOIN tag t ON ti.id_tag=t.id WHERE id_node = '.$node.' 
            AND t.category=1';
        $result = $this->db->query($query);
        if($result){
            $result = $result->result_array();
            return $result[0];
        }
        else
            return false;
    }
    
    function getNodes($tags){
        $query = "SELECT node.*,user.username,user.id as user_id
            FROM node LEFT JOIN tag_node ON node.id=tag_node.id_node
            node LEFT JOIN user ON node.user_id=user.id
            tag LEFT JOIN tag_node ON tag.id=tag_node.id_tag
            WHERE";
        $i=0;
        foreach($tags as $tag){
            if($i==0)
                $query.=" tag.slug LIKE %".$tag['slug']."%";
            else
                $query.=" OR tag.slug LIKE %".$tag['id']."%";
            $i++;
        }
        $result = $this->db->query($query);
        if($result)
            return $result->result_array();
        else
            return false;
    }
    
    function getNodesByCategory($category){
        $query = "SELECT node.*,user.username,user.id as user_id
            FROM node 
            LEFT JOIN tag_node ON node.id=tag_node.id_node
            LEFT JOIN user ON node.user_id=user.id
            WHERE tag_node.id_tag=$category";
        $result = $this->db->query($query);
        if($result)
            return $result->result_array();
        else
            return false;
    }
}