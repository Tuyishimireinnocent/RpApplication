<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Ibyerekeye RP Kigali</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    html, body {
      height: 100%;
    }

    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
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
      gap: 20px;
    }

    .logo img {
      height: 60px;
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
      flex: 1;
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
      margin-top: auto;
      width: 100%;
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
        margin: 20px auto;
        padding: 20px;
      }

      .about-title {
        font-size: 24px;
      }

      .footer-container {
        flex-direction: column;
      }

      .footer {
        padding: 20px;
      }
    }

    @media (max-width: 480px) {
      .about-container {
        margin: 15px;
        padding: 15px;
      }

      .about-title {
        font-size: 22px;
      }

      .about-text {
        font-size: 15px;
      }

      .footer {
        padding: 15px;
      }

      .footer-title {
        font-size: 16px;
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
        <img src="rplogo1.png" alt="IPRC Kigali Logo" />
        RP KIGALI College
      </a>
    </div>
    <div class="navbar-right">
      <a href="index.php" class="nav-link"><i class="fas fa-home"></i><span>Ahabanza</span></a>
      <a href="about.php" class="nav-link"><i class="fas fa-info-circle"></i><span>Ibyerekeye</span></a>
    </div>
  </nav>

  <!-- About Us Content -->
  <!-- About Us Content -->
<div class="about-container">
  <h1 class="about-title">Ibyerekeye Ishuri Rikuru rya RP Kigali</h1>

  <p class="about-text">
    Ishuri Rikuru ry’Imyuga n’Ubumenyingiro, Koleji ya Kigali (RP-Kigali College), ni ishuri rya Leta riyobowe na Rwanda Polytechnic, rifite intego yo guteza imbere imyuga n'ubumenyingiro biciye mu myigire ishingiye ku bumenyi ngiro.
  </p>

  <p class="about-text">
    Ryashyizeho gahunda yiswe <strong>Recognition of Prior Learning (RPL)</strong> ku bufatanye na Rwanda TVET Board (RTB), binyuze mu mushinga wa <strong>Skills Development Fund (SDF)</strong>. Iyi gahunda igamije gufasha abantu bafite uburambe mu mirimo y’Ubwubatsi n’Amashanyarazi ariko batarigeze babona impamyabushobozi yemewe.
  </p>

  <p class="about-text">
    Abemerewe kwitabira iyi gahunda ni Abanyarwanda cyangwa ababa mu Rwanda mu buryo bwemewe n’amategeko, bafite imyaka nibura 18, kandi bafite uburambe bw’imyaka ibiri (2) cyangwa irenga mu byo bakora. Kuba umuntu ari mu ishyirahamwe cyangwa akorera sosiyete bikaba ari inyongera nziza.
  </p>

  <p class="about-text">
    Abasaba basabwa gutanga kopi y’indangamuntu cyangwa pasiporo, hamwe n’icyemezo cy’umukoresha cyangwa icy’inzego z’ibanze kigaragaza uburambe bafite. Kwiyandikisha bikorwa ku rubuga  cyangwa ku biro bya RP Kigali, bitarenze <strong>30 Gicurasi 2025</strong>.
  </p>

  <p class="about-text">
    Amafaranga yose arebana n’isuzumabushobozi, impamyabushobozi, amafunguro na transport azishyurwa na RP Kigali binyuze mu mushinga SDF. Iyi gahunda itanga amahirwe angana kuri bose kugira ngo ubumenyi n’uburambe bifite agaciro mu kubaka ejo hazaza h’umurimo mu Rwanda.
  </p>
</div>



  <!-- Footer -->
  <footer class="footer">
    <div class="footer-container">
      <div class="footer-column">
        <h3 class="footer-title">&copy; 2025 Ishuri Rikuru RP Kigali. Uburenganzira bwose burabitswe.</h3>
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