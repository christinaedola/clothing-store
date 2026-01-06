<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clothing Store - Home</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }
    header {
      background-image: url('images/background_index.jpeg');
      background-size: cover;
      background-position: center;
      color: white;
      padding: 1rem;
      text-align: center;
      position: relative;
    }
    header::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.3); 
      z-index: 1;
    }
    header h1, header form {
      position: relative;
      z-index: 2;
    }
    nav {
      background-color: #444;
      padding: 0.5rem;
    }
    nav ul {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      justify-content: center;
    }
    nav li {
      margin: 0 1rem;
    }
    nav a {
      color: white;
      text-decoration: none;
      padding: 0.5rem 1rem;
      display: block;
    }
    main {
      padding: 2rem;
      text-align: center;
    }
    .hero {
      background-color: #fff;
      padding: 2rem;
      margin: 2rem 0;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .trolley-gif {
      width: 100px;
      height: auto;
      margin: 1rem auto;
      display: block;
    }
    .home-button {
      background-color: #333;
      color: white;
      border: none;
      padding: 1rem 2rem;
      font-size: 1.2rem;
      cursor: pointer;
      border-radius: 5px;
      margin-top: 1rem;
    }
    .home-button:hover {
      background-color: #555;
    }
    .product-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 1rem;
      margin-top: 2rem;
    }
    .product {
      background-color: white;
      border: 1px solid #ddd;
      padding: 1rem;
      text-align: center;
    }
    .product img {
      width: 200px; 
      height: 200px; 
      object-fit: cover; 
      cursor: pointer;
    }
    .product h3 {
      margin: 0.5rem 0;
      cursor: pointer;
    }
    .product a {
      color: black;
      text-decoration: none;
    }
    .product a:hover {
      color: black;
    }
  </style>
</head>
<body>
  <header>
    <h1>NASA Clothing Store</h1>
    <form action="search.php" method="get" style="text-align: center; margin-top: 1rem;">
      <input type="text" name="query" placeholder="Search for products..." style="padding: 0.5rem; width: 200px;" required>
      <button type="submit" style="padding: 0.5rem 1rem; background-color: #333; color: white; border: none; cursor: pointer;">Search</button>
    </form>
  </header>

  <nav>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="men.php">Men</a></li>
      <li><a href="women.php">Women</a></li>
      <li><a href="kids.php">Kids</a></li>
      <li><a href="profile.php">Profile</a></li>
      <a href="logout.php">Logout</a>


      <li><a href="cart.php">MyCart</a></li>

    </ul>
  </nav>

  <main>
    <div class="hero">
      <h2>Discover Your Style</h2>
      <p>Explore our latest collections for men, women, and kids. Click on a category above to start shopping!</p>
      <img src="images/trolley.gif" alt="Shopping Trolley" class="trolley-gif">
    </div>
    
    <section>
      <h2>All Products</h2>
      <div class="product-grid">
        <!-- Men's Products -->
        <div class="product">
          <a href="mens-tshirt.php"><img src="images/men_tshirt.jpg" alt="Men's T-Shirt"></a>
          <a href="mens-tshirt.php"><h3>Men's T-Shirt</h3></a>
        </div>
        <div class="product">
          <a href="mens-jeans.php"><img src="images/men_jeans.jpeg" alt="Men's Jeans"></a>
          <a href="mens-jeans.php"><h3>Men's Jeans</h3></a>
        </div>
        <div class="product">
          <a href="mens-hoodie.php"><img src="images/men_hoodie.jpeg" alt="Men's Hoodie"></a>
          <a href="mens-hoodie.php"><h3>Men's Hoodie</h3></a>
        </div>
        <div class="product">
          <a href="mens-polo.php"><img src="images/men_polo.jpeg" alt="Men's Polo Shirt"></a>
          <a href="mens-polo.php"><h3>Men's Polo Shirt</h3></a>
        </div>
        <!-- Women's Products -->
        <div class="product">
          <a href="women-dress.php"><img src="images/women_dress.jpeg" alt="Women's Dress"></a>
          <a href="women-dress.php"><h3>Women's Dress</h3></a>
        </div>
        <div class="product">
          <a href="women-blouse.php"><img src="images/women_blouse.jpeg" alt="Women's Blouse"></a>
          <a href="women-blouse.php"><h3>Women's Blouse</h3></a>
        </div>
        <div class="product">
          <a href="women-skirt.php"><img src="images/women_skirt.jpeg" alt="Women's Skirt"></a>
          <a href="women-skirt.php"><h3>Women's Skirt</h3></a>
        </div>
        <div class="product">
          <a href="women-cardigen.php"><img src="images/women_cardigen.jpeg" alt="Women's Cardigen"></a>
          <a href="women-cardigen.php"><h3>Women's Cardigen</h3></a>
        </div>
        <!-- Kids' Products -->
        <div class="product">
          <a href="kids-tshirt.php"><img src="images/kids_tshirt.jpeg" alt="Kids' T-Shirt"></a>
          <a href="kids-tshirt.php"><h3>Kids' T-Shirt</h3></a>
        </div>
        <div class="product">
          <a href="kids-pants.php"><img src="images/kids_shorts.jpeg" alt="Kids' Pants"></a>
          <a href="kids-pants.php"><h3>Kids' Pants</h3></a>
        </div>
        <div class="product">
          <a href="kids-hoodie.php"><img src="images/kids_hoodie.jpeg" alt="Kids' Hoodie"></a>
          <a href="kids-hoodie.php"><h3>Kids' Hoodie</h3></a>
        </div>
        <div class="product">
          <a href="kids-dress.php"><img src="images/kids_dress.jpeg" alt="Kids Dress"></a>
          <a href="kids-dress.php"><h3>Kids' Dress</h3></a>
        </div>
      </div>
    </section>
  </main>
</body>
</html>
