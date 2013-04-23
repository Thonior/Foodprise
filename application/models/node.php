<?php
include_once('MY_Model.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of node
 *
 * @author xavier.antolin
 */
class node extends MY_Model{
    //put your code here
    function loadN($page=0){
        $query = "SELECT * FROM node
            LEFT JOIN user ON node.user_id=user.id
            ORDER BY node.created DESC LIMIT ".(7*$page).",7";
        $result = $this->db->query($query)->result_array();
        return $result;
    }
    
}

?>
