<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>About Us - IPRC KIGALI</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background-color: #f5f5f5;
      line-height: 1.6;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #1e3c5a;
      color: #fff;
      padding: 10px 20px;
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .navbar-left {
      display: flex;
      align-items: center;
    }

    .menu-toggle {
      font-size: 24px;
      cursor: pointer;
      margin-right: 15px;
      display: none;
    }

    .logo {
      font-weight: bold;
      text-decoration: none;
      color: white;
      font-size: 18px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .logo img {
      height: 30px;
    }

    .navbar-right {
      display: flex;
      gap: 15px;
    }

    .nav-link {
      color: white;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 5px;
      transition: color 0.3s;
    }

    .nav-link:hover {
      color: #e91e63;
    }

    .about-container {
      max-width: 1000px;
      margin: 40px auto;
      padding: 30px;
      background-color: white;
      border-radius: 5px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .about-title {
      text-align: center;
      font-size: 28px;
      color: #1e3c5a;
      margin-bottom: 20px;
    }

    .about-text {
      font-size: 16px;
      color: #333;
      margin-bottom: 20px;
    }

    .footer {
      background-color: #1e3c5a;
      color: white;
      padding: 30px 20px;
      margin-top: 30px;
    }

    .footer-container {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .footer-column {
      flex: 1;
      min-width: 200px;
      margin-bottom: 20px;
      text-align: center;
    }

    .footer-title {
      font-size: 18px;
      font-weight: bold;
    }

    @media (max-width: 768px) {
      .navbar-right {
        display: none;
        flex-direction: column;
        background-color: #1e3c5a;
        padding: 10px;
        position: absolute;
        top: 60px;
        right: 20px;
        border-radius: 5px;
      }

      .navbar-right.active {
        display: flex;
      }

      .menu-toggle {
        display: block;
      }

      .about-container {
        padding: 20px;
      }
    }
  </style>
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar">
    <div class="navbar-left">
      <div class="menu-toggle"><i class="fas fa-bars"></i></div>
      <a href="#" class="logo">
        <img src="rplogo.png" alt="IPRC Kigali Logo" />
        RP KIGALI College
      </a>
    </div>
    <div class="navbar-right">
      <a href="index.php" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a>
      <a href="about.php" class="nav-link"><i class="fas fa-info-circle"></i><span>About</span></a>
      <!--<a href="contact.html" class="nav-link"><i class="fas fa-envelope"></i><span>Contact</span></a>
      <a href="#" class="nav-link"><i class="fas fa-sign-in-alt"></i><span>Signin</span></a>
  -->
    </div>
  </nav>

  <!-- About Us Content -->
  <div class="about-container">
    <h1 class="about-title">About RP Kigali College</h1>

    <p class="about-text">
      RP Kigali College is a Technical and Vocational Education and Training (TVET) institution under Rwanda Polytechnic. It is committed to providing high-quality skills through practical training to promote workforce development in Rwanda.
    </p>

    <p class="about-text">
      In partnership with the Rwanda TVET Board and through support from the Skills Development Fund (SDF), the college is implementing the Recognition of Prior Learning (RPL) initiative. This program is specifically aimed at skilled individuals working in the fields of <strong>Masonry</strong> and <strong>Domestic Electricity Installation</strong> who do not yet possess formal certification.
    </p>

    <p class="about-text">
      The RPL program offers these individuals an opportunity to be assessed and certified based on the experience and skills they have acquired over time. This initiative supports national goals of upskilling the workforce and providing equitable access to formal recognition and qualifications.
    </p>

    <p class="about-text">
      RP Kigali College continues to lead efforts in vocational innovation and lifelong learning opportunities for Rwandans by promoting both inclusivity and industry relevance in its training programs.
    </p>
  </div>

  <!-- Footer -->
  <footer class="footer">
    <div class="footer-container">
      <div class="footer-column">
        <h3 class="footer-title">&copy; 2025 RP Kigali College. All rights reserved.</h3>
      </div>
    </div>
  </footer>

  <script>
    document.querySelector('.menu-toggle').addEventListener('click', function () {
      document.querySelector('.navbar-right').classList.toggle('active');
    });
  </script>
</body>
</html>
