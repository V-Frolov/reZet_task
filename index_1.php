    <?php

    $arraySource = [1, 3, 5, 4, 5, 7];
    
    function chekArray ($arraySource) {
        $arrayLenght = count ($arraySource);
        if ($arrayLenght < 3) {
            exit ('The original array does not meet the specified requirements: the number of elements must be 3 or more.');            
        };
    }

    function showSourceArray ($arraySource) {
        echo '<pre>';
        echo 'Source array:<br>';
        print_r ($arraySource);
        echo '</pre><br>';
    }
    
    function findRespond ($arraySource) {
        $arrayLenght = count ($arraySource);
        for ($i = 1; $i < $arrayLenght - 1; $i++) {
            if (($arraySource[$i-1] < $arraySource[$i] and $arraySource[$i] > $arraySource[$i+1])
                or ($arraySource[$i-1] > $arraySource[$i] and $arraySource[$i] < $arraySource[$i+1]))
                {
                    $arrayDestination[$i-1] = 1;
                }
                else
                {
                    $arrayDestination[$i-1] = 0;
                }
        }
        return $arrayDestination;
    }

    function showDestinationArray ($arrayDestination) {
        echo '<pre>';
        echo 'Destination array:<br>';
        print_r ($arrayDestination);
        echo '</pre>';
    }

    chekArray ($arraySource);
    showSourceArray ($arraySource);
    $arrayDestination = findRespond ($arraySource);
    showDestinationArray ($arrayDestination);
    ?>
