<?php
session_start();
if (!isset($_SESSION['status']) || ($_SESSION['status'] != 1)) {
    header("Location: login.php");
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!--  meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="css/header.css">
    <script src="jquery-3.5.1.min.js"></script>
    <script src="js/ajax.js"></script>

</head>

<body>
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

        $id = $_SESSION['id'];
        $name = $_POST['fullname'];
        $numberphone = $_POST['numberphone'];
        $gender = $_POST['gender'];
        $dateofbirth = $_POST['date'];
        $province = $_POST['province'];
        $district = $_POST['district'];
        $ward = $_POST['ward'];
        $email = $_POST['email'];
        $facebook = $_POST['facebook'];
        $github = $_POST['github'];
        $about = $_POST['about'];

        $sqlAddAll = "";

        foreach ($edu as $edulist) {
            $namesc = "tentruong1" . $edulist[0];

            if (isset($_POST[$namesc])) {
                $tentruong = $_POST["tentruong1" . $edulist[0]];
                $chuyennganh = $_POST["chuyennganh1" . $edulist[0]];
                $fromyearhv = $_POST["fromyearhv1" . $edulist[0]];
                $toyearhv = $_POST["toyearhv1" . $edulist[0]];
                $sql = "UPDATE `educations` Set `name`=' $tentruong', `specialized`='$chuyennganh', `from_year`=$fromyearhv, `to_year`=$toyearhv where `cv_id`=@cv_id and `edu_id`=$edulist[0];";
                $sqlAddAll .= $sql;
                $namesc = "tentruong1" . $edulist[0];
            }
        }

        foreach ($skill as $skilllist) {
            $namesk = "nameskill1" . $skilllist[0];

            if (isset($_POST[$namesk])) {
                $nameskill = $_POST["nameskill1" . $skilllist[0]];
                $nameskill;
                $levelskill = $_POST["levelskill" . $skilllist[0]];
                $levelskill;
                $sql = "UPDATE `skills` set `name`='$nameskill' , `levelskill` = $levelskill WHERE `cv_id`=@cv_id and `skill_id` = $skilllist[0];";
                $sqlAddAll .= $sql;
                "nameskill" . $skilllist[0];
            }
        }
        // 
        foreach ($exp as $explist) {
            $namecty = "namecongty1" . $explist[0];

            if (isset($_POST[$namecty])) {
                $namecongty = $_POST["namecongty1" . $explist[0]];
                $chucvu = $_POST["chucvu1" . $explist[0]];
                $fromyearkn = $_POST["fromyearkn1" . $explist[0]];
                $toyearkn = $_POST["toyearkn1" . $explist[0]];
                $sql = "UPDATE  `experiences` SET `namecompany`='$namecongty', `pos`='$chucvu', `from_year`='$fromyearkn', `to_year`='$toyearkn' where `cv_id`=@cv_id and `exp_id`=$explist[0];";
                $sqlAddAll .= $sql;
                "nameskill1" . $explist[0];
            }
        }


            $sql = "START TRANSACTION; " .
            "SELECT @cv_id := `cv_id` FROM `table_cv` WHERE `user_id` = $user_id; " .
            "UPDATE `informations` SET `fullname` = '$name', `birthday` = '$dateofbirth', `gender` = '$gender', `about` = '$about' WHERE `cv_id` = @cv_id; " .
            "UPDATE `contacts` SET `email` = '$email',`facebook`='$facebook',`github`='$github', `phone` = '$numberphone', `city` = '$province', `district` = '$district', `address1` = '$ward' WHERE `cv_id` = @cv_id; " .
            $sqlAddAll .
            "COMMIT;";
           include_once"connect.php";
            if (mysqli_multi_query($conn, $sql)) {
                echo " <script> alert(' Bạn đã cập nhật thông tin thành công') </script>";
                header("Refresh:0");
            } else {
                echo "$sql $conn->error";
            }
            mysqli_close($conn);
    }
    ?>
    <!-- menu -->
    <div class="container-fluid bg-dark" style="margin:0;padding:0;">
        <div class="container " style="    margin-bottom: 5rem;">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <a class="navbar-brand" href="#">
                    <h1 style="color: white;">My CV</h1>
                </a>
                <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown  active">
                            <a class="nav-link dropdown-toggle" style="    color:white;display: flex;font-size:25px" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p style="font-size: 20px;color:white;" class="text-uppercase"> <?php echo " Xin chào " . $_SESSION['username'] ?></p>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="yourcv.php"><i style="font-weight: 900;font-size: 18px;" class="far fa-eye"> Xem CV của bạn</i></a>
                               
                                <a class="dropdown-item" href="logout.php"> <i style="font-size: 18px" class="fas fa-sign-out-alt"> Đăng Xuất</i></a>


                            </div>
                        </li>

                    </ul>

                </div>
            </nav>

        </div>
    </div>
    <!-- body -->
    <div class="container">
        <!-- avatar -->
        <style>
            * {
                font-size: 20px;
            }
        </style>

        <div class="text-center" style=" margin-bottom: 80px;">
            <img src="upload/<?php echo $avatar['avatar']; ?>" style="width:300px; height:300px; border-radius:50%" alt="">
            <form action="usereditcv.php" method="post" enctype="multipart/form-data">
                <label for="">
                    <h5 style=" margin-top: 15px;"></h5>
                </label><br>
                <input type="file" name="fileUpload" value="">
                <input type="submit" name="up" value="Cập Nhật Avatar">
            </form>
        </div>
        <?php
        if (isset($_POST['up']) && isset($_FILES['fileUpload'])) {
            if ($_FILES['fileUpload']['error'] > 0)
                echo "Upload lỗi rồi!";
            else {
                if ($_FILES["fileUpload"]["type"] == "image/jpeg" || $_FILES["fileUpload"]["type"] == "image/png") {
                    $path = "upload/";
                    $tmp_name = $_FILES['fileUpload']['tmp_name'];
                    $image = $_FILES['fileUpload']['name'];
                    move_uploaded_file($tmp_name, $path . $image);
                    $sql = "UPDATE `informations` SET `avatar` = '$image' WHERE `informations`.`cv_id` = $cv_id;";
                    echo $sql;
                    if (mysqli_query($conn, $sql)) {

                        // echo "upload thành công <br/>";
                        // echo 'Dường dẫn: upload/' . $_FILES['fileUpload']['name'] . '<br>';
                        // echo 'Loại file: ' . $_FILES['fileUpload']['type'] . '<br>';
                        // echo 'Dung lượng: ' . ((int)$_FILES['fileUpload']['size'] / 1024) . 'KB';         
                        echo " <script> alert(' cập nhật avatar thành công') </script>";
                        header("Refresh:0");
                    }
                }
            }
        }
        ?>
        <!-- form -->
        <form action="usereditcv.php" method="post">
            <!-- Thông tin cơ bản -->
            <div class="form-row " style="margin-bottom:30px">
                <div class="form-group col-md-4" style="padding: 0 15px;">
                    <h3 class="text-center">Thông Tin Cá Nhân</h3>
                    <label for="">Họ và Tên <span>(*)</span></label>
                    <input style="border-radius: 20px;margin-bottom: 15px;" type="text" name="fullname" class="form-control " id="" value="<?php echo $info[1] ?>" placeholder="Vui lòng nhập đầy đủ họ và tên...">
                    <label for="">Số Điện Thoại <span>(*)</span></label>
                    <input style="border-radius: 20px;margin-bottom: 15px;" type="text" maxlength="10" name="numberphone" class="form-control " id="" value="<?php echo $contact[4]; ?>" placeholder="nhập vào số điện thoại của b">

                    <label for="">Sinh Nhật <span>(*)</span></label>
                    <input style="border-radius: 20px;margin-bottom: 15px;" type="date" name="date" class="form-control " id="" value="<?php echo $info[2] ?>">
                    <label for="">Giới Tính</label></br>

                    <div class="form-row" style="font-size: 20px; padding: 0px; margin: 0; justify-content: center;">
                        <div class="col-md-4">
                            <input type="radio" name="gender" value="nam"<?php if (trim($info[3]) == "nam") echo "checked"; ?>>nam
                        </div>
                        
                        <div class="col-md-4">
                            <input type="radio" name="gender" value="nữ" <?php if (trim($info[3]) == "nữ") echo "checked"; ?>>nữ
                        </div>
                    </div>
                    

                </div>
                <div class="form-group col-md-4" style="padding: 0 15px;">
                    <h3 class="text-center">Chọn địa chỉ</h3>
                    <label for="">Tỉnh/Thành Phố <span>(*)</span></label>
                    <input style="border-radius: 20px;margin-bottom: 15px;" name="province" class="form-control province" id="province" value="<?php echo $contact["5"] ?>">
                    </input>
                    <label for="">Quận/Huyện <span>(*)</span></label>
                    <input style="border-radius: 20px;margin-bottom: 15px;" name="district" class="form-control district" id="district" value="<?php echo $contact["6"] ?>">
                    </input>
                    <label for="">Phường/Xã <span>(*)</span></label>
                    <input style="border-radius: 20px;margin-bottom: 15px;" name="ward" class="form-control ward" id="ward" value="<?php echo $contact["7"] ?>">
                    </input>
                </div>

                <div class="form-group col-md-4 " style="padding: 0 15px;">
                    <h3 class="text-center">Mạng Xã Hội</h3>
                    <label for=""> <i class="fas fa-envelope-open"></i> Email <span>(*)</span></label>
                    <input style="border-radius: 20px;margin-bottom: 15px;" type="email" name="email" class="form-control " id="" value=" <?php echo $contact[1] ?>">
                    <label for=""> <i class="fab fa-facebook"></i> Link Facebook</label>
                    <input style="border-radius: 20px;margin-bottom: 15px;" type="text" name="facebook" class="form-control " id="" value=" <?php echo $contact[2] ?>">
                    <label for=""> <i class="fab fa-github-square"></i> Link Github</label>
                    <input style="border-radius: 20px;margin-bottom: 15px;" type="text" name="github" class="form-control " id="" value=" <?php echo $contact[3] ?>">

                </div>

                <label class="h3" style="padding: 0 10px;" for="">about me:</label></br>
                <textarea style="border-radius: 25px; " name="about" id="" class="form-control" rows="4"><?php echo $info[4] ?> </textarea>
            </div>
            <!-- </form>
        <form action="b.php" method="post" id='form' style="border: 1px solid;padding: 15px 20px;border-radius: 21px;"> -->
            <div class="form-row" style="padding-top:35px">
                <!-- học vấn -->
                <div class="form-group col-md-4  " style="padding: 0 20px;">
                    <h3 class="text-center">Học Vấn </h3>
                    <?php
                    foreach ($edu as  $edulist) {
                        echo '  <div class="form-group text-center">';
                        echo '  </div>                ';
                        echo ' <div class="hocvan">';
                        echo ' <label for="">Tên Trường <span>(*)</span></label>';
                        echo ' <input style="border-radius: 20px;margin-bottom: 15px;" type="text" name="tentruong1' . $edulist[0] . '" class="form-control " id="" value="' . $edulist[1] . '" >';
                        echo ' <label for="">Chuyên ngành <span>(*)</span></label>';
                        echo ' <input style="border-radius: 20px;margin-bottom: 15px;" type="text" name="chuyennganh1' . $edulist[0] . '" class="form-control " id="" value="' . $edulist[2] . '" >';
                        echo ' <div class="form-row">';
                        echo '     <div class="form-group col-md-4">';
                        echo '         <label for="">Từ năm</label>';
                        echo '         <input  style="border-radius: 20px;" type="number" maxlength="4" name="fromyearhv1' . $edulist[0] . '" class="form-control " id="" value="' . $edulist[3] . '" >';
                        echo '     </div>';
                        echo '                            <div class="form-group col-md-4">';
                        echo '         <label for="">Đến năm</label>';
                        echo '         <input style="border-radius: 20px;" type="number"  maxlength="4" name="toyearhv1' . $edulist[0] . '" class="form-control " id="" value="' . $edulist[4] . '" >';
                        echo '     </div>';
                        echo ' </div>';
                        echo '    </div>';
                    }  ?>
                </div>
                <!-- kỹ năng -->

                <div class="form-group col-md-4 " style="padding: 0 20px;">
                    <h3 class="text-center">Kỹ Năng</h3>
                    <?php
                    foreach ($skill as  $skilllist) {

                        echo ' <div class="form-group text-center">';
                        echo ' </div>';
                        echo ' <div class="skill " style="    padding: 0 15px 0 15px">';
                        echo '     <label for="">Tên kỹ năng <span>(*)</span></label>';
                        echo '     <input style="border-radius: 20px;margin-bottom: 15px;" type="text" name="nameskill1' . $skilllist[0] . '" class="form-control " id="" value="' . $skilllist[1] . ' " >';
                        echo '     <div class="row">';
                        echo '         <div class="form-group col-md-6">';
                        echo '             <label for="">Mức độ kỹ năng</label>';
                        echo '             <input style="border-radius: 20px;margin-bottom: 15px;" type="range" class="form-range skilllevel" min="0" max="100" name="levelskill' . $skilllist[0] . '" class="form-control " id="" value="' . $skilllist[2] . '">';
                        echo '         </div>';
                        echo '     </div>';
                        echo ' </div>';
                    }
                    ?>
                </div>
                <!-- kỹ năng -->
                <div class="form-group col-md-4" style="padding: 0 20px;">
                    <h3 class="text-center">Kinh nghiệm làm việc </h3>
                    <div class="form-group text-center">
                        <?php
                        foreach ($exp as  $explist) {
                            echo '  <div class="kinhnghiem ">';
                            echo ' <label for="">Tên Công Ty <span>(*)</span></label>';
                            echo ' <input style="border-radius: 20px;margin-bottom: 15px;" type="text" name="namecongty1' . $explist[0] . '" class="form-control " id="" value="' . $explist[1] . '"  >';
                            echo ' <label for="">Chức Vụ<span>(*)</span></label>';
                            echo ' <input style="border-radius: 20px;margin-bottom: 15px;" type="text" name="chucvu1' . $explist[0] . '" class="form-control " id="" value="' . $explist[2] . '"  >';
                            echo ' <div class="form-row">';
                            echo '     <div class="form-group col-md-4">';
                            echo '         <label for="">Từ năm</label>';
                            echo '         <input type="number" maxlength="4" name="fromyearkn1' . $explist[0] . '" class="form-control " id="" value="' . $explist[3] . '" >';
                            echo '     </div>';
                            echo '                            <div class="form-group col-md-4">';
                            echo '         <label for="">Đến năm</label>';
                            echo '         <input type="number" maxlength="4" name="toyearkn1' . $explist[0] . '" class="form-control " id="" value="' . $explist[4] . '" >';
                            echo '     </div>';
                            echo '                        </div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
    </div>
    <input style="margin-bottom:15px" type="submit" name="capnhat" class="btn btn-primary " value="Cập Nhật">
    </form>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

</html>