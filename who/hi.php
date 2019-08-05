<?php
if(isset($_GET['open']) ) {
    $text = $_GET['open'];
    //$handle = fopen("chat.txt", "a");
    //file_put_contents("chat.txt", $text);
    //fwrite($handle, $text);
    //fclose($handle);
    $cha = file_get_contents("chat.txt");
    echo $cha;
    exit();
}else{
	echo "Nothing found";
}

?>