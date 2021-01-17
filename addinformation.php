<?php


if (isset($_POST["submit"])) {
    $name = $_POST['fullname'];
    $numberphone = $_POST['numberphone'];
    // echo $numberphone;
    $gender = $_POST['gender'];
    $dateofbirth = $_POST['date'];
    $province = $_POST['province'];
    $district = $_POST['district'];
    $ward = $_POST['ward'];
    $email = $_POST['email'];
    $facebook = $_POST['facebook'];
    $github = $_POST['github'];
    $about=$_POST['about'];
    
    session_start();
    $id = $_SESSION['id'];
    

    include_once "config.php";
    $sql  = "SELECT name FROM `province` WHERE provinceid='$province'";
    $tentinh = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($tentinh)) {
        $nametinh = $row["name"];
    }
    $tenhuyen = mysqli_query($conn, "SELECT name FROM `district` WHERE provinceid='$province' AND districtid ='$district'");
    while ($row = mysqli_fetch_array($tenhuyen)) {
        $namehuyen = $row["name"];
    }
    $tenxa = mysqli_query($conn, "SELECT name	 FROM `ward` WHERE districtid='$district' and wardid='$ward'");
    while ($row = mysqli_fetch_array($tenxa)) {
        $namexa = $row["name"];
    }
    // $address = $namexa . ' - ' . $namehuyen . ' - ' . $nametinh;
    // echo $address;
    // echo $name;
    // echo $gender;
    // echo $dateofbirth;

    // 
    $count = 1;
    $namesc = "tentruong" . $count;
    $sqlAddAll = "";
    while (isset($_POST[$namesc])) {
        $tentruong = $_POST["tentruong" . $count];
        $chuyennganh = $_POST["chuyennganh" . $count];
        $fromyearhv = $_POST["fromyearhv" . $count];
        $toyearhv = $_POST["toyearhv" . $count];
        $sql = "INSERT INTO `educations` (`name`, `specialized`, `from_year`, `to_year`, `cv_id`) VALUES ( '$tentruong', '$chuyennganh', '$fromyearhv', '$toyearhv',@cv_id);";
        $sqlAddAll .= $sql;
        $count++;
        $namesc = "tentruong" . $count;
    }

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
        "INSERT INTO `contacts` (`email`,`facebook`,`github`,`phone`,`city`,`district`,`address`,`cv_id`) VALUES ('$email','$facebook','$github','$numberphone','$nametinh','$namehuyen','$namexa',@cv_id); " .
        $sqlAddAll .
        "COMMIT;";
        echo $sql;
        
   include_once"connect.php";
    if (mysqli_multi_query($conn, $sql)) {
        header("location:usereditcv.php");
    } else {
        echo "$sql $conn->error";
    }
    mysqli_close($conn);
}
?>
