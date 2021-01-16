<?php
        $user_id = $_SESSION["id"];
        include_once "connect.php";
        $result = mysqli_fetch_row(mysqli_query($conn, "SELECT `cv_id` FROM `table_cv` WHERE `user_id` = $user_id;"));
        if (isset($result[0])) {
            $cv_id = $result[0];
            $avatar = mysqli_fetch_array(mysqli_query($conn, "SELECT `avatar` FROM `informations` WHERE `cv_id` = $cv_id;"));
            $info = mysqli_fetch_row(mysqli_query($conn, "SELECT * FROM `informations` WHERE `cv_id` = $cv_id;"));
            $contact = mysqli_fetch_row(mysqli_query($conn, "SELECT * FROM `contacts` WHERE `cv_id` = $cv_id;"));
            $edu = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM `educations` WHERE `cv_id` = $cv_id;"));
            $exp = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM `experiences` WHERE `cv_id` = $cv_id;"));
            $skill = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM `skills` WHERE `cv_id` = $cv_id;"));
        }
      


if (isset($_POST["capnhat"])) {
    session_start();
   echo $id = $_SESSION['id'];
   echo $name = $_POST['fullname'];
   echo  $numberphone = $_POST['numberphone'];
   echo $gender = $_POST['gender'];
   echo $dateofbirth = $_POST['date'];
   echo $province = $_POST['province'];
   echo $district = $_POST['district'];
   echo $ward = $_POST['ward'];
   echo  $email = $_POST['email'];
   echo  $facebook = $_POST['facebook'];
   echo  $github = $_POST['github'];
   echo $about=$_POST['about'];
    
 
    $sqlAddAll = "";
  
   foreach ($edu as $edulist) {
    $namcesc="tentruong1".$edulist[0];
    if(isset($_POST[$namesc])) {
        $tentruong = $_POST["tentruong1" . $edulist[0]];
        $chuyennganh = $_POST["chuyennganh1" . $edulist[0]];
        $fromyearhv = $_POST["fromyearhv1" .$edulist[0]];
        $toyearhv = $_POST["toyearhv1" .$edulist[0]];
        $sql = "INSERT INTO `educations` (`name`, `specialized`, `from_year`, `to_year`, `cv_id`) VALUES ( '$tentruong', '$chuyennganh', '$fromyearhv', '$toyearhv',@cv_id);";
        $sqlAddAll .= $sql;
        $namesc = "tentruong1" . $edulist[0];
   } 
    }
    // $sqlAdd = "";
    // foreach ($eduList as $edu) {
    //     $ele = "edu-input" . $edu[0];
    //     if (isset($_POST[$ele])) {
    //         $type = $_POST["type-edu-select" . $edu[0]];
    //         $name = $_POST["edu-input" . $edu[0]];
    //         $spec = $_POST["spec-input" . $edu[0]];
    //         $from = $_POST["edu-from-input" . $edu[0]];
    //         $to = $_POST["edu-to-input" . $edu[0]];
    //         $sql = "UPDATE `educations` SET `type_edu` = '$type', `name` = '$name', `spec` = '$spec', `y_from` = $from, `y_to` = $to WHERE `cv_id` = @cv_id AND `edu_id` = $edu[0]; ";
    //         $sqlAdd .= $sql;
    //         $ele = "edu-input" . $edu[0];
    //     }
    // }
    //    
    $count = 1;
    $namesk = "nameskill" . $count;

    while (isset($_POST["nameskill" . $count])) {
        $nameskill = $_POST["nameskill" . $count];
        $levelskill = $_POST["levelskill" . $count];
        $sql = "INSERT INTO `skills` (`name`, `levelskill`, `cv_id`) VALUES ( '$nameskill', '$levelskill', @cv_id);";
        $sqlAddAll .= $sql;
        $count++;
        "nameskill" . $count;
    }


    // 
    $count = 1;
    $namecty = "namecongty" . $count;

    while (isset($_POST["namecongty" . $count])) {
        $namecongty = $_POST["namecongty" . $count];
        $chucvu = $_POST["chucvu" . $count];
        $fromyearkn = $_POST["fromyearkn" . $count];
        $toyearkn = $_POST["toyearkn" . $count];
        $sql = "INSERT INTO `experiences` (`namecompany`, `pos`, `from_year`, `to_year`, `cv_id`) VALUES ( '$namecongty', '$chucvu', '$fromyearkn', '$toyearkn', @cv_id);";
        $sqlAddAll .= $sql;
        $count++;
        "nameskill" . $count;
    }
    // echo $sqlAddAll;

    $sql = "START TRANSACTION; " .
    "INSERT INTO `table_cv` (`user_id`) VALUES  ($id);". 
        "SELECT @cv_id := `cv_id` FROM `table_cv` WHERE `user_id` = $id; " .
        "INSERT INTO `informations` (`fullname`,`birthday`,`gender`,`about`,`cv_id`) VALUES ('$name','$dateofbirth','$gender','$about',@cv_id); " .
        "INSERT INTO `contacts` (`email`,`facebook`,`github`,`phone`,`city`,`district`,`address1`,`cv_id`) VALUES ('$email','$facebook','$github','$numberphone','$nametinh','$namehuyen','$namexa',@cv_id); " .
        $sqlAddAll .
        "COMMIT;";
        echo $sql;
        
   include_once"connect.php";
    if (mysqli_multi_query($conn, $sql)) {
        header("location:yourcv.php");
    } else {
        echo "$sql $conn->error";
    }
    mysqli_close($conn);
}
?>
        