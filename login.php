<?php
include('db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Wrong password.";
        }
    } else {
        $error = "No user found with that email.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-image: url('background_index.jpeg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    h1.caption {
      font-size: 42px;
      color: #d63384;
      margin-bottom: 30px;
      text-shadow: 2px 2px 5px rgba(0,0,0,0.3);
      text-align: center;
    }
    .login-box {
      background: #fff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      width: 350px;
    }
    .login-box h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #d63384;
    }
    .login-box label {
      display: block;
      margin-bottom: 5px;
      color: #555;
    }
    .login-box input[type="email"],
    .login-box input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
    }
    .login-box button {
      width: 100%;
      padding: 10px;
      background: #d63384;
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
    }
    .login-box button:hover {
      background: #c2186b;
    }
    .login-box .error {
      color: red;
      margin-bottom: 15px;
      text-align: center;
    }
    .login-box p {
      text-align: center;
      margin-top: 15px;
    }
    .login-box a {
      color: #d63384;
      text-decoration: none;
    }
  </style>
</head>
<body>

  <h1 class="caption">Welcome NASA Clothing Store</h1>

  <div class="login-box">
    <h2>User Login</h2>
    <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>
    <form method="POST">
      <label>Email:</label>
      <input type="email" name="email" required>
      <label>Password:</label>
      <input type="password" name="password" required>
      <button type="submit">Login</button>
    </form>
    <p>Don’t have an account? <a href="register.php">Register here</a></p>
  </div>
</body>
</html>
