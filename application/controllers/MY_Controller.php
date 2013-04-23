<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	/**
	 Extension controller to add often used functions in the other controllers.
     Remember to include and extend from this controller
	 */
         
    /**
     * loads a view with the head, the header, the indicated content and the footer
     * @param string $view Specific content to load
     * @param string $title Title of the  page
     * @param boolean $user User is logged
     * @param array $params parameters to pass to the view
     */
    protected function _load($view, $title = 'Fodprise', $params=array()){
        $user = $this->getUser();
        //prepare header
        $categories = $this->tagmanager->getCategories();
        $header = array(
            'categories' => $categories,
            'user' => $user,
        );
        
        
        
    	$this->load->view('html/head',array('title' =>$title));
        $this->load->view('html/js');
        $this->load->view('html/header',$header);
        $this->load->view($view, $params);
        $this->load->view('html/footer');
    }
        
    /**
     * Gets the current user
     * @param boolean $authenticate if true checks if the user is logged in, if not redirects to login page
     * @return boolean false if there's no logged user
     * @return array the user data if it's logged
     */
    protected function getUser($authenticate = false){
    	if($this->session->userdata('logged_in')){
            $user = $this->session->all_userdata();
            return $user;
        }else{
            if($authenticate)
            	redirect(site_url('login'),'refresh');
            else
                return false;
       	}
	}

	/**
	 * Create the API connection and do the authentication to use it
	 * @param string $email Email to use with the authentication process
	 * @param string $password Password (it is not codified) to use with the authentication process
	 */
    protected function getApi($email,$password){
        $zyncroApi = new ZyncroApi();
        $zyncroApi->authorizeOAuth($email, $password);
        return $zyncroApi;
    }
 
    /**
     * Converts the data array into a specific array structure: id, name and urn
     * @param array $data Category data
     */
    protected function formatCategory($data){
    	
    	$this->load->model('idea');
    	$numIdeas = $this->idea->countIdeas($data['zyncroid']);
    	
    	$category = array(
        	'id' => $data['id'],
            'name' => $data[$this->lang->lang()],
            'urn' => $data['zyncroid'],
    		'ideas' => $numIdeas
        );
        return $category;
	}
	
	/**
	 * Get Pentaho connection (this connection is not used)
	 */
	protected function getPentaho(){
    	$this->legacy_db = $this->load->database('pentaho', true);
        return $this->legacy_db;
    }
	
	/**
	 * Test function to use when the API does not work
	 */
	protected function fakeLogin(){
    	$newdata = array(
            'idz' => 'testprueba',
            'id' => 12,
            'name' => 'Usuario',
            'lastname'=> 'Prueba',
            'email'     => 'prueba@ideathlon.com',
            'password' => '12345678',
            'logged_in' => 1
            );
        
		$this->session->set_userdata($newdata);
        $user = $this->session->all_userdata();
        return $user;
	}
        
        protected function showError(){
            $user = $this->getUser();
            $this->_load('home/error404','Ideathlon',$user);
        }
          
}
        