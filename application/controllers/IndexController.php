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
        $this->_load('index/index');
    }
    
    //put your code here
}

?>
