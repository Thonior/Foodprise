<?php


class MY_Model extends CI_Model {

    private $class;
    
    function __construct()
    {
        parent::__construct();
        $this->class = get_class($this);
    }
    
    /**
     * Loads in an array the row with the indicated id
     * @param integer $id The id to look for
     * @return mixed Returns an array with the result or false if there were no results
     */
    public function load($id=false){
        if($id)
            $query = 'SELECT * FROM '.$this->class.' WHERE id='.$this->db->escape($id);
        else
            $query = 'SELECT * FROM '.$this->class;
        $result = $this->db->query($query)->result_array();
        if(count($result)){
            if(count($result)==1)
                return $result['0'];
            else
                return $result;
        }
        else{
            return false;
        }
    }
    
    /**
     * Loads all the elements of the model that complishes with the params
     * @param array $params An array in format key=>value to query for
     * @return mixed returns and array with the results of false if there were no results
     */
    public function loadBy($params){
        $query = 'SELECT * FROM '.$this->class.' WHERE ';
        $i=0;
        foreach($params as $field => $value){
            $query.=$field.'='.$this->db->escape($value);
            $i++;
            if($i<count($params))
                $query.=' AND ';
        }
        $result = $this->db->query($query)->result_array();
        if(count($result)){
            if(count($result)==1)
                return $result['0'];
            else
                return $result;
        }
        else{
            return false;
        }
    }
    
    /**
     * Inserts a new row in a table with the data indicated
     * @param array $data Array with format key=>value with the data of the object we want to insert in the DB
     * @return mixed returns the Id of the last inserted row or false if the insert was not successfull
     */
    public function insert($data){
        $insert = $this->db->insert_string($this->class,$data);
        $result = $this->db->query($insert);
        if($result)
            return $this->db->insert_id();
        else
            return false;
    }
    
    /**
     * Updates a row of the table with the indicated ID and the provided data
     * @param integer $id Indicates the id of the row to update
     * @param array $data Array with format key=>value with the data we want to update
     * @return mixed Returns the id of the updated row or false if it was not successfull
     */
    public function update($id,$data){
        $query = "UPDATE ".$this->class;
        $i=0;
        foreach($data as $key => $value){
            if($i==0)
                $query.=" SET ".$key."=".$this->db->escape($value);
            else
                $query.=", ".$key."=".$this->db->escape($value);
            $i++;
        }
        $query.=" WHERE id=".$id;
        $result = $this->db->query($query);
        if($result)
            return $result;
        else
            return false;
    }
    
	/**
     * Deletes a row of the table with the indicated ID
     * @param integer $id Indicates the id of the row to update
     * @return mixed Returns the id of the deleted row or false if it was not successfull
     */
    public function delete($id){
        $query = "DELETE FROM ".$this->class." WHERE id=".$id;
        $result = $this->db->query($query);
        if($result)
            return $result;
        else
            return false;
    }
    
    /**
     * Returns the number of rows of a table
     * @return mixed returns the number of rows of a table or false if there's no rows
     */
    public function count(){
        $query = "SELECT COUNT(*) as total FROM ".$this->class;
        $result = $this->db->query($query);
        $result = $result->first_row('array');
        if($result)
            return $result['total'];
        else
            return false;
    }
        
    
}