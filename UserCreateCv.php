<?php
session_start();
if (!isset($_SESSION['status']) || ($_SESSION['status'] != 1)) {
    header("Location: login.php");
    exit();
}
?>
  <?php
        $user_id = $_SESSION["id"];
        include_once "connect.php";
        
        $result = mysqli_fetch_row(mysqli_query($conn, "SELECT count(`cv_id`) FROM `table_cv` WHERE `user_id` = $user_id;"));
        ($result);
        if ((isset($result[0] ))&& ($result[0] == 1)) {
            header("Location: usereditcv.php");
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
                                <!-- <a class="dropdown-item" href="yourcv.php"><i style="font-weight: 900;font-size: 18px;" class="far fa-eye"> Xem CV của bạn</i></a> -->
                                <!-- <a class="dropdown-item" href="usereditcv.php"> <i style="font-size: 18px" class="fas fa-user-edit"> Chỉnh Sửa Thông Tin </i></a> -->
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
            *{
                font-size: 20px;
            }
        </style>
      
       
        <!-- form -->
        <form action="addinformation.php" method="post">

            <!-- Thông tin cơ bản -->
            <div class="form-row " style="margin-bottom:30px">
                <div class="form-group col-md-4">
                    <h3 class="text-center">Thông Tin Cá Nhân</h3>
                    <label for="">Họ và Tên <span>(*)</span></label>
                    <input style="border-radius: 20px;margin-bottom: 15px;" type="text" name="fullname" class="form-control " id="" value="" placeholder="Vui lòng nhập đầy đủ họ và tên..." required>
                    <label for="">Số Điện Thoại <span>(*)</span></label>
                    <input style="border-radius: 20px;margin-bottom: 15px;" type="text" maxlength="10" name="numberphone" class="form-control " id="" value="" placeholder="nhập vào số điện thoại của b" required>

                    <label for="">Sinh Nhật <span>(*)</span></label>
                    <input style="border-radius: 20px;margin-bottom: 15px;" type="date" name="date" class="form-control " id="" value="" required>
                    <label for="">Giới Tính</label></br>
                    
                    <div class="form-row" style="    font-size: 20px;
    padding: 0px;
    margin: 0;
    justify-content: center;">
                        <div class="col-md-4">
                            <input type="radio" name="gender" value="Nam" checked> nam</br>
                        </div>
                        <div class="col-md-4">
                            <input type="radio" name="gender" value="Nữ"> nữ</br>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-4" style=" padding:0 50px;">
                    <h3 class="text-center">Chọn địa chỉ</h3>
                    <label for="">Tỉnh/Thành Phố <span>(*)</span></label>
                    <select style="border-radius: 20px;margin-bottom: 15px;" name="province" class="form-control province" id="province" required>
                        <option value=""> --Tỉnh/Thành phố --</option>
                        <?php
                        include_once 'config.php';
                        $sql = "select * from province";
                        $query = mysqli_query($conn, $sql);
                        $num = mysqli_num_rows($query);
                        if ($num > 0) {
                            while ($row = mysqli_fetch_array($query)) {

                        ?>
                                <option value="<?php echo $row["provinceid"] ?>"><?php echo $row["name"] ?></option>

                        <?php
                            }
                        }
                        ?>
                    </select>


                    <label for="">Quận/Huyện <span>(*)</span></label>
                    <select style="border-radius: 20px;margin-bottom: 15px;" name="district" class="form-control district" id="district" required>
                        <option value=""> -- Quận/Huyện --</option>
                    </select>


                    <label for="">Phường/Xã <span>(*)</span></label>
                    <select style="border-radius: 20px;margin-bottom: 15px;" name="ward" class="form-control ward" id="ward" required>
                        <option value=""> -- Phường/Xã --</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <h3 class="text-center">Mạng Xã Hội</h3>
                    <label for=""> <i class="fas fa-envelope-open"></i> Email <span>(*)</span></label>
                    <input style="border-radius: 20px;margin-bottom: 15px;" type="email" name="email" class="form-control " id="" value="" placeholder=" nhập vào email..." required>
                    <label for=""> <i class="fab fa-facebook"></i> Link Facebook</label>
                    <input style="border-radius: 20px;margin-bottom: 15px;" type="text" name="facebook" class="form-control " id="" placeholder="nhập hoặc dán link facebook vào đây.." required>
                    <label for=""> <i class="fab fa-github-square"></i> Link Github</label>
                    <input style="border-radius: 20px;margin-bottom: 15px;" type="text" name="github" class="form-control " id="" placeholder="nhập hoặc dán link github vào đây.." required>

                </div>

                <label class="h3" for="">about me:</label></br>
                <textarea style="border-radius: 25px;" name="about" id="" class="form-control" rows="4" required></textarea>
            </div>
            <!-- </form>
        <form action="b.php" method="post" id='form' style="border: 1px solid;padding: 15px 20px;border-radius: 21px;"> -->
            <div class="form-row">
                <!-- học vấn -->
                <div class="form-group col-md-4 ">
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

                    </div>
                </div>
                <!-- kỹ năng -->
                <div class="form-group col-md-4 ">
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

                    </div>

                </div>
                <!-- kỹ năng -->
                <div class="form-group col-md-4">
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

                    </div>


                </div>
            </div>
           
            <input style="margin-bottom:15px" type="submit" name="submit" class="btn btn-primary text-center" value="Tạo mới">
        </form>
    </div>

 

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- <script>
        $("#submit").click(function() {
            $.ajax({
                type:"POST",
                url:"b.php",
                data: $("form").serialize(),
                success: function(data) {
                    alert(data);
                    // $("#form")[0].reset();
                }
            });

        });
    </script> -->
    <script>
        // change text
        // $(document).on("dblclick", "#content", function() {

        // var current = $(this).text();
        // $("#content").html('<textarea class="form-control" id="newcont" rows="5">' + current + '</textarea>');
        // $("#newcont").focus();
        // $("#newcont").focus(function() {
        // console.log('in');
        // }).blur(function() {
        // var newcont = $("#newcont").val();
        // $("#content").text(newcont);
        // });

        // })
        // adđ skill
    </script>
    <script>
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
    </script>
</body>

</html>