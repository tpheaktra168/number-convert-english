<?php
    echo "==> Input: ";
    $number =  trim(fgets(STDIN));
    $no       = floor($number);
    $count_number = strlen($no);
    $loop     = 0;
    $str      = [];

    //validateion
    if (!preg_match('/^-?\d+$/', $number)){
        echo 'allow only number, Example: 1234. Please try again!';
        return 0;
    }
    if ($number > 9999){
        echo 'The argument should be equal or greater than 0, and less than 10,000. (0-9999)';
        return 0;
    }

    //call function
    $words = convertEng();    
    $digits = ['','hundred', 'thousand'];

    //loop
    while ($loop < $count_number)
    {
        $divider = ($loop == 2) ? 10 : 100;
    
        $number = floor($no % $divider);
        $no     = floor($no / $divider);
        $loop      +=($divider == 10) ? 1 : 2;

        if ($number)
            {
                $plural  = (($counter = count($str)) && $number > 10) ? 's' : null;
            // echo $counter. count($str).$number.'\n';
                $hundred = ($counter == 1 && $str[0]) ? 'and ' : null;
                $str[]  = ($number < 20) ? 
                $words[$number] . " " .(($digits[$counter] == "thousand") ? $digits[$counter].',' : $digits[$counter]) . $plural . " " .  $hundred : 
                $words[floor($number / 10) * 10]. ((!empty($words[$number % 10])) ? "-". $words[$number % 10] : "");
            
            }
        else {
            $str[] = $words[0];
        }
    }

    $str    = array_reverse($str);
    $check = count(array_filter($str));

    if($check <= 1){
        $result = str_replace(",","",implode(" ",$str));
        if(!empty($result)){
            echo "==> Out Put: ".$result;
            return 0;
        }else{
            echo "==> Out Put: Zero";
            return 0;
        }
    }

    $result = implode('', $str); 
    if(trim($result) != ''){
        echo "==> Out Put: ".$result;
        return 0;
    }else{
        echo "==> Out Put: Zero";
        return 0;
    }


    //function convert number to english
    function convertEng(){
        $words = [
            '0' => '', 
            '1' => 'one', 
            '2' => 'two',       
            '3' => 'three', 
            '4' => 'four', 
            '5' => 'five', 
            '6' => 'six',
            '7' => 'seven', 
            '8' => 'eight', 
            '9' => 'nine',
            '10' => 'ten', 
            '11' => 'eleven', 
            '12' => 'twelve',
            '13' => 'thirteen', 
            '14' => 'fourteen',
            '15' => 'fifteen', 
            '16' => 'sixteen', 
            '17' => 'seventeen',
            '18' => 'eighteen', 
            '19' => 'nineteen', 
            '20' => 'twenty',
            '30' => 'thirty', 
            '40' => 'forty',
            '50' => 'fifty',
            '60' => 'sixty',
            '70' => 'seventy',
            '80' => 'eighty', 
            '90' => 'ninety'
            ];
    return $words;
    }

?>