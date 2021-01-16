<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <title>Đăng Nhập</title>
  <?php

  if (isset($_POST["dangnhap"])) {

    //lấy thông tin từ form
    $email = $_POST["email"];
    $password = $_POST["password"];
   
    //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
    //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
    $email = strip_tags($email);
    $email = addslashes($email);
    $password = strip_tags($password);
    $password = addslashes($password);

  
    require_once "connect.php";
    $sql = "SELECT * FROM users where email ='$email' and password = '$password' ";
    $query = mysqli_query($conn, $sql);
       echo $sql;

    $num_rows = mysqli_num_rows($query);
    if ($num_rows == 0) {
      echo " <script> alert(' tài khoản hoặc mật khẩu không chính xác!') </script>";
      //   require"login.php";
    } else {
      $result = mysqli_fetch_array($query);
      $quyen = $result['status'];  
     $id = $result['user_id'];
    
      //tiến hành lưu tên đăng nhập vào session 
      session_start();
      $_SESSION['username'] =$result['username'];
      echo $_SESSION['username'];
      $_SESSION['status'] = $quyen;
      $_SESSION['id'] = $id;
      echo $_SESSION['status'];
      if ($_SESSION['status'] == 1) {
        header("location:usercreatecv.php");
      } else {
        if ($_SESSION['status'] == 0) {
          header("location:trangquantri.php");
        }
      }

    }
   }

  ?>
  <link rel="stylesheet" href="css/login.css" />
</head>

<body>
  <div class="signup">
    <h1 class="signup-heading">Đăng Nhập</h1>
    <div class="signup-or"><span>Or</span></div>
    <form action="login.php" method="post" class="signup-form" autocomplete="off">
      <label class="signup-label">Email</label>
      <input type="email" id="fullname" name="email" class="signup-input" placeholder="nhập vào địa chỉ email" required>
      <label class="signup-label">Mật Khẩu</label>
      <input type="password" id="email" name="password" class="signup-input" placeholder="nhập vào mật khẩu" required>
      <button type="submit" name="dangnhap" class="signup-submit">Sign up</button>
    </form>
    <p style="margin-bottom:15px ; "class="signup-already">
      <a href="#" class="signup-login-link">Quên Mật Khẩu?</a>

    </p>
    <p class="signup-already">

      <a href="signup.php" class="signup-login-link">Đăng Ký</a>
    </p>
  </div>
</body>

</html>