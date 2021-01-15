<?php
require"config.php";
    $key=$_POST['wardid'];
    $sql="SELECT * FROM village WHERE wardid='$key'";
    $query=mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)>0)
    {
        while($row=mysqli_fetch_array($query)){
      ?>     
      <option value="<?php echo $row['villageid'] ?>"><?php echo $row['name'] ?></option> 
<?php
}
}
?>

