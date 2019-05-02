<?php 

$la = [];
$lb = [];

for($i = 1; $i < count($argv); $i++) {
    array_push($la, $argv[$i]);
}

$count_la = count($la);
$count_lb = count($lb);

function sa(&$la) {
    $temp = $la[0];
    $la[0] = $la[1];
    $la[1] = $temp;
    //print_r($la);
}

//sa($la);

function sb(&$lb) {
    $temp = $lb[0];
    $lb[0] = $lb[1];
    $lb[1] = $temp;
    //print_r($lb);
}

//sb($lb);

function sc(&$la, &$lb) {
    sa($la);
    sb($lb);
}
//sc($la, $lb);

function pa(&$la, &$lb) {
    array_unshift($la, $lb[0]);
    array_shift($lb);
    //print_r($la);
    //print_r($lb);
}

//pa($la, $lb);

function pb(&$la, &$lb) {
    array_unshift($lb, $la[0]);
    array_shift($la);
    //print_r($la);
    //print_r($lb);
}

//pb($la, $lb);

function ra(&$la, $count_la) {
    for($i = 0; $i < $count_la - 1; $i++) {
        $temp = $la[$i + 1];
        $la[$i + 1] = $la[$i];
        $la[$i] = $temp;
    }
    //print_r($la);
} 

//ra($la, $count_la);

function rb(&$lb, $count_lb) {
    for($i = 0; $i < $count_lb - 1; $i++) {
        $temp = $lb[$i + 1];
        $lb[$i + 1] = $lb[$i];
        $lb[$i] = $temp;
    }
    //print_r($lb);
}

//rb($lb, $count_lb);

function rr(&$la, &$lb, $count_la, $count_lb) {
    ra($la, $count_la);
    rb($lb, $count_lb);
}

//rr($la, $lb, $count_la, $count_lb);

function rra(&$la, $count_la) {
    for($i = $count_la - 1; $i > 0; $i--) {
        $temp = $la[$i];
        $la[$i] = $la[$i - 1];
        $la[$i - 1] = $temp;
    }
    print_r($la);
}

//rra($la, $count_la);

function rrb(&$lb, $count_lb) {
    for($i = $count_lb - 1; $i > 0; $i--) {
        $temp = $lb[$i];
        $lb[$i] = $lb[$i - 1];
        $lb[$i - 1] = $temp;
    }
    print_r($lb);
}

//rrb($lb, $count_lb);

function rrr(&$la, &$lb, $count_la, $count_lb) {
    rra($la, $count_la);
    rrb($lb, $count_lb);
} 

//rrr($la, $lb, $count_la, $count_lb);

$count_array = count($la);
$resultat = 0;

function sorting_algorithm($la, $count_la, $lb, $count_lb, $count_array, $resultat) {
    $debug = debug($la, $count_array);

    if($debug == true) {
        if(count($lb) < $count_array && count($la) != 1) {
            for ($i = 1; $i < $count_array; $i++) {
                if($la[0] > $la[1]) {
                    sa($la);
                    echo "sa ";
                    $resultat++;
                }
                
                if($la[0] < $la) {
                    pb($la, $lb);
                    echo "pb ";
                    $resultat++;
                }

                if(array_key_exists(0, $lb) && array_key_exists(1, $lb)) {
                    if($lb[0] < $lb[1]) {
                        sb($lb);
                        echo "sb "; 
                        $resultat++;
                    }
                }                
            }
        }

        if(count($la) == 1) {
            for ($j = 1; $j < $count_array; $j++) {
                if(array_key_exists(0, $la) && array_key_exists(1, $la)) {
                    if($la[0] > $la[1]) {
                        sa($la);
                        echo "sa ";
                        $resultat++;
                    }  
                }
                pa($la, $lb);
                $resultat++;
                echo "pa ";
            }
        }

        $winners = winners($la, $count_array);

        if($la == $winners) {
            //print_r($la);
            //echo $resultat . " Commandes\n";
            echo "\n";
        }

        else {
            sorting_algorithm($la, $count_la, $lb, $count_lb, $count_array, $resultat);
        }
    }

    else {
        echo "Le tableau ne comporte pas que des nombres !\n";
    }
}

sorting_algorithm($la, $count_la, $lb, $count_lb, $count_array, $resultat);

function winners($la, $count_array) {
    
    for($k = 0; $k < $count_array - 1; $k++) {
        for($i = 0; $i < $count_array - 1; $i++) {
            if($la[$i] > $la[$i + 1]) {
                $temp = $la[$i];
                $la[$i] = $la[$i +1];
                $la[$i + 1] = $temp;
            }
        }
    }
    return $la;
} 
//winners($la, $count_array);

function debug($la, $count_array) {
    foreach($la as $array) {
        $intval = intval($array, $error = null);
        if($intval == $error) {
           return false;
        }
    }
    return true;
}

//debug($la, $count_array);

//include 'bonus/push_swap.php';