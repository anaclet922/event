<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('webSettings')){

	function webSettings(){

		$CI = get_instance();

    	$data = array();

    	$result = $CI->db->get('tbl_config');

    	$result = $result->result();

    	foreach ($result as $setting) {
    		$data[$setting->config_key] = $setting->value;
    	}

    	return $data;
	}
}

if(!function_exists('getCategoryName')){
     function getCategoryName(){
        $CI = get_instance();

        $data = array();

        $result = $CI->db->get('tbl_categories')->result();

        foreach ($result as $category) {
            $data[$category->id] = $category->category_name;
        }
        return $data;
    }
}


if(!function_exists('pageVis')){
    function pageVis(){
        $CI = get_instance();

        $data = array();

        $result = $CI->db->get('tbl_pages')->result_array();

        foreach ($result as $page) {
            $data[$page['page_slug']] = $page['visibility'];
        }
        return $data;
    }
}


if(!function_exists('time_elapsed_string')){
    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}


