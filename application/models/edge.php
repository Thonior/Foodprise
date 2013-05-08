<?php
include_once('MY_Model.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of edge
 *
 * @author xavier.antolin
 */
class edge extends MY_Model{
    
    function getByNode($node,$context){
        $query = "SELECT edge.id,edge.origin, edge.comment,edge.destination,
            edge.context,edge.date,edge.read,edge.destowner, 
            user.id as user_id, user.name, user.email,
            user.lastname ,node.id as node_id,node.title,node.created
            FROM edge
            LEFT JOIN user ON edge.origin=user.id
            LEFT JOIN node ON edge.destination=node.id
            WHERE edge.destination=$node";
        if($context)
            "AND edge.context=".$this->db->escape($context);
        
        
//                echo $query;die;
        $result = $this->db->query($query);
        if($result){
            return $result->result_array();
        }
        else{
            return false;
        }
    }
    
    function getByNodeUser($node,$user,$context){
        $query = "SELECT edge.id,edge.origin, edge.comment,edge.destination,
            edge.context,edge.date,edge.read,edge.destowner, 
            user.id as user_id, user.name, user.email,
            user.lastname ,node.id as node_id,node.title,node.created
            FROM edge
            LEFT JOIN user ON edge.origin=user.id
            LEFT JOIN node ON edge.destination=node.id
            WHERE edge.destination=$node AND user.id=$user";
        if($context)
            "AND edge.context=".$this->db->escape($context);
        
        
//                echo $query;die;
        $result = $this->db->query($query);
        if($result){
            return $result->result_array();
        }
        else{
            return false;
        }
    }
    
}

?>
