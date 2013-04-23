<?php
include('MY_Controller.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IndexController
 *
 * @author xavier.antolin
 */
class IndexController extends MY_Controller{
    
    public function index(){
        $data = array(
            'page'=>0,
            'category'=>0,
        );
        $this->_load('node/nodes','Foodprise',$data);
    }
    
    //put your code here
}

?>
