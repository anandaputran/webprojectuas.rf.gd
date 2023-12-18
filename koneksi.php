<?php
    $host="sql101.infinityfree.com";
    $user="if0_35640798";
    $password="I5y6rIy8MRZqE";
    $db="if0_35640798_shopping_cart";
    
    $kon = mysqli_connect($host,$user,$password,$db);
    if (!$kon)
    {
          die("Koneksi gagal:".mysqli_connect_error());
    }

    try 
    {    
        //create PDO connection 
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    } 
    catch(PDOException $e) 
    {
        //show error
        die("Terjadi masalah: " . $e->getMessage());
    }
?>