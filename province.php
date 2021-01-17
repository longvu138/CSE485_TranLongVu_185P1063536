<?php
require"connect.php";
    $key=$_POST['idprovince'];
  
    $sql="SELECT * FROM district WHERE provinceid='$key'";
    $query=mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)>0)
    {
        while($row=mysqli_fetch_array($query)){
      ?>     
      <option  value="<?php echo $row['districtid'] ?>"><?php echo $row['name'] ?></option> 
<?php
}
}
?>

