<?php
    $user = "root";
    $db = "simonpkl";
    $server = "localhost";

    $konek = mysqli_connect($server, $user, '', $db);
    if(!$konek){
        echo mysqli_error($konek);
    }



?>