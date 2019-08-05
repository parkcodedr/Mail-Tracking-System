<?php
if(isset($_POST['content']) ) {
    $text = $_POST['content'];
    //$handle = fopen("chat.txt", "a");
    file_put_contents("chat.txt", $text);
    //fwrite($handle, $text);
    //fclose($handle);
    $cha = file_get_contents("chat.txt");
    echo $cha;
    exit();
}else{
	echo "Nothing found";
}

?>