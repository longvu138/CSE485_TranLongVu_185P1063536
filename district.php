<?php
require"connect.php";
    $key=$_POST['districtid'];
    $sql="SELECT * FROM ward WHERE districtid='$key'";
    $query=mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)>0)
    {
        while($row=mysqli_fetch_array($query)){
      ?>     
      <option  value="<?php echo $row['wardid'] ?>"><?php echo $row['name'] ?></option> 
<?php
}
}
?>

