<?php
    $host ='localhost';
    $user ='root';
    $passward ='';
    $bd ='universidad';

    $conection = @mysqli_connect($host,$user,$password,$bd);
    if(!$conection){

        echo "error";
    }
    ?>