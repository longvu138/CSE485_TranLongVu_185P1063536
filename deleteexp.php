<?php
if(isset($_GET['id']))
{
   $id=$_GET['id'];
   include"connect.php";
   $sql ="DELETE FROM `experiences` WHERE `experiences`.`exp_id`= $id";
   if(mysqli_query($conn,$sql))
   {
      echo '<script language="javascript">alert("Xóa thành công");window.location="usereditcv.php"; </script>';
   }
   else {
      echo '<script language="javascript">alert("Xóa không thành công");window.location="usereditcv.php"; </script>';
   }
}
?>
