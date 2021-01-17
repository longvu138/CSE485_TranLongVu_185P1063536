<?php
session_start();
if (!isset($_SESSION['status']) || ($_SESSION['status'] != 1)) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
</head>


<body>
    <?php
    if (isset($_POST['forget'])) {
        $email= trim($_POST['email']);
        $lastpass          = trim($_POST['lastpass']);
        $password1      = trim($_POST['password1']);
        $password2      = trim($_POST['password2']);

           $email;
         $password1;
         $password2;
          $lastpass;
        include('connect.php');
        $sql = "SELECT * FROM users WHERE email = '$email' and password= '$lastpass'";
        // Thực thi câu truy vấn
        $result = mysqli_query($conn, $sql);
        // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
        if (mysqli_num_rows($result) == 0)
        {
            echo  '<script language="javascript">alert("mật khẩu cũ không chính xác"); window.location="changepass.php";</script>';
        }
        if ($password1 != $password2) {
          echo  '<script language="javascript">alert("mật khẩu mới vừa nhập không khớp"); window.location="changepass.php";</script>';
        } 
        else {
              if (mysqli_num_rows($result) > 0)
               {
                $sql="update users set password= '$password1' where email= '$email'";
                if(mysqli_query($conn,$sql))
                {
                    echo '<script language="javascript">alert("Mật Khẩu của bạn đã được thay đổi thành công");window.location="usereditcv.php"; </script>';
                }
         }}
        //     // $hashed_password = password_hash($password1, PASSWORD_DEFAULT);
        //     $sql = "INSERT INTO users (username,email, password) 	VALUES ('$username','$email', '$password1')";
        // //    echo $hashed_password;
        //    echo $sql;
            // if (mysqli_query($conn, $sql)) {
            //     echo  '<script language="javascript">alert("Đăng Ký thành công"); window.location="login.php";</script>';
            // } else {
            //     echo  '<script language="javascript">alert("Đăng ký thất bại"); window.location="login.php";</script>';
            // }
            }
    
    ?>
    <div class="signup">
        <h1 class="signup-heading">Đổi Mật Khẩu</h1>
        <!-- <div class="signup-or"><span>Or</span></div> -->
        <form action="changepass.php" method="post" class="signup-form" autocomplete="off">
            <label class="signup-label">Email</label>
            <input type="email"  maxlength="50" id="fullname" name="email" class="signup-input" placeholder="nhập vào địa chỉ email" required>
            <label  maxlength="50" class="signup-label">Mật khẩu cũ </label>
            <input type="password" id="fullname" name="lastpass" class="signup-input" placeholder="nhập vào mật khẩu cũ" required>
            <label class="signup-label">Mật Khẩu mới</label>
            <input type="password" id="email" name="password1" class="signup-input" placeholder="nhập vào mật khẩu" required>
            <label class="signup-label">Nhập Lại mật khẩu</label>
            <input type="password" id="email" name="password2" class="signup-input" placeholder="nhập vào mật khẩu" required>
            <button type="submit" name="forget" class="signup-submit">thay đổi</button>
        </form>
        </p>
    </div>
</body>

</html>