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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- đường dẫn tuyệt đối -->
    <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <!-- đường dẫn tương đối  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="script.js"></script>
</head>
<style>
    :root {
        --facebook: #3b5999;
        --instagram: #e4405f;
        --gmail: #55acee;
        --github: #4078c0;
    }

    .s-m ul {
        display: flex;
        list-style: none;

    }

    .s-m ul li {
        display: flex;
        justify-content: space-between;
        overflow: hidden;
        background-color: #fff;
        margin: 0 30px;
        width: 50px;
        height: 50px;
        line-height: 50px;
        border-radius: 50px;
        text-align: center;
        cursor: pointer;
        box-shadow: 0 5px 10px 0 rgba(100, 100, 111, .7);
    }

    .s-m ul li i {
        width: 50px;
        height: 50px;
        line-height: 50px;
        border-radius: 50%;
        background-color: #fff;
        font-size: 1.5em;
    }

    .s-m ul li a {
        width: inherit;
        color: #000;
        font-size: 1em;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.6s linear;
        transform: translateX(90px);
    }

    .s-m ul li,
    .s-m ul li i {
        transition: all .3s ease-in;
    }

    .s-m ul li:hover {
        width: 150px;
    }

    .s-m ul li:hover a {
        transform: translateX(0);
    }

    /* Icons color */

    .s-m ul li:nth-of-type(1) i {
        color: var(--facebook);
    }

    .s-m ul li:nth-of-type(2) i {
        color: var(--instagram);
    }

    .s-m ul li:nth-of-type(3) i {
        color: var(--gmail);
    }

    .s-m ul li:nth-of-type(4) i {
        color: var(--github);
    }

    /* hover icon */

    .s-m ul li:nth-of-type(1):hover i {
        background-color: var(--facebook);
        color: #fff;
    }

    .s-m ul li:nth-of-type(2):hover i {
        background-color: var(--instagram);
        color: #fff;
    }

    .s-m ul li:nth-of-type(3):hover i {
        background-color: var(--gmail);
        color: #fff;
    }

    .s-m ul li:nth-of-type(4):hover i {
        background-color: var(--github);
        color: #fff;
    }

    /* hover in link */

    .s-m ul li:nth-of-type(1):hover a {
        color: var(--facebook);
    }

    .s-m ul li:nth-of-type(2):hover a {
        color: var(--instagram);
    }

    .s-m ul li:nth-of-type(3):hover a {
        color: var(--gmail);
    }

    .s-m ul li:nth-of-type(4):hover a {
        color: var(--github);
    }
</style>

<body>
    <?php

    $user_id = $_SESSION["id"];

    include("connect.php");
    $result = mysqli_fetch_row(mysqli_query($conn, "SELECT `cv_id` FROM `table_cv` WHERE `user_id` = $user_id;"));
    if (isset($result[0])) {
        $cv_id = $result[0];
        $avatar = mysqli_fetch_row(mysqli_query($conn, "SELECT `avatar` FROM `informations` WHERE `cv_id` = $cv_id;"));
        $info = mysqli_fetch_row(mysqli_query($conn, "SELECT * FROM `informations` WHERE `cv_id` = $cv_id;"));
        $contact = mysqli_fetch_row(mysqli_query($conn, "SELECT * FROM `contacts` WHERE `cv_id` = $cv_id;"));
        $edu = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM `educations` WHERE `cv_id` = $cv_id;"));

        $exp = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM `experiences` WHERE `cv_id` = $cv_id;"));
        $skill = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM `skills` WHERE `cv_id` = $cv_id;"));
    }

    ?>

    <!-- About -->
    <div class="container about" style="    margin-top: 3em;">
        <div class="h1 text-center mb-4 title"><i class="far fa-user" style="font-weight: 800;color:#0010ccc7"> Thông Tin Cơ Bản</i> </div>
        <div class="about">
            <div class="card" data-aos="fade-up" data-aos-offset="10">
                <div class="row">
                    <div class="col-lg-5 col-md-12 ">
                        <div class="card-body justify-content-center" style="padding: 0; margin-top: 10px; text-align:center">
                            <img class="avatar" style="padding: 0;margin-bottom:10px;margin-top: 15px;border-radius: 50%;" src="upload/<?php echo $avatar[0]; ?>" width="350px" height="350px" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="card-body  ">

                            <div class="row info">
                                <div class="col-sm-4"><strong>Họ và Tên:</strong></div>
                                <div class="col-sm-8"> <?php echo $info[1] ?></div>
                            </div>
                            <div class="row mt-3 info">
                                <div class="col-sm-4"><strong> <i style="font-size: 25px;" class="fas fa-venus-mars"></i> Giới tính</strong></div>
                                <div class="col-sm-8"><a href="https://www.gmail.com"><?php echo $info[3] ?></a></div>
                            </div>
                            <div class="row mt-3 info">
                                <div class="col-sm-4"><strong><i class="fas fa-birthday-cake"></i></i> Sinh Nhật:</strong></div>
                                <div class="col-sm-8"><?php
                                                        $info["2"] = date("d-m-Y", strtotime($info["2"]));
                                                        echo $info[2] ?></div>
                            </div>
                            <div class="row mt-3 info">
                                <div class="col-sm-4"><strong><i style="font-size: 20px;" class="fas fa-phone"></i> Liên Hệ:</strong></div>
                                <div class="col-sm-8"><?php echo $contact[4]; ?></div>
                            </div>
                            
                            <div class="row mt-3 info">
                                <div class="col-sm-4"><strong><i style="font-size: 20px;" class="far fa-envelope"></i> Email:</strong></div>
                                <div class="col-sm-8"><?php echo $contact[1]; ?></div>
                            </div>
                            <div class="row mt-3 info">
                                <div class="col-sm-4"><strong><i style="font-size: 20px;" class="fas fa-map-marked"></i> Địa Chỉ:</strong></div>
                                <div class="col-sm-8"><?php echo $contact[7] . ' - ' . $contact[6] . ' - ' . $contact[5]; ?></div>
                            </div>
                            <div class="row mt-3 info justify-content-center">

                                <div class="s-m">
                                    <ul>
                                        <li><span><i class="fab fa-facebook"></i></span>
                                            <a href="<?php echo $contact[2]; ?>">FaceBook</a>
                                        </li>

                                        <li><span><i class="fab fa-github"></i></span>
                                            <a href="<?php echo $contact[3]; ?>">GitHub</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12  " style=" padding:20px 50px;">
                        <h1 class="text-center" style="color:#0010ccc7"><i class="fas fa-pen-fancy"></i> About Me</h1>
                        <p style="font-size: 20px;"> <?php echo $info[4] ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Skin -->
    <div class="container skin">
        <div class="h1 text-center mb-4 title" style="font-weight: 800;color:#0010ccc7"><i class="fab fa-codepen"> Kỹ Năng</i></div>
        <div class="about">
            <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom">

                <div class="card-body">
                    <div class="row">
                        <?php
                        foreach ($skill as  $skilllist) {


                            echo '    <div class="col-md-6">';
                            echo    '        <div class=" progress-container progress-primary"><span style="font-size: 25px; font-weight:900;" class="progress-badge">' . $skilllist[1] . '</span>';
                            echo    '            <div class="progress" style="margin:15px 0px">';
                            echo    '               <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: ' . $skilllist[2] . '%;"></div><span class="progress-value"></span>';
                            echo    '            </div>';
                            echo    '         </div>';
                            echo    '    </div>';
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>

        <div class="h1 text-center mb-4 title" style="font-weight: 800; margin-top: 30px;color:#0010ccc7;  "><i class="fas fa-user-graduate"></i> Học Vấn</div>

        <div class="container containerer">
            <div class="timeline">

                <ul> <?php
                        foreach ($edu as  $edulist) {
                            echo '  <li>';
                            echo '<div class="timeline-content text-left" style="margin-left:25px">';
                            echo '<h5><i class="far fa-calendar"></i> ' . $edulist[3] . ' - ' . $edulist[4] . '</h5>';
                            echo '<h4  class="text-uppercase">Trường: ' . $edulist[1] . '</h4>';
                            echo '<h5  class="text-uppercase">Chuyên Ngành ' . $edulist[2] . '</h5>';
                            echo '     </div>';
                            echo ' </li>';
                        } ?>

                </ul>
            </div>
        </div>

        <!-- Exp -->
        <div class="h1 text-center mb-4 title" style="font-weight: 800;color:#0010ccc7;"><i class="fas fa-align-center"></i> Kinh Nghiệm</div>
        <div class="container containerer">


            <div class="timeline">

                <ul> <?php
                        foreach ($exp as  $explist) {
                            echo '  <li>';
                            echo '<div class="timeline-content text-left" style="margin-left:25px">';
                            echo '<h5><i class="far fa-calendar"></i> ' . $explist[3] . ' - ' . $explist[4] . '</h5>';
                            echo '<h4  class="text-uppercase"> Công Ty: ' . $explist[1] . '</h4>';
                            echo '<h5  class="text-uppercase">Chức Vụ: ' . $explist[2] . '</h5>';
                            echo '     </div>';
                            echo ' </li>';
                        } ?>

                </ul>

            </div>
        </div>
    </div>
    </div>
    <div class="container  contact-form">
        <form method="post">
            <h2><i style="font-size:35px" class="fas fa-paper-plane"></i> Liên Hệ</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="txtName" class="form-control" placeholder="Your Name *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
   
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js " integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo " crossorigin="anonymous "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js " integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1 " crossorigin="anonymous "></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js " integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM " crossorigin="anonymous "></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.2.0/jspdf.umd.min.js"></script>



</body>

</html>