<?php
if (! function_exists('delete_img_path')) {
function delete_img_path($img_path){
$path_absolute=substr($img_path,1);
            if (file_exists($path_absolute)) {
              unlink($path_absolute);
            }
}   
}         
if (! function_exists('sql_XSS')) {
 function sql_XSS($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }
}
if (! function_exists('to_time_ago')) {
    function to_time_ago($now, $time ) { 
      
    // Calculate difference between current 
    // time and given timestamp in seconds 
    $diff = $now- $time; 
      
    if( $diff < 1 ) {  
        return 'just now';//'less than 1 second ago';  
    } 
      
    $time_rules = array (  
                12 * 30 * 24 * 60 * 60 => 'year', 
                30 * 24 * 60 * 60       => 'month', 
                24 * 60 * 60           => 'day', 
                60 * 60                   => 'hour', 
                60                       => 'minute', 
                1                       => 'second'
    ); 
  
    foreach( $time_rules as $secs => $str ) { 
          
        $div = $diff / $secs; 
  
        if( $div >= 1 ) { 
              
            $t = round( $div ); 
              
            return $t . ' ' . $str .  
                ( $t > 1 ? 's' : '' ) . ' ago'; 
        } 
    } 
}
if (! function_exists('textShorten')) {
 function textShorten($text, $limit = 400){
    $text = $text. " ";
    $text = substr($text, 0, $limit);
    $text = substr($text, 0, strrpos($text, ' '));
    $text = $text."....";
    return $text;
 }
}
}