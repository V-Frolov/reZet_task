    <?php

    $arraySource = [
        ["Hello", "world"],
        ["Brad", "came", "to", "dinner", "with", "us"],
        ["He", "loves", "tacos"]
    ];
    $arrayFormat = ["LEFT", "RIGHT", "LEFT"];
    $stringLimit = 16;
	$arrayDestination = [];

    function showSource ($arraySource, $stringLimit, $arrayFormat) {
        echo 'Source array: <br>';
        echo '<pre>';
        print_r ($arraySource);
        echo '</pre>';
        echo 'Format array: <br>';
        echo '<pre>';
        print_r ($arrayFormat);
        echo '</pre>';
        echo 'Limit string: '.$stringLimit.'<br><br>';
    }

    function main ($arraySource, $stringLimit, $arrayFormat, $arrayDestination) {
        $arrayDestination [] = "******************";
        for ($row = 0; $row < 3; $row++) {
            $allString = "";                                                // Variable for contains all word in this row with spaces.
            $wordsLenght = 0;                                               // Lenght all word in this row with spaces.
            $arrayLenght = count ($arraySource[$row]);                      // Count words in current row.
            for ($column = 0; $column < $arrayLenght; $column++) {
                $wordsLenght += strlen ($arraySource[$row][$column]);
                $allString = $allString.$arraySource[$row][$column].' ';
            };
            $allString = rtrim ($allString);
            $wordsLenght += $arrayLenght - 1;
            if ($wordsLenght <= $stringLimit) {                             // Write string if it less limit.
                if ($arrayFormat[$row] == "LEFT") {
                    $allString = str_pad ($allString, $stringLimit, " ", STR_PAD_RIGHT);
                    $arrayDestination [] = "*".$allString."*";
                } elseif ($arrayFormat[$row] == "RIGHT") {
                    $allString = str_pad ($allString, $stringLimit, " ", STR_PAD_LEFT);
                    $arrayDestination [] = "*".$allString."*";
                }
            } else {
                $allString = "";
                $currentWord = 0;
                $wordsLenghtLimit = 0;
                while ($currentWord < $arrayLenght) {
                    $allString = "";
                    $wordsLenghtLimit = 0;
                    while ($wordsLenghtLimit + strlen ($arraySource[$row][$currentWord]) + 1 < $stringLimit) {
                        $wordsLenghtLimit += strlen ($arraySource[$row][$currentWord]) + 1;
                        $allString = $allString.$arraySource[$row][$currentWord].' ';
                        $currentWord++;
                    };
                    $wordsLenghtLimit--;
                    $allString = rtrim ($allString);
                    if ($arrayFormat[$row] == "LEFT") {                     // Write string if it more limit.
                        $allString = str_pad ($allString, $stringLimit, " ", STR_PAD_RIGHT);
                        $arrayDestination [] = "*".$allString."*";
                    } elseif ($arrayFormat[$row] == "RIGHT") {
                        $allString = str_pad ($allString, $stringLimit, " ", STR_PAD_LEFT);
                        $arrayDestination [] = "*".$allString."*";
                    }
                }
            }
        }
        $arrayDestination [] = "******************";
        return $arrayDestination;
    }

    function showDestination ($arrayDestination) {
        echo 'Final array: <br>';
        echo '<pre>';
        print_r ($arrayDestination);
        echo '</pre>';
    }

    showSource ($arraySource, $stringLimit, $arrayFormat);
    $arrayDestination = main ($arraySource, $stringLimit, $arrayFormat, $arrayDestination);
    showDestination ($arrayDestination);

    ?>
