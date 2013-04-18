<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Tagmanager {
    
    /**
     * Receives a possible tag, if it's already a tag returns it's ID.
     * If not, creates the tag and returns it's ID.
     * @param string $token
     * @return integer 
     */
    public function addTag($token){
        $CI =& get_instance();
        $CI->load->model('tag');
        $slug = strtolower($token);
        $pieces = explode(' ',$slug);
        $i=0;
        $slug = '';
        foreach($pieces as $piece){
            if($i)
                $slug.=' '.$piece;
            else
                $slug.=$piece;
            $i++;
        }
        $tag = $CI->tag->loadBy(array('slug'=>$slug));
        if($tag)
            return $tag['id'];
        else{
            $data = array(
                'tag' => ucfirst ($slug),
                'slug' => $slug
            );
            return $CI->tag->insert($data);
        }
    }
    
    public function addTags($tokens,$isarray=0){
        if(!$isarray)
            $tokens = explode(',',$tokens);
        $tags = array();
        foreach($tokens as $token){
            $tags[]=$this->addTag($token);
        }
        return $tags;
    }
    
    public function tagNode($node,$tags){
        $CI =& get_instance();
        $CI->load->model('tag');
        foreach($tags as $tag){
            $CI->tag->tagNode($node,$tag);
        }
    }
    
    public function getTags($node){
        $CI =& get_instance();
        $CI->load->model('tag');
        return $CI->tag->getTagByNode($node);
    }
    
    
    
}

/* End of file Someclass.php */