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
                   'name'=> $user['name'],
                   'lastname'=> $user['lastname'],
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
            'page'=>0,
        );
        $this->_load('user/profile', $user['username'],$data);
    }
    
    public function editProfile(){
        $user = $this->getUser(true);
        $this->load->model('user');
        $user = $this->user->load($user['id']);
//        echo "<pre>";print_r($user);die;
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
        $this->form_validation->set_rules('name', 'Name', 'trim|max_lenght[100]');
        $this->form_validation->set_rules('lastname', 'Lastname', 'trim|max_lenght[100]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_lenght[100]');
        $this->form_validation->set_rules('bio', 'Bio', 'trim|max_lenght[1000]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
            $user = $this->user->load($this->input->post('id'));
            $data = array(
                'user'=>$user,
            );
            $this->_load('user/edit', 'Edit Profile', $data);
        }
        else
        {
            $picture = $this->uploadProfPic();
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email')
            );
            if($this->input->post('name'))
                $data['name'] = $this->input->post('name');
            if($this->input->post('lastname'))
                $data['lastname'] = $this->input->post('name');
            if($this->input->post('password'))
                $data['password'] = $this->input->post('name');
            if($this->input->post('bio'))
                $data['bio'] = $this->input->post('bio');
            if($this->input->post('location'))
                $data['location'] = $this->input->post('location');
            if($this->input->post('twitter'))
                $data['twitter'] = $this->input->post('twitter');
            if($this->input->post('age')!='none')
                $data['age'] = $this->input->post('age');
            if($this->input->post('gender')!='none')
                $data['gender'] = $this->input->post('gender');
            $data['picture'] = $picture['upload_data']['file_name'];
            $this->load->model('user');
            $this->user->update($this->input->post('id'),$data);
        }
        $user = $this->user->load($this->input->post('id'));
        $data = array(
            'user'=>$user,
        );
        $this->_load('user/edit', 'Edit Profile', $data);
    }
    
    private function uploadProfPic(){
        $config['upload_path'] = './public/img/user';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('image'))
        {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);die;
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
//                var_dump($data);
                return $data;
        }
    }
    
    public function editPassword(){
        $user = $this->getUser(true);
        $this->load->model('user');
        $user = $this->user->load($user['id']);
        $data = array(
            'user'=>$user
        );
        $this->_load('user/editPassword','Edit Password',$data);
    }
    
    public function savePassword(){
        $this->load->model('user');
        $this->form_validation->set_rules('password', 'Password', 'trim|max_lenght[16]|min_lenght[5]|md5');
        if ($this->form_validation->run() == FALSE)
        {
            $user = $this->user->load($this->input->post('id'));
            $data = array(
                'user'=>$user,
            );
            $this->_load('user/edit', 'Edit Profile', $data);
        }
        else
        {
            $data = array(
                'password'=>$this->input->post('password'),
                );
            $this->user->update($this->input->post('id'),$data);
            $user = $this->user->load($this->input->post('id'));
            $data = array(
                'user'=>$user,
            );
            $this->_load('user/edit', 'Edit Profile', $data);
        }
    }
    
    public function acceptInvite($code){
        
    }
}
