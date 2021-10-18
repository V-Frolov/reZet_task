    <?php

    $arraySource = [
        [1, 2, 3, 2, 7],
        [4, 5, 6, 8, 1],
        [7, 8, 9, 4, 5],
    ];
	
	$arrayTemp = [];

    function chekArray ($arraySource, $arrayLenght) {           // Check array for requirements.
        if ($arrayLenght < 3) {
            exit ('The original array does not meet the specified requirements: the number of columns must be 3 or more.');            
        } else echo 'Array is checked.'."<br><br>";
    }

    function showSource ($arraySource) {
        echo 'Source array: <br>';
        echo '<pre>';
        print_r ($arraySource);
        echo '</pre><br>';
    }

    function main ($arraySource, $arrayTemp, $arrayLenght) {    // Create array 3x3 from source $arraySource for check.
        $column = 0;
        for ($k = 0; $k <=$arrayLenght - 3; $k++) {
            for ($row = 0; $row < 3; $row++) {
                for ($y = $column; $y <= $column + 2; $y++) {
                    $arrayTemp[] = $arraySource[$row][$y];
                }
            }
            $m = 1;
            while ($m <= 9) {                                   // Check including all numbers (1..9) in array 3x3 ($arrayTemp).
                if (in_array ($m, $arrayTemp)) {
                    $exist = true;
                } else {
                    $exist = false;
                    break;
                };
                $m++;
            };
            $arrayDestination [] = $exist;
            unset ($arrayTemp);
            $column++;
        }
        return $arrayDestination;
    }

    function showDestination ($arrayDestination) {
        echo 'Final array: <br>';
        echo '<pre>';
        print_r ($arrayDestination);
        echo '</pre>';
        var_dump ($arrayDestination);
    }

    $arrayLenght = count ($arraySource[0]);
    chekArray ($arraySource, $arrayLenght);
    showSource ($arraySource);
    $arrayDestination = main ($arraySource, $arrayTemp, $arrayLenght);
    showDestination ($arrayDestination);
    
    ?>
