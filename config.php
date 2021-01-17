<?php 
//buowsc1 :Kết nối sql
$conn = mysqli_connect('localhost', 'root', '', 'testmycv');
 if (!$conn) {
     die('Khong the ket noi. Kiem tra lai cac tham so');
     exit();
 }
?>