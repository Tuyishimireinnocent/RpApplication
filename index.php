<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>IPRC KIGALI</title>
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

    .main-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .hero-section {
      flex: 2;
      min-width: 300px;
      background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://via.placeholder.com/1000x500');
      background-size: cover;
      background-position: center;
      color: white;
      padding: 40px;
      text-align: center;
      border-radius: 5px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .course-tag {
      background-color: #0e3a66;
      color: white;
      padding: 5px 15px;
      border-radius: 20px;
      font-size: 14px;
      margin-bottom: 20px;
    }

    .hero-title {
      font-size: 24px;
      margin-bottom: 20px;
    }

    .application-info,
    .application-instructions,
    .login-info {
      margin-bottom: 15px;
      font-size: 16px;
    }

    .create-account-btn {
      background-color: #0e3a66;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      margin-top: 20px;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 14px;
      text-decoration: none;
    }

    .create-account-btn:hover {
      background-color: #007bb2;
    }

    .contact-section {
      flex: 1;
      min-width: 300px;
      background-color: #0e3a66;
      color: white;
      padding: 30px;
      border-radius: 5px;
      text-align: left;
    }

    .contact-title {
      font-size: 24px;
      margin-bottom: 20px;
      text-align: center;
    }

    .contact-item {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 15px;
      font-size: 16px;
    }

    .contact-item i {
      color: #ffffff;
    }

    .contact-section hr {
      border: 0;
      border-top: 1px solid #ccc;
      margin-top: 20px;
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

    @media (max-width: 1024px) {
      .hero-title {
        font-size: 20px;
      }

      .application-info,
      .application-instructions,
      .login-info {
        font-size: 14px;
      }
    }

    @media (max-width: 768px) {
      .main-container {
        flex-direction: column;
        padding: 15px;
      }

      .hero-section,
      .contact-section {
        width: 100%;
        padding: 25px;
      }

      .hero-title {
        font-size: 20px;
      }

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

      .footer-container {
        flex-direction: column;
        text-align: center;
      }
    }

    @media (max-width: 480px) {
      .hero-section {
        padding: 20px;
      }

      .course-tag {
        font-size: 12px;
      }

      .hero-title {
        font-size: 18px;
      }

      .application-info,
      .application-instructions,
      .login-info {
        font-size: 13px;
      }

      .contact-item {
        font-size: 14px;
        flex-wrap: wrap;
      }

      .contact-section {
        padding: 20px;
      }

      .create-account-btn {
        font-size: 13px;
        padding: 8px 16px;
      }
    }
  </style>
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar">
    <div class="navbar-left">
      <div class="menu-toggle">
        <i class="fas fa-bars"></i>
      </div>
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

  <!-- Main Content -->
  <div class="main-container">
    <!-- Hero Section -->
    <section class="hero-section">
      <div class="course-tag">
        <i class="fas fa-book"></i> RPL (Recognition of Prior Learning) Application
      </div>
      <h1 class="hero-title">
        RP Kigali College, in partnership with Rwanda TVET Board through the Skills Development Fund (SDF), invites applicants for Recognition of Prior Learning (RPL) in Masonry and Domestic Electricity Installation.
      </h1>
      <div class="application-info">
        Applications are open until <strong>30<sup>th</sup> May 2025</strong>. Submit online or deliver hard copies to RP Kigali College.
      </div>
      <div class="application-instructions">
        Candidates must be Rwandan or residents, at least 18 years old, with 2+ years of experience. Being a member of a registered trade union or employer’s association is an added value.
      </div>
      <div class="login-info">
        All assessment, certification, lunch, and transport costs will be covered by RP Kigali College through the SDF project.
      </div>
      <a href="ApplicationForm.php" class="create-account-btn">
        <i class="fas fa-user-pen"></i> ApplyNow
      </a>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
      <h2 class="contact-title">Contact Information</h2>
      <div class="contact-item">
        <i class="fas fa-map-marker-alt"></i>
        <span>RP Head Office, IPRC KIGALI</span>
      </div>
      <div class="contact-item">
        <i class="fas fa-phone"></i>
        <span>+250 788 690 794</span>
      </div>
      <div class="contact-item">
        <i class="fas fa-phone"></i>
        <span>+250 739 477 867</span>
      </div>
      <div class="contact-item">
        <i class="fas fa-envelope"></i>
        <span>support@iprckigali.ac.rw</span>
      </div>
      <hr />
    </section>
  </div>

  <!-- Footer -->
  <footer class="footer">
    <div class="footer-container">
      <div class="footer-column">
        <h3 class="footer-title">&copy; 2025 RP Kigali College. All rights reserved.</h3>
      </div>
    </div>
  </footer>

  <!-- JavaScript -->
  <script>
    document.querySelector('.menu-toggle').addEventListener('click', function () {
      document.querySelector('.navbar-right').classList.toggle('active');
    });
  </script>
</body>
</html>
