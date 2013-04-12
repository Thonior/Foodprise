<?php

function month($date){
//            $var = $this->lang->language;
            
            $en = array(
                'January' ,
                'February' ,
                'March',
                'April' ,
                'May' ,
                'June',
                'July' ,
                'August',
                'September',
                'October',
                'November',
                'December'
            );
    
            $ca = array(
                'Gener',
                'Febrer',
                'Març',
                'Abril',
                'Maig',
                'Juny',
                'Juliol',
                'Agost',
                'Septembre',
                'Octubre',
                'Novembre',
                'Decembre'
            );
            
            $es = array(
                'Enero',
                'Febrero',
                'Marzo',
                'Abril',
                'Mayo',
                'Junio',
                'Julio',
                'Agosto',
                'Septiembre',
                'Octubre',
                'Noviembre',
                'Diciembre'
            );            
            $ci =& get_instance();
            $lang = $ci->config->item('language');
            if($lang == 'catalan'){
                $date = str_replace($en, $ca, $date);
            }
            else{
                $date = str_replace($en, $es, $date);
            }
            return $date;
        }
        
    function ago($time){
        $ca = array("segons", "minuts", "hores", "dies", "setmanes", "mesos", "anys", "decades");
        $casing = array("segón", "minut", "hora", "dia", "setmana", "mes", "any", "decada");
        $es = array("segundos", "minutos", "horas", "dias", "semanas", "meses", "años", "decadas");
        $essing = array("segundo", "minuto", "hora", "día", "semana", "mes", "año", "decada");
        $lengths = array("60","60","24","7","4.35","12","10");

        $now = time();

            $difference     = $now - $time;
            $tense         = "ago";

        for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
            $difference /= $lengths[$j];
        }

        $difference = round($difference);

        
        $ci =& get_instance();
        $lang = $ci->config->item('language');
        if($lang == 'catalan'){
            if($difference != 1) {
                return "$difference $ca[$j]";
            }
            return "$difference $casing[$j]";
        }
        else{
            if($difference != 1) {
                return "$difference $es[$j]";
            }
            return "$difference $essing[$j]";
        }
    }
?>
