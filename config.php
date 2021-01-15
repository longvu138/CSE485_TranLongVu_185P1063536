<?php 
//buowsc1 :Kết nối sql
$conn = mysqli_connect('localhost', 'root', '', 'vnlocation');
 if (!$conn) {
     die('Khong the ket noi. Kiem tra lai cac tham so');
     exit();
 }
?>