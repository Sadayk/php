<?php
function wordcounter($verse,$filename)
{
    $verse=str_replace([',','!',';','.','?'],'',$verse);
    $verse=mb_strtolower($verse);
    print_r($verse);
//    $fileputstream=fopen($filename,'w');
//    $array = explode(" ", $verse);
//    //echo "Всего слов: ", count($array);
//    fputs($fileputstream, chr(0xEF) . chr(0xBB) . chr(0xBF)); // BOM
//    fputcsv($fileputstream,array("Всего слов",count($array)),';','"');
//    foreach ($array as $value) {
//        if (strlen($value) > 5) {
//            fputcsv($fileputstream,array($value,mb_substr_count($verse, $value)),';','"');
//            //echo "Слово '", $value, "' встречается в стихе: ", mb_substr_count($verse, $value), " раз";
//        } else {
//            fputcsv($fileputstream,array($value,mb_substr_count($verse, " " . $value . " ")),';','"');
//            //echo "Слово '", $value, "' встречается в стихе: ", mb_substr_count($verse, " " . $value . " "), " раз";
//        }
//    }
}
if($_POST['text']!=""){
wordcounter($_POST['text'],'Data1.csv');
echo "Текст обработан!<br>";
}
if(is_uploaded_file($_FILES['file']['tmp_name'])){
    $stream=fopen($_FILES['file']['tmp_name'],"rb");
    $filetxt=fread($stream,filesize($_FILES['file']['tmp_name']));
    $encodes=mb_detect_encoding($filetxt,array('utf-8','cp1251'));
    fclose($stream);
    $filetxt=iconv($encodes,'UTF-8',$filetxt);
    wordcounter($filetxt,'Data2.csv');
    echo"Файл обработан!<br>";
}
if(($_POST['text']=="")&&((is_uploaded_file($_FILES['file']['tmp_name']))==false)){
    echo"Нечего обрабатывать!";
}

