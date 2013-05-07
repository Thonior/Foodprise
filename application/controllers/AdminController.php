<?php
include('MY_Controller.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminController
 *
 * @author xavier.antolin
 */
class AdminController extends MY_Controller{
    //put your code here
    public function index(){
        $user = $this->getUser(true);
        if($user['role']=='ROLE_ADMIN')
            $this->_load('admin/index', 'Admin');
        else
            echo "No permissions";
        
    }
    
    public function taxonomy(){
        
    }
    
    public function editTaxonomy(){
        
    }
    
    public function saveTaxonomy(){
        
    }
    
    public function invites(){
        $user = $this->getUser(true);
        if($user['role']=='ROLE_ADMIN')
            $this->_load('admin/invites', 'Send Invites');
        else
            echo "No permissions";
    }
    
    public function sendInvites(){
        
        $user = $this->getUser();
        $from = 'admin@foodprise.com';
        $name = 'Foodprise';
        if($user['role']!='ROLE_ADMIN'){
            $from = $user['email'];
            $name = $user['username'];
        }
        $emails = explode(',',$this->input->post('emails'));
//        echo "<pre>";print_r($emails);die;
        $this->email->from($from, $name);
        $this->email->to('jpo1987@gmail.com');  
        foreach($emails as $email){
            $this->email->bcc($email); 
        }
        $this->email->subject('You have been invited to Foodprise!');
        $this->email->message('Testing the email class.');	

        $this->email->send();
        redirect('AdminController', 'refresh');
    }
    
}

?>
