<?php
//20201027 - Created project_function.php - Banele
//20201027 - added a debug parameter  in print_rr function - Banele

//20201027 - added a debug parameter  in print_rr function - Gael
function print_rr($value, $debug=false){
    echo "<pre>";
    print_r($value, $debug);
    echo "</pre>";
}
?>