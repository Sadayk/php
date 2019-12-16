<?php
$verse = "котёнок возится с клубком 
то подползет к нему тайком 
то на клубок начнет кидаться 
толкнет его отпрыгнет вбок 
никак не может догадаться 
что здесь не мышка а клубок";
$array=explode(" ",$verse);
echo "Всего слов: ",count($array);
echo "<br>";
foreach($array as $value){
    if (strlen($value)>5) {
        echo "Слово '", $value, "' встречается в стихе: ", mb_substr_count($verse, $value), " раз";
    }else{
        echo "Слово '", $value, "' встречается в стихе: ", mb_substr_count($verse,  " ".$value." "), " раз";
    }
    echo "<br>";
}