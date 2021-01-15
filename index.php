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
    <!-- gif -->
    <!-- <div class="load">
        <img src="f.gif">
    </div> -->
    <!-- //gif -->
    <!-- <div class="preload">
        <span class="loader"><span class="loader-inner"></span></span>
    </div> -->
    <!-- headerMenu -->

    <nav>
        <div class="wrapper ">
            <div class="logo">
                <a href="#">
                    <h1><i class="fas fa-code"> Your CV</i></h1>
                </a>
            </div>
            <input type="radio" name="slider" id="menu-btn">
            <input type="radio" name="slider" id="close-btn">
            <ul class="nav-links">
                <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>

                <li><a href="login.php">Đăng Nhập </a></li>
                <li><a href="signup.php">Đăng Ký</a></li>
            </ul>
            <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
        </div>
    </nav>

    <!--header IMG  -->
    <div class="content" style=" background-image: linear-gradient(rgba(116, 109, 109, 0.185), #1b1b29), url(./img/mau-background-dep.jpg); height:515px;">
        <div class="text">
            <div class="row">
                <!-- <div class="col-xs-1-12">

                    <h1>Vui lòng đăng nhập để tạo CV </h1>
                </div> -->
            </div>
        </div>
    </div>
    <!-- About -->
    <div class="container about">
        <div class="h1 text-center mb-4 title"><i class="far fa-user" style="font-weight: 800;color:#0010ccc7"> Thông Tin</i> </div>
        <div class="about">

            <div class="card" data-aos="fade-up" data-aos-offset="10">
                <div class="row">
                    <div class="col-lg-5 col-md-12 ">
                        <div class="card-body justify-content-center" style="padding: 0; margin-top: 10px;text-align: center;">

                            <img style="padding: 0;margin-bottom:10px;border-radius: 50%;" src="img/mau-background-dep.jpg" width="280px" height="280px" alt="">

                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="card-body  ">

                            <div class="row info">
                                <div class="col-sm-4"><strong>Họ và Tên:</strong></div>
                                <div class="col-sm-8"> Trần Long Vũ</div>
                            </div>
                            <!-- <div class="row mt-3 info">
                                <div class="col-sm-4"><strong> <i style="font-size: 20px;" class="fas fa-envelope-open"></i> Email:</strong></div>
                                <div class="col-sm-8"><a href="https://www.gmail.com">tranlongvu138@gmail.com</a></div>
                            </div> -->
                            <div class="row mt-3 info">
                                <div class="col-sm-4"><strong><i style="font-size: 20px;" class="fas fa-phone"></i> Liên Hệ:</strong></div>
                                <div class="col-sm-8">0389-709-577</div>
                            </div>
                            <div class="row mt-3 info">
                                <div class="col-sm-4"><strong><i style="font-size: 20px;" class="fas fa-map-marked"></i> Địa Chỉ:</strong></div>
                                <div class="col-sm-8">Nhân Chính - Thanh Xuân - Hà Nội</div>
                            </div>
                            <div class="row mt-3 info justify-content-center">

                                <div class="s-m">
                                    <ul>
                                        <li><span><i class="fab fa-facebook"></i></span>
                                            <a href="">FaceBook</a>
                                        </li>
                                        <li><span><i class="fa fa-envelope"></i></span>
                                            <a href="">Gmail</a>
                                        </li>
                                        <li><span><i class="fab fa-github"></i></span>
                                            <a href="">GitHub</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12  " style=" padding:10px 100px;">
                        <h1 class="text-center" style="color:#0010ccc7"><i class="fas fa-pen-fancy"></i> About Me</h1>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo explicabo sapiente iusto aspernatur quibusdam nobis libero tenetur eveniet, exercitationem numquam? ipsum dolor sit amet, consectetur adipisicing elit. Molestiae voluptate eligendi quos, sunt laboriosam porro placeat cum voluptatum? Odit quam earum magnam labore nihil error tenetur impedit! Maxime, optio earum?</p>
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
                        <div class="col-md-6">
                            <div class="progress-container progress-primary"><span style="font-size: 20px;" class="progress-badge"><i style="color: #007bff;margin: 0 5px;" class="fab fa-html5"></i>HTML</span>
                                <div class="progress" style="margin:15px 0px">
                                    <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div><span class="progress-value"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="progress-container progress-primary"><span style="font-size: 20px;" class="progress-badge"> <i style="color: #007bff;margin: 0 5px;" class="fab fa-css3-alt"></i> CSS</span>
                                <div class="progress" style="margin:15px 0px">
                                    <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div><span class="progress-value"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="progress-container progress-primary"><span style="font-size: 20px;" class="progress-badge"><i style="color: #007bff;margin: 0 5px;" class="fab fa-js-square"></i>JavaScript</span>
                                <div class="progress" style="margin:15px 0px">
                                    <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div><span class="progress-value"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="progress-container progress-primary"><span style="font-size: 20px;" class="progress-badge"><i style="color: #007bff;margin: 0 5px;" class="fab fa-php"></i>PHP</span>
                                <div class="progress" style="margin:15px 0px">
                                    <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div><span class="progress-value"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- </div>
    <div class="container">
        <div class="h1 text-center mb-4 title" style="font-weight: 800;"><i class="fas fa-user-graduate"></i> Học Vấn</div>
        <div class="about">
            <div class="row">
                <div class="col-md-7">
                    <div class="row mt-3  justify-content-center">
                        <h4> <i class="far fa-calendar"></i> 2018 - 2022 </h4>
                    </div>
                    <div class="row mt-3  justify-content-center">
                        <h3>Trường : Đại Học Thủy Lợi </h3>
                    </div>
                    <div class="row mt-3  justify-content-center">

                        <h4>Chuyên Ngành: Công Nghệ Thông Tin</h4>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row mt-3  justify-content-center">
                        <img style="margin-bottom: 15px;" width="305px" height=" 150px" src="https://career.gpo.vn/uploads/images/237684310/images/gpo-cong-nghe-thong-tin-ben-do-an-toan-3.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="h1 text-center mb-4 title" style="font-weight: 800;"><i class="fas fa-align-center"></i> Kinh Nghiệm</div>
        <div class="about">
            <div class="row">
                <div class="col-md-12">
                    <div class="row mt-3  justify-content-center">
                        <h4> <i class="far fa-calendar"></i> 2018 - 2022 </h4>
                    </div>
                    <div class="row mt-3  justify-content-center">
                        <h4 style="text-align: left;">Chức Vụ: Nhân Viên </h4>
                    </div>
                    <div class="row mt-3  justify-content-center">

                        <h3>Công ty: Lorem ipsum dolor sit amet.</h3>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    </div> -->
    <!-- <div class="container " style="margin-top: 50px;">
        <div class="about"> -->
    <div class="h1 text-center mb-4 title" style="font-weight: 800; margin-top: 30px;color:#0010ccc7;  "><i class="fas fa-user-graduate"></i> Học Vấn</div>
    <div class="container containerer">


        <div class="timeline">

            <ul>
                <li>
                    <div class="timeline-content">
                        <h4><i class="far fa-calendar"></i> 2015 - 2018</h4>
                        <h2>THPT Tiên Lữ</h2>
                        <h4>Học Sinh</h4>
                    </div>
                </li>
                <li>
                    <div class="timeline-content">
                        <h3><i class="far fa-calendar"></i> 2018 - 2022</h3>
                        <h2>Trường: Đại Học Thủy Lợi</h2>
                        <h4>Chuyên Ngành: Công Nghệ Thông Tin</h4>

                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Exp -->
    <div class="h1 text-center mb-4 title" style="font-weight: 800;color:#0010ccc7;"><i class="fas fa-align-center"></i> Kinh Nghiệm</div>
    <div class="container containerer">


        <div class="timeline">

            <ul>
                <li>
                    <div class="timeline-content">
                        <h4><i class="far fa-calendar"></i> 2015 - 2018</h4>
                        <h2>Công Ty: Lorem ipsum</h2>
                        <h4>Chắc Vụ: nhân viên</h4>
                    </div>
                </li>
                <li>
                    <div class="timeline-content">
                        <h3><i class="far fa-calendar"></i> 2018 - 2022</h3>
                        <h2>Công Ty: Lorem ipsum</h2>
                        <h4>Chắc Vụ: nhân viên</h4>

                    </div>
                </li>
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
    <style>
        .spacer {
            flex: 1;
        }

        /* make it visible for the purposes of demo */
        .footer {
            margin-top: 100px;
            height: 70px;
            background-color: #cacaca;
        }
    </style>
    <div class="spacer"></div>
    <footer class="footer text-center " >
        <h5 style="line-height: 70px;"> 2021  &copy Trần Long Vũ</h5>
    </footer>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js " integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo " crossorigin="anonymous "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js " integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1 " crossorigin="anonymous "></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js " integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM " crossorigin="anonymous "></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> -->
    <!-- <script>
        $(Document).ready(function() {
            // $('body').
            $('.preload').fadeOut(3000);

        });
    </script> -->
    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                var scroll = $(window).scrollTop();
                if (scroll > 300) {
                    $(".wrapper").css("background", " #1F2235");
                } else {
                    $(".wrapper").css("background", "");
                }
            })
        });
    </script>


</body>

</html>