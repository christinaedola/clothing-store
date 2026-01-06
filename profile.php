<?php
session_start();
include('db.php');

// Redirect kalau belum login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE user_id = $user_id");
$user = mysqli_fetch_assoc($result);

// Handle update form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_name = $_POST['full_name'];
    $new_email = $_POST['email'];
    $new_phone = $_POST['phone'];

    $update = "UPDATE users SET username='$new_name', email='$new_email', phone='$new_phone' WHERE user_id=$user_id";
    if (mysqli_query($conn, $update)) {
        $_SESSION['username'] = $new_name;
        $_SESSION['email'] = $new_email;
        $message = "Profile updated successfully!";
        // Refresh user data
        $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE user_id = $user_id"));
    } else {
        $message = "Update failed: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>User Profile</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #fceff9, #e0c3fc);
      padding: 40px;
    }
    .container {
      display: flex;
      gap: 40px;
      max-width: 900px;
      margin: auto;
    }
    .card, .form-box {
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      flex: 1;
    }
    .card h3, .form-box h3 {
      color: #d63384;
      margin-bottom: 20px;
      text-align: center;
    }
    .card p {
      margin: 10px 0;
      color: #333;
      font-size: 16px;
    }
    .form-box label {
      display: block;
      margin-bottom: 5px;
      color: #555;
    }
    .form-box input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 8px;
    }
    .form-box button {
      width: 100%;
      padding: 10px;
      background: #d63384;
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
    }
    .form-box button:hover {
      background: #c2186b;
    }
    .back-button {
      display: block;
      text-align: center;
      margin-top: 15px;
      color: #d63384;
      text-decoration: none;
      font-weight: bold;
      padding: 10px;
      border-radius: 8px;
      transition: background 0.3s;
    }
    .back-button:hover {
      background-color: #f8d7e9;
    }
    .message {
      text-align: center;
      color: green;
      margin-bottom: 15px;
    }
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
  </style>
</head>
<body>

<div class="container">
  
  <div class="card">
    <h3>User Info</h3>
    <p><strong>Name:</strong> <?php echo $user['username']; ?></p>
    <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
    <p><strong>Phone:</strong> <?php echo $user['phone'] ?? '-'; ?></p>
    <p><strong>Joined:</strong> January 2023</p>
  </div>

  
  <div class="form-box">
    <h3>Update Profile</h3>
    <?php if (!empty($message)) echo "<div class='message'>$message</div>"; ?>
    <form method="POST">
      <label>Full Name:</label>
      <input type="text" name="full_name" value="<?php echo $user['username']; ?>" required>
      <label>Email:</label>
      <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
      <label>Phone (Optional):</label>
      <input type="text" name="phone" value="<?php echo $user['phone'] ?? ''; ?>">
      <button type="submit">Update Profile</button>
      <a href="index.php" class="back-button">← Back</a>
    </form>
  </div>
</div>

</body>
</html>
