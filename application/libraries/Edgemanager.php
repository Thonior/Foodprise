<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Edgemanager
 *
 * @author julio.perdiguer
 */
class Edgemanager {
    
    private function loadModel($model){
        $CI =& get_instance();
        $CI->load->model('edge');
    }
    
    public function addEdge($node,$origin,$context,$comment='',$date=0){
        $CI =& get_instance();
        $CI->load->model('edge');
        $CI->load->model('node');
        $destowner = $CI->node->load($node);
        $destowner = $destowner['user_id'];
        if(!$date)
            $date=time();
        $data = array(
            'comment'=>$comment,
            'destination'=>$node,
            'origin'=>$origin,
            'context'=>$context,
            'date'=>$date,
            'destowner'=>$destowner,
        );
        $edge = $CI->edge->insert($data);
        return $edge;
    }
    
    public function removeEdge($edge,$user,$context){
        $CI =& get_instance();
        $CI->load->model('edge');
        $edge = $CI->edge->loadBy(array(
            'destination'=>$edge,
            'origin'=>$user,
            'context'=>$context,
            )
        );
        $CI->edge->delete($edge['id']);
    }
    
    public function getUnread($destowner){
        $CI =& get_instance();
        $CI->load->model('edge');
        return $CI->edge->getUnread($destowner);
    }
    
    public function getLast($destowner){
        $CI =& get_instance();
        $CI->load->model('edge');
        return $CI->edge->getLast($destowner);
    }
    
    public function getEdgesByNode($node,$context=0){
        $CI =& get_instance();
        $CI->load->model('edge');
        $edges = $CI->edge->getByNode($node,$context);
        return $edges;
    }
    
    public function getEdgesByNodeUser($node,$user,$context=0){
        $CI =& get_instance();
        $CI->load->model('edge');
        $edges = $CI->edge->getByNodeUser($node,$user,$context);
        return $edges;
    }
    
    public function getByOrigin($origin){
        $CI =& get_instance();
        $CI->load->model('edge');
        return $CI->edge->getByOrigin($origin);
    }
    
    public function getEdges($user,$last=0,$loaded=0){
        $CI =& get_instance();
        $CI->load->model('edge');
        $fedges = array();
        $last = 0;
        $formatted = array();
        $numloaded = 0;
        while(count($fedges)<7){
            $edges = $CI->edge->getEdges($user,$last,$loaded);
            $numloaded+=count($edges);
            $last = $this->formatEdges($edges,$fedges,$formatted);
        }
        $fedges['numloaded']=$numloaded;
        $edges = $this->completeEdges($fedges,$formatted);
        $edges['last']=$last;
        return $edges;
    }
    
    public function countEdges($user){
        $CI =& get_instance();
        $CI->load->model('edge');
        $result = $CI->edge->countByOwner($user);
        return $result;
    }
    
    public function countByContext($user,$context){
        $CI =& get_instance();
        $CI->load->model('edge');
        $result = $CI->edge->countByContext($user,$context);
        return $result;
    }
    
    private function formatEdges($edges,&$fedges,&$formatted){
        $CI =& get_instance();
        $CI->load->model('category');   
        $last = 0;
        foreach($edges as $edge){
            $formatted[]=$edge['id'];
            $id = $edge['idea_id'].$edge['context'];
            $origin = array();
            $origin['name']=$edge['name'];
            $origin['lastname']=$edge['lastname'];
            $origin['zyncroid']=$edge['zyncroid'];
            $origin['comment']=$edge['comment'];
            $origin['edge']=$edge['id'];
            $origin['date']=$edge['date'];
            $destination = array();
            $destination['id'] = $edge['idea_id'];
            $destination['title'] = $edge['title'];
            $destination['idea'] = $edge['idea'];
            $destination['created'] = $edge['created'];
            $destination['likes'] = $edge['likes'];
            $destination['comments'] = $edge['comments'];
            $destination['status'] = $edge['status'];
            $category = $CI->category->loadBy(array('zyncroid',$edge['group']));
            $destination['group'] = $category[$CI->lang->lang()];
            $fedges[$id]['origin'][]=$origin;
            $fedges[$id]['destination']=$destination;
            $fedges[$id]['type'] = $edge['context'];
            $fedges[$id]['date'] = $edge['date'];
            $last = $edge['date'];
        }
        return $last;
    }
    
    private function completeEdges($edges,$formatted){
        
        $CI =& get_instance();
        $CI->load->model('category');
        $CI->load->model('edge');
        $numloaded = $edges['numloaded'];
        unset($edges['numloaded']);
//        echo "<pre>";print_r($edges);die;
        foreach($edges as $edge){
            $missing = $this->getEdgesByIdea($edge['destination']['id'],$edge['type']);
            foreach($missing as $edge){
                if(!in_array($edge['id'],$formatted)){
                    $numloaded++;
                    $id = $edge['idea_id'].$edge['context'];
                    $origin = array();
                    $origin['name']=$edge['name'];
                    $origin['lastname']=$edge['lastname'];
                    $origin['zyncroid']=$edge['zyncroid'];
                    $origin['comment']=$edge['comment'];
                    $origin['edge']=$edge['id'];
                    $destination = array();
                    $destination['id'] = $edge['idea_id'];
                    $destination['title'] = $edge['title'];
                    $destination['idea'] = $edge['idea'];
                    $destination['created'] = $edge['created'];
                    $destination['likes'] = $edge['likes'];
                    $destination['comments'] = $edge['comments'];
                    $destination['status'] = $edge['status'];
                    $category = $CI->category->loadBy(array('zyncroid'=>$edge['group']));
                    $destination['group'] = $category[$CI->lang->lang()];
                    $edges[$id]['origin'][]=$origin;
                    $edges[$id]['destination']=$destination;
                    $edges[$id]['type'] = $edge['context'];
                    $edges[$id]['date'] = $edge['date'];
                }
            }
        }
        $edges['numloaded'] = $numloaded;
        return $edges;
    }
    
    public function markAsRead($destowner){
    	$CI =& get_instance();
        $CI->load->model('edge');
        $CI->edge->markAsRead($destowner);
    }
    
    public function read($idea){
        $CI =& get_instance();
        $CI->load->model('edge');
        $CI->edge->read($idea);
    }
}

?>
