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
    if (isset($_POST['signup'])) {
        $username= trim($_POST['username']);
        $email          = trim($_POST['email']);
        $password1      = trim($_POST['password1']);
        $password2      = trim($_POST['password2']);

        $email;
        $password1;
        $password2;
        $username;
        include('connect.php');
        $sql = "SELECT * FROM users WHERE email = '$email'";
        // Thực thi câu truy vấn
        $result = mysqli_query($conn, $sql);
        // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
        if (mysqli_num_rows($result) > 0) {
            // Sử dụng javascript để thông báo
            echo '<script language="javascript">alert("Email đã tồn tại"); window.location="signup.php";</script>';

            // Dừng chương trình
            die();
        }
        if ($password1 != $password2) {
          echo  '<script language="javascript">alert("Mật Khẩu Không khớp"); window.location="signup.php";</script>';
        } 
        else {
            // $hashed_password = password_hash($password1, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username,email, password) 	VALUES ('$username','$email', '$password1')";
        
          
            if (mysqli_query($conn, $sql)) {
                echo  '<script language="javascript">alert("Đăng Ký thành công"); window.location="login.php";</script>';
            } else {
                echo  '<script language="javascript">alert("Đăng ký thất bại"); window.location="login.php";</script>';
            }
        }
    }
    ?>
    <div class="signup">
        <h1 class="signup-heading">Đăng Ký</h1>
        <!-- <div class="signup-or"><span>Or</span></div> -->
        <form action="signup.php" method="post" class="signup-form" autocomplete="off">
            <label class="signup-label">Họ và tên</label>
            <input type="text"  maxlength="50" id="fullname" name="username" class="signup-input" placeholder="nhập vào tên của bạn" required>
            <label class="signup-label">Email</label>
            <input type="email" id="fullname" name="email" class="signup-input" placeholder="nhập vào địa chỉ email" required>
            <label class="signup-label">Mật Khẩu </label>
            <input type="password" id="email" name="password1" class="signup-input" placeholder="nhập vào mật khẩu" required>
            <label class="signup-label">Nhập Lại mật khẩu </label>
            <input type="password" id="email" name="password2" class="signup-input" placeholder="nhập vào mật khẩu" required>
            <button type="submit" name="signup" class="signup-submit">Đăng Ký</button>
        </form>
        </p>
    </div>
</body>

</html>