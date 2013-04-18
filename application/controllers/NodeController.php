<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include('MY_Controller.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NodeController
 *
 * @author xavier.antolin
 */
class NodeController extends MY_Controller{
    //put your code here
    public function node($id){
        $this->load->model('node');
        $node = $this->node->load($id);
        $user = $this->getUser();
        $data = array(
            'node'=>$node,
            'user'=>$user,
        );
        $this->_load('node/node',$node['title'],$data);
    }
    
    public function newNode(){
        $user = $this->getUser(true);
        $this->_load('node/newNode','Create a Foodprise!');
    }
    
    public function checkNode(){
        
        $tags=$this->tagmanager->addTags($this->input->post('tags'));
        $this->form_validation->set_rules('title', 'Title', 'trim|required|max_lenght[100]');
        $this->form_validation->set_rules('description', 'Description', 'trim|required|max_lenght[500]');
        if ($this->form_validation->run() == FALSE)
        {
            $this->_load('user/newNode','Create a Foodprise!');
        }
        else
        {
            $image = $this->uploadImg();
            $this->load->model('node');
            $newNode = array(
                'title'=>$this->input->post('title'),
                'description'=>$this->input->post('description'),
                'img'=>$image['file_name'],
            );
            $id = $this->node->insert($newNode);
            $this->tagmanager->tagNode($id,$tags);
            redirect('foodprise/'.$id,'refresh');
        }
    }
    
    private function uploadImg(){
                $user = $this->getUser(true);
		$config['upload_path'] = './public/img/foodprise';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1024';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('image'))
		{
                        return $this->upload->display_errors();
		}
		else
		{
                        return $this->upload->data();
		}
    }
    
    public function editNode($id){
        $this->load->model('node');
        $node = $this->node->load($id);
        $data = array(
            'node'=>$node,
        );
        $this->_load('node/editNode', 'Edit '.$node['title'], $data);
    }
    
    public function saveNode(){
        
    }
    
    public function likeNoke($id){
        $user = $this->getUser();
        $this->edgemanager->addEdge($id,$user['id'],'like');
    }
    
    public function commentNode($id){
        $user = $this->getUser();
        $this->form_validation->set_rules('comment','Comment','trim|required|max_lenght[500]');
        if ($this->form_validation->run() == FALSE)
        {
            $this->_load('user/newNode','Create a Foodprise!');
        }
        else
        {
            $this->edgemanager->addEdge($id,$user['id'],'comment',$this->input->post('comment'));
        }
    }
    
}

?>
