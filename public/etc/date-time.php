<?php 


function is_time(){
    $current_time = date('H');
    $time_zone =date('e');

    /** Create a condition to handle the variables */

    if($current_time < "12"){
        echo "Good Morning";
    }elseif($current_time >= "12" && $current_time < "16" ){
        echo "Good Afternoon";

    }elseif($current_time >= '16' && $current_time < "19" ){
        echo "Good Evening";

    }elseif($current_time >= "19"){
        echo "Good night";

    }
    
}


