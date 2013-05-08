<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include('MY_Controller.php');

class UserController extends MY_Controller {

    public function login(){
        $this->_load('user/login','Log in Foodprise!');   
    }
    
    public function checkLogin(){
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_lenght[100]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_lenght[16]|min_lenght[5]|md5');
        if ($this->form_validation->run() == FALSE)
        {
            $this->_load('user/register','Log in!');
        }
        else
        {
            $this->load->model('user');
            $user = $this->user->loadBy(array('email'=>$this->input->post('email'),'password'=>$this->input->post('password')));
            if($user){
                $newdata = array(
                   'id' => $user['id'],
                   'username'  => $user['username'],
                   'fullname'=>$user['name'].' '.$user['lastname'],
                   'email'     => $user['email'],
                   'logged_in' => TRUE,
                   'role' => $user['role'],
                );
                $this->session->set_userdata($newdata);
                redirect('home', 'refresh');
            }
            else
                $this->_load('user/register','Log in!');
        }
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect('home','refresh');
    }
    
//    public function register(){
//        $this->_load('user/register','Join Foodprise!');
//    }
    
    public function checkRegister(){
        
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_lenght[100]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_lenght[16]|min_lenght[5]|md5');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
                $this->_load('user/register','Join Foodprise!');
        }
        else
        {
            $this->load->model('user');
            $user = $this->user->loadBy(array('email'=>$this->input->post('email')));
            if(!$user){
                $newUser = array(
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'email' => $this->input->post('email'),
                ); 
                $id = $this->user->insert($newUser);
                $newdata = array(
                   'id' => $id,
                   'username'  => $this->input->post('username'),
                   'fullname'=>'',
                   'email'     => $this->input->post('email'),
                   'logged_in' => TRUE,
                   'role' => 'ROLE_USER',
                );
                $this->session->set_userdata($newdata);
                redirect('home', 'refresh');
            }
            else
                $this->_load ('user/register','Join Foodprise!');
        }
    }
    
    public function profile($id=0){
        if(!$id){
            $user = $this->getUser(true);
        }
        else{
            $this->load->model('user');
            $user = $this->user->load($id);
        }
        $data = array(
            'user' => $user,
        );
        $this->_load('user/profile', $user['username'],$data);
    }
    
    public function editProfile(){
        $user = $this->getUser(true);
        $data = array(
            'user'=>$user,
        );
        $this->_load('user/edit', 'Edit Profile', $data);
    }
    
    public function invites(){
        $user = $this->getUser(true);
        $this->_load('admin/invites');
    }
    
    public function saveProfile(){
        
    }
}
