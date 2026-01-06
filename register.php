<?php
include('db.php'); // atau include('includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    if (mysqli_query($conn, $sql)) {
        $msg = "Registration successful! <a href='login.php'>Login here</a>";
    } else {
        $msg = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <style>
    body {
      background: #fceff9;
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .register-box {
      background: #fff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      width: 350px;
    }
    .register-box h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #d63384;
    }
    .register-box label {
      display: block;
      margin-bottom: 5px;
      color: #555;
    }
    .register-box input[type="text"],
    .register-box input[type="email"],
    .register-box input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
    }
    .register-box button {
      width: 100%;
      padding: 10px;
      background: #d63384;
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
    }
    .register-box button:hover {
      background: #c2186b;
    }
    .register-box .message {
      text-align: center;
      margin-bottom: 15px;
      color: green;
    }
    .register-box p {
      text-align: center;
      margin-top: 15px;
    }
    .register-box a {
      color: #d63384;
      text-decoration: none;
    }
    body {
  margin: 0;
  font-family: 'Segoe UI', sans-serif;
  background-image: url('background_index.jpeg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: fixed;
}

  </style>
</head>
<body>
  <div class="register-box">
    <h2>User Registration</h2>
    <?php if (!empty($msg)) echo "<div class='message'>$msg</div>"; ?>
    <form method="POST">
      <label>Username:</label>
      <input type="text" name="username" required>
      <label>Email:</label>
      <input type="email" name="email" required>
      <label>Password:</label>
      <input type="password" name="password" required>
      <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
  </div>
</body>
</html>
