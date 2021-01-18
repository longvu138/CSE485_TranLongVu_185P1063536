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

</head>

<body>
    <?php
    $user_id = $_SESSION["id"];
    include_once "connect.php";
    $result = mysqli_fetch_row(mysqli_query($conn, "SELECT `cv_id` FROM `table_cv` WHERE `user_id` = $user_id;"));
    $result[0];
    if (isset($_POST['addedu'])) {
        $tentruong = $_POST['tentruong1'];
        $chuyennganh = $_POST["chuyennganh1"];
        $fromyearhv = $_POST["fromyearhv1"];
        $toyearhv = $_POST["toyearhv1"];
        $sql = "INSERT INTO `educations` (`name`, `specialized`, `from_year`, `to_year`, `cv_id`) VALUES ( '$tentruong', '$chuyennganh', '$fromyearhv', '$toyearhv',$result[0]);";
        if (mysqli_query($conn, $sql)) {
            echo '<script language="javascript">alert("bạn đã thêm thành công");window.location="usereditcv.php"; </script>';
        }
    }
    if (isset($_POST['addskill'])) {
        $nameskill = $_POST["nameskill1"];
        $levelskill = $_POST["levelskill1"];
        $sql = "INSERT INTO `skills` (`name`, `levelskill`, `cv_id`) VALUES ( '$nameskill', '$levelskill', $result[0]);";
        if (mysqli_query($conn, $sql)) {
            echo '<script language="javascript">alert("bạn đã thêm thành công ");window.location="usereditcv.php"; </script>';
        }
    }
    if (isset($_POST['addexp'])) {
        $namecongty = $_POST["namecongty1"];
        $chucvu = $_POST["chucvu1"];
        $fromyearkn = $_POST["fromyearkn1"];
        $toyearkn = $_POST["toyearkn1"];
        $sql = "INSERT INTO `experiences` (`namecompany`, `pos`, `from_year`, `to_year`, `cv_id`) VALUES ( '$namecongty', '$chucvu', '$fromyearkn', '$toyearkn',$result[0]);";
        if (mysqli_query($conn, $sql)) {
            echo '<script language="javascript">alert("bạn đã thêm thành công");window.location="usereditcv.php"; </script>';
        }
    }
    ?>

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
                                <a class="dropdown-item" href="yourcv.php?id=<?php echo $user_id ?>"><i style="font-weight: 900;font-size: 18px;" class="far fa-eye"> Xem CV của bạn</i></a>
                                <!-- <a class="dropdown-item" href="useraddinfo.php"> <i style="font-size: 18px" class="fas fa-user-edit"> Thêm Thông Tin </i></a> -->
                                <a class="dropdown-item" href="changepass.php"> <i style="font-size: 18px" class="fas fa-key"> Đổi Mật Khẩu </i></a>
                                <a class="dropdown-item" href="logout.php"> <i style="font-size: 18px" class="fas fa-sign-out-alt"> Đăng Xuất</i></a>


                            </div>
                        </li>

                    </ul>

                </div>
            </nav>

        </div>
    </div>

    <div class="container">
        <div class="form-row">

            <div class="form-group col-md-4 ">
                <form action="useraddinfo.php" method="POST">
                    <h3 class="text-center">Học Vấn </h3>
                    <div class="form-group text-center">
                        <i style="font-size:20px; margin:0 25px" type="button" class="fas fa-plus buttonhocvan "></i>
                        <i style="font-size:20px; margin:0 25px" type="button" class="fas fa-trash deletehocvan"></i>
                    </div>
                    <div class="hocvan">
                        <label for="">Tên Trường <span>(*)</span></label>
                        <input style="border-radius: 20px;margin-bottom: 15px;" type="text" name="tentruong1" class="form-control " id="" value="" placeholder="Nhập tên trường..." required>
                        <label for="">Chuyên ngành <span>(*)</span></label>
                        <input style="border-radius: 20px;margin-bottom: 15px;" type="text" name="chuyennganh1" class="form-control " id="" value="" placeholder="nhập chuyên ngành..." required>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="">Từ năm</label>
                                <input type="number" maxlength="4" name="fromyearhv1" class="form-control " id="" value="" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Đến năm</label>
                                <input type="number" maxlength="4" name="toyearhv1" class="form-control " id="" value="" required>
                            </div>

                        </div>
                        <button type="submit" name="addedu" class="btn btn-primary">Thêm Học Vấn</button>
                    </div>
                </form>
            </div>

            <!-- kỹ năng -->

            <div class="form-group col-md-4 ">
                <form action="useraddinfo.php" method="POST">
                    <h3 class="text-center">Kỹ Năng</h3>
                    <div class="form-group text-center">
                        <i style="font-size:20px; margin:0 25px" type="button" class="fas fa-plus buttonskill "></i>
                        <i style="font-size:20px; margin:0 25px" type="button" class="fas fa-trash deleteskill"></i>
                    </div>
                    <div class="skill " style="    padding: 0 30px">

                        <label for="">Tên kỹ năng <span>(*)</span></label>
                        <input style="border-radius: 20px;margin-bottom: 15px;" type="text" name="nameskill1" class="form-control " id="" value="" placeholder="Nhập tên kỹ năng..." required>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Mức độ kỹ năng</label>
                                <input style="border-radius: 20px;margin-bottom: 15px;" type="range" class="form-range skilllevel" min="0" max="100" name="levelskill1" class="form-control " id="" value="">
                            </div>
                        </div>
                        <button type="submit" name="addskill" class="btn btn-primary">Thêm kỹ năng</button>
                    </div>

                </form>
            </div>

            <!-- kinh nghiệm -->

            <div class="form-group col-md-4">
                <form action="useraddinfo.php" method="POST">
                    <h3 class="text-center">Kinh nghiệm làm việc </h3>
                    <div class="form-group text-center">
                        <i style="font-size:20px; margin:0 25px" type="button" class="fas fa-plus buttonkn "></i>
                        <i style="font-size:20px; margin:0 25px" type="button" class="fas fa-trash deletekn"></i>
                    </div>
                    <div class="kinhnghiem ">
                        <label for="">Tên Công Ty <span>(*)</span></label>
                        <input style="border-radius: 20px;margin-bottom: 15px;" type="text" name="namecongty1" class="form-control " id="" value="" placeholder="Nhập tên trường..." required>
                        <label for="">Chức Vụ<span>(*)</span></label>
                        <input style="border-radius: 20px;margin-bottom: 15px;" type="text" name="chucvu1" class="form-control " id="" value="" placeholder="nhập chuyên ngành..." required>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="">Từ năm</label>
                                <input type="number" maxlength="4" name="fromyearkn1" class="form-control " id="" value="" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Đến năm</label>
                                <input type="number" maxlength="4" name="toyearkn1" class="form-control " id="" value="" required>
                            </div>

                        </div>
                        <button type="submit" name="addexp" class="btn btn-primary">Thêm kinh nghiệm</button>
                    </div>

                </form>
            </div>

        </div>

    </div>
    </div>



    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- <script>
            hocvan = 1;
            $('.buttonhocvan').click(function() {

                hocvan++;
                /*  alert(input) */
                //  $("h3:last").addClass("skill");
                $(".hocvan:last").append(' <div class="hocvan' + hocvan + ' style="border:1px soild red">' +
                    '  <label for="">Tên Trường <span>(*)</span></label>' +
                    ' <input style="border-radius: 20px;margin-bottom: 15px;" type="text" name="tentruong' + hocvan + '" class="form-control " id="" value="" placeholder="Nhập tên trường..." required>' +
                    '<label for="">Chuyên ngành <span>(*)</span></label>' +
                    '<input style="border-radius: 20px;margin-bottom: 15px;" type="text" name="chuyennganh' + hocvan + '" class="form-control " id="" value="" placeholder="nhập chuyên ngành..." required>' +
                    '<div class="form-row">' +
                    '<div class="form-group col-md-3">' +
                    '<label for="">Từ năm</label>' +
                    '<input type="text" maxlength="4" name="fromyearhv' + hocvan + '" class="form-control " id="" value="">' +
                    '</div>' +

                    '<div class="form-group col-md-3">' +
                    '<label for="">Đến năm</label>' +
                    '<input type="text" maxlength="4" name="toyearhv' + hocvan + '" class="form-control " id="" value="">' +
                    '</div>' +

                    '</div>' +
                    '<hr>' +
                    '</div>');
            });



            $(".deletehocvan").click(function() {


                $('.hocvan' + hocvan-- + '').last().remove();
            });
        </script>
        <script>
            sk = 1;
            $('.buttonskill').click(function() {

                sk++;
                $(".skill:last").append('  <div class="skill' + sk + '">' +
                    '<label for="">Tên kỹ năng <span>(*)</span></label>' +
                    '<input style="border-radius: 20px;margin-bottom: 15px;" type="text" name="nameskill' + sk + '" class="form-control " id="" value="" placeholder="Nhập tên kỹ năng..." required>' +
                    ' <div class="row">' +
                    ' <div class="form-group col-md-6">' +
                    '<label for="">Mức độ kỹ năng</label>' +
                    '<input style="border-radius: 20px;margin-bottom: 15px;" type="range" class="form-range" min="0" max="100" name="levelskill' + sk + '" class="form-control " id="" value="" required>' +
                    '</div>' +
                    '</div>' +
                    ' <hr>' +
                    '</div>');
            });
            $(".deleteskill").click(function() {

                $('.skill' + sk-- + '').last().remove();
            });
        </script>
        <script>
            kn = 1;
            $('.buttonkn').click(function() {

                kn++;
                /*  alert(input) */
                //  $("h3:last").addClass("skill");
                $(".kinhnghiem:last").append(' <div class="kinhnghiem' + kn + ' style="border:1px soild red">' +
                    '  <label for="">Tên công ty <span>(*)</span></label>' +
                    ' <input style="border-radius: 20px;margin-bottom: 15px;" type="text" name="namecongty' + kn + '" class="form-control " id="" value="" placeholder="Nhập tên trường..." required>' +
                    '<label for="">Chức vụ <span>(*)</span></label>' +
                    '<input style="border-radius: 20px;margin-bottom: 15px;" type="text" name="chucvu' + kn + '" class="form-control " id="" value="" placeholder="nhập chuyên ngành..." required>' +
                    '<div class="form-row">' +
                    '<div class="form-group col-md-3">' +
                    '<label for="">Từ năm</label>' +
                    '<input type="text" maxlength="4" name="fromyearkn' + kn + '" class="form-control " id="" value="" required>' +
                    '</div>' +

                    '<div class="form-group col-md-3">' +
                    '<label for="">Đến năm</label>' +
                    '<input type="text" maxlength="4" name="toyearkn' + kn + '" class="form-control " id="" value=""required>' +
                    '</div>' +

                    '</div>' +
                    '<hr>' +
                    '</div>');
            });


            $(".deletekn").click(function() {


                $('.kinhnghiem' + kn-- + '').last().remove();
            });
        </script> -->

</body>

</html>