<?php
/**
 * Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if (!function_exists('dump')) {
    function dump ($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable 
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        
        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';
        
        // Output
        if ($echo == TRUE) {
            echo $output;
        }
        else {
            return $output;
        }
    }
}
if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }
}

function limit_to_numwords($string, $numwords){
	$excerpt = explode(' ', $string, $numwords + 1);
	if(count($excerpt) >= $numwords){
		array_pop($excerpt);
	}
	$res = implode(' ', $excerpt);
	return $res;
}

function e($string){
	return htmlentities($string);
}

function get_menu($array, $child = FALSE){
	$CI =& get_instance();
	$str = '';
	if(count($array)){
		$str.= $child == FALSE ? '<ul class="links">' : '<ul class="links dropdown-menu">';
		
		foreach($array as $item){
			
			$active = $CI->uri->segment(1) == $item['slug'] ? TRUE : FALSE;
			
			if(isset($item['children']) && count($item['children'])){
				$str .= $active ? '<li class="dropdown active">' : '<li class="dropdown">';
				$str .= '<a class="dropdown-toggle" data-toggle="dropdown" href="'. base_url(e($item['slug'])) . '">'. e($item['title']);
				$str .= '<b class="caret"></b></a>'. PHP_EOL;
				$str .= get_menu($item['children'], TRUE);
			} else {
				$str .= $active ? '<li class="active">' : '<li>';
				$str .= '<a href="'. base_url(e($item['slug'])) . '">'. $item['title']. '</a>';
			}
			$str .= '</li>';
		}
		$str .= '</ul>';
	}
	return $str;
}

?>