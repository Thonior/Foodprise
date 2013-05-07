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
        $tags = $this->tagmanager->getTags($node['id']);
        $category = $this->tagmanager->getCategory($node['id']);
        $data = array(
            'node'=>$node,
            'user'=>$user,
            'tags'=>$tags,
            'category'=>$category,
        );
        $this->_load('node/node',$node['title'],$data);
    }
    
    public function newNode(){
        $user = $this->getUser(true);
        $categories = $this->tagmanager->getCategories();
        $data = array(
            'categories'=>$categories
        );
        $this->_load('node/newNode','Create a Foodprise!',$data);
    }
    
    public function add1(){
        $this->load->view('html/head');
        $this->load->view('node/add1');
    }
    
    public function add2(){
        $this->load->view('html/head');
        $this->load->view('node/add2');
    }
    
    public function checkNode(){
        if($this->input->post('tags')){
            $tags=$this->tagmanager->addTags($this->input->post('tags'));
        }
        $this->form_validation->set_rules('title', 'Title', 'trim|required|max_lenght[100]');
        $this->form_validation->set_rules('description', 'Description', 'trim|required|max_lenght[500]');
        $this->form_validation->set_rules('category', 'Category', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->_load('user/newNode','Create a Foodprise!');
        }
        else
        {   
            $user = $this->GetUser();
            $image = $this->uploadImg();
            $this->load->model('node');
            $newNode = array(
                'title'=>$this->input->post('title'),
                'description'=>nl2br($this->input->post('description')),
                'original'=>$image['file_name'],
                'thumb'=>'thumb_'.$image['file_name'],
                'user_id'=>$user['id'],
                'created'=>time(),
                'large'=>$image['file_name'],
            );
            $id = $this->node->insert($newNode);
            $this->tagmanager->tagNode($id,$this->input->post('category'));
            if($this->input->post('tags'))
                $this->tagmanager->tagNode($id,$tags);
            $tags = $this->tagmanager->addTags($this->input->post('title'));
            $this->tagmanager->tagNode($id,$tags);
            redirect('foodprise/'.$id,'refresh');
        }
    }
    
    private function uploadImg(){
                $user = $this->getUser(true);
		$config['upload_path'] = './public/img/foodprise';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1024000';
		$config['max_width']  = '2024';
		$config['max_height']  = '2024';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('image'))
		{
                        return $this->upload->display_errors();
		}
		else
		{
                    $result = $this->upload->data();
                    $this->createThumnail($result);
                    $this->createLarge($result);
                    
                    return $result;
		}
    }
    
    private function createThumnail($image){
        $config['source_image'] = '/public/img/foodprise/thumb/'.$image['file_name'];
        $config['create_thumb'] = TRUE;
        $config['width']	 = 75;
        $config['height'] = 50;
        $this->load->library('image_lib',$config);
        $this->image_lib->resize();
    }
    
    private function createLarge($image){
        $config['source_image'] = '/public/img/foodprise/large/'.$image['file_name'];
        $config['new_image'] = TRUE;
        $config['width']	 = 700;
        $config['height'] = 600;
        $this->load->library('image_lib',$config);
        $this->image_lib->resize();
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
    
    public function search($tags){
        $tags = str_replace('_',' ',$tags);
        $tags = $this->tagmanager->addTags($tags);
        $nodes = $this->tagmanager->getNodes($tags,true);
        $this->load->model('user');
        $fnodes = array();
        foreach($nodes as $node){
            if($node['id']){
            $user = $this->user->load($node['user_id']);
            $user = $user['username'];
            $node['username'] = $user;
            $fnodes[]=$node;
            }
        }
        $data = array(
            'nodes'=>$fnodes,
        );
        $this->load->view('node/list',$data);
    }
    
    public function nodeByCategory($category){
        $this->load->model('tag');
        $category = $this->tag->loadBy(array('tag'=>$category));
        $data = array(
            'page'=>0,
            'category'=>$category['id'],
        );
        $this->_load('node/nodes',$category['tag'],$data);
    }
    
    public function pullNodes($page=0,$category=0){
        if($category){
            $nodes = $this->tagmanager->getNodesByCategory($category);
        }
        else{
            $this->load->model('node');
            $nodes = $this->node->loadN($page);
        }
        $data = array(
            'nodes'=>$nodes,
            'page'=>$page,
            'category'=>$category,
        );
        $this->load->view('node/list',$data);
    }
    
}

?>
