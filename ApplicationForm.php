<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ifishi yo Kwiyandikisha mu RPL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
    body {
      background-color: #f5f5f5;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .form-container {
      max-width: 600px;
      margin: 40px auto;
      background: white;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
      overflow: hidden;
    }
    
    .form-header {
      background: white;
      padding: 25px;
      text-align: center;
      border-bottom: 1px solid #eee;
    }
    
    .form-header h2 {
      color: #333;
      font-size: 24px;
      margin: 0;
      font-weight: 600;
    }
    
    .form-header p {
      color: #666;
      margin-top: 10px;
      font-size: 16px;
    }
    
    .form-body {
      padding: 30px;
    }
    
    .form-group {
      margin-bottom: 25px;
    }
    
    .form-label {
      display: block;
      margin-bottom: 8px;
      color: #555;
      font-weight: 500;
    }
    
    .form-control {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 15px;
      transition: border-color 0.3s;
      background-color: #fff;
    }
    
    .form-control:focus {
      border-color: #4297ff;
      box-shadow: 0 0 0 0.25rem rgba(66, 151, 255, 0.25);
    }
    
    .form-select {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 15px;
      background-color: #fff;
    }
    
    .form-select:focus {
      border-color: #4297ff;
      box-shadow: 0 0 0 0.25rem rgba(66, 151, 255, 0.25);
    }
    
    .help-text {
      color: #777;
      font-size: 13px;
      margin-top: 5px;
    }
    
    .submit-btn {
      display: block;
      width: 100%;
      padding: 15px;
      border: none;
      background: linear-gradient(to right, #43c6ff, #536dfe);
      color: white;
      border-radius: 30px;
      font-size: 16px;
      font-weight: 500;
      cursor: pointer;
      transition: opacity 0.3s;
      margin-top: 20px;
    }
    
    .submit-btn:hover {
      opacity: 0.9;
    }
    
    .submit-btn:focus {
      box-shadow: 0 0 0 0.25rem rgba(83, 109, 254, 0.25);
    }
    
    .error-message {
      color: #dc3545;
      font-size: 13px;
      margin-top: 5px;
    }
    
    .success-alert {
      display: none;
      position: fixed;
      top: 20px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 1050;
      min-width: 300px;
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }
    
    .loading-spinner {
      display: none;
      margin-left: 10px;
    }
    
    .form-file {
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 10px;
    }
    
    .form-file:focus {
      border-color: #4297ff;
      box-shadow: 0 0 0 0.25rem rgba(66, 151, 255, 0.25);
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
    
    .footer {
      background-color: #1e3c5a;
      color: white;
      padding: 20px;
      text-align: center;
      margin-top: 40px;
    }
    
    @media (max-width: 768px) {
      .form-container {
        margin: 20px;
        max-width: 100%;
      }
      
      .form-body {
        padding: 20px;
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
        <img src="rplogo1.png" alt="IPRC Kigali Logo" />
        RP KIGALI College
      </a>
    </div>
    <div class="navbar-right">
      <a href="index.php" class="nav-link"><i class="fas fa-home"></i><span>Subira Ahabanza</span></a>
    </div>
  </nav>

  <!-- Success Alert -->
  <div class="alert alert-success alert-dismissible fade show success-alert" id="successAlert" role="alert">
    <span id="successMessage"></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

  <div class="container">
    <div class="form-container">
      <div class="form-header">
        <h3>IFISHI YO KWIYANDIKISHA RPL (Recognition of Prior Learning)</h3>
        <p>Ku bwubatsi n'amashanyarazi</p>
      </div>
      
      <div class="form-body">
        <form id="rplForm" enctype="multipart/form-data">
          <div class="form-group">
            <label for="fullname" class="form-label">Amazina yombi</label>
            <input type="text" class="form-control" id="fullname" name="fullname" required>
            <div class="error-message" id="fullname-error"></div>
          </div>

          <div class="form-group">
            <label for="dob" class="form-label">Itariki y'amavuko</label>
            <input type="date" class="form-control" id="dob" name="dob" required>
            <div class="error-message" id="dob-error"></div>
          </div>

          <div class="form-group">
            <label for="nationality" class="form-label">Ubwenegihugu</label>
            <select class="form-select" id="nationality" name="nationality" required>
              <option value="">Hitamo...</option>
              <option value="Rwandan">Umunyarwanda</option>
              <option value="Resident">Umunyamahanga uba mu Rwanda</option>
            </select>
            <div class="error-message" id="nationality-error"></div>
          </div>

          <div class="form-group">
            <label for="nin" class="form-label">Numero y'Indangamuntu / Pasiporo</label>
            <input type="text" class="form-control" id="nin" name="nin" pattern="\d{16}" minlength="16" maxlength="16" title="Enter exactly 16 digits" required>
            <div class="error-message" id="nin-error"></div>
          </div>

          <div class="form-group">
            <label for="trade" class="form-label">Ishami</label>
            <select class="form-select" id="trade" name="trade" required>
              <option value="">Hitamo...</option>
              <option value="Masonry">Ubwubatsi</option>
              <option value="Domestic Electricity Installation">Amashanyarazi</option>
            </select>
            <div class="error-message" id="trade-error"></div>
          </div>

          <div class="form-group">
            <label for="experience" class="form-label">Imyaka y'uburambe mu kazi</label>
            <input type="number" class="form-control" id="experience" name="experience" min="2" required>
            <div class="error-message" id="experience-error"></div>
          </div>

          <div class="form-group">
            <label for="employer" class="form-label">Izina ry'umukoresha / Isosiyete</label>
            <input type="text" class="form-control" id="employer" name="employer" required>
            <div class="error-message" id="employer-error"></div>
          </div>

          <div class="form-group">
            <label for="union" class="form-label">ufite Itsinda ubamo / ishyirahamwe?</label>
            <select class="form-select" id="union" name="union" required>
              <option value="">Hitamo...</option>
              <option value="Yes">Yego</option>
              <option value="No">oya</option>
            </select>
            <div class="error-message" id="union-error"></div>
          </div>

          <div class="form-group" id="unionNameContainer">
            <label for="unionName" class="form-label">Niba ari Yego, andika izina ry'ishyirahamwe ubamo</label>
            <input type="text" class="form-control" id="unionName" name="unionName">
            <div class="error-message" id="unionName-error"></div>
          </div>

          <div class="form-group">
            <label for="phone" class="form-label">Numero ya telefone</label>
            <input type="tel" class="form-control" id="phone" name="phone" pattern="\d{10}" minlength="10" maxlength="10" title="Enter exactly 10 digits" required>
            <div class="error-message" id="phone-error"></div>
          </div>

          <div class="form-group">
            <label for="email" class="form-label">imeli/Email</label>
            <input type="email" class="form-control" id="email" name="email">
            <div class="error-message" id="email-error"></div>
          </div>

          <div class="form-group">
            <label for="id_doc" class="form-label">Indangamuntu/pasiporo</label>
            <input class="form-control form-file" type="file" id="id_doc" name="id_doc" accept=".pdf,.jpg,.jpeg,.png" required>
            <div class="help-text">Hemewe: PDF, JPG, PNG (Max 1MB)</div>
            <div class="error-message" id="id_doc-error"></div>
          </div>

          <div class="form-group">
            <label for="recommendation" class="form-label">icyemezo cy'umukoresha/ gitanzwe n'inzego z'ibanze</label>
            <input class="form-control form-file" type="file" id="recommendation" name="recommendation" accept=".pdf,.jpg,.jpeg,.png" required>
            <div class="help-text">Hemewe: PDF, JPG, PNG (Max 1MB)</div>
            <div class="error-message" id="recommendation-error"></div>
          </div>

          <button type="submit" class="submit-btn" id="submitBtn">
            Bika Imyirondoro yawe
            <div class="spinner-border spinner-border-sm loading-spinner" id="loadingSpinner" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer">
    &copy; © 2025 Ishuri Rikuru RP Kigali. Uburenganzira bwose burabitswe.
  </footer>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const form = document.getElementById("rplForm");
      const unionSelect = document.getElementById("union");
      const unionNameContainer = document.getElementById("unionNameContainer");
      const successAlert = document.getElementById("successAlert");
      const successMessage = document.getElementById("successMessage");
      const loadingSpinner = document.getElementById("loadingSpinner");
      const submitBtn = document.getElementById("submitBtn");

      unionSelect.addEventListener("change", function() {
        if (this.value === "Yes") {
          unionNameContainer.style.display = "block";
          document.getElementById("unionName").setAttribute("required", "required");
        } else {
          unionNameContainer.style.display = "none";
          document.getElementById("unionName").removeAttribute("required");
        }
      });

      if (unionSelect.value === "Yes") {
        unionNameContainer.style.display = "block";
      } else {
        unionNameContainer.style.display = "none";
      }

      function validateFileSize(fileInput) {
        const maxSize = 2 * 1024 * 1024;
        const fileId = fileInput.id;
        const errorDiv = document.getElementById(fileId + "-error");

        if (fileInput.files.length > 0) {
          const fileSize = fileInput.files[0].size;
          if (fileSize > maxSize) {
            errorDiv.textContent = "File size exceeds the maximum allowed size of 2MB.";
            return false;
          } else {
            errorDiv.textContent = "";
            return true;
          }
        }
        return true;
      }

      document.getElementById("id_doc").addEventListener("change", function() {
        validateFileSize(this);
      });

      document.getElementById("recommendation").addEventListener("change", function() {
        validateFileSize(this);
      });

      form.addEventListener("submit", function(e) {
        e.preventDefault();

        const errorElements = document.querySelectorAll(".error-message");
        errorElements.forEach(el => el.textContent = "");

        const idDocValid = validateFileSize(document.getElementById("id_doc"));
        const recValid = validateFileSize(document.getElementById("recommendation"));

        if (!idDocValid || !recValid) {
          return;
        }

        loadingSpinner.style.display = "inline-block";
        submitBtn.disabled = true;

        const formData = new FormData(form);

        fetch("insert.php", {
          method: "POST",
          body: formData
        })
        .then(response => {
          if (!response.ok) {
            throw new Error("Network response was not ok");
          }
          return response.json();
        })
        .then(result => {
          loadingSpinner.style.display = "none";
          submitBtn.disabled = false;

          if (result.success) {
            successMessage.textContent = result.message;
            successAlert.style.display = "block";
            setTimeout(() => {
              successAlert.style.display = "none";
            }, 5000);
            form.reset();
          } else {
            alert("Error: " + result.message);
          }
        })
        .catch(error => {
          loadingSpinner.style.display = "none";
          submitBtn.disabled = false;
          console.error("Error:", error);
          alert("An unexpected error occurred. Please try again.");
        });
      });
    });
    
    document.querySelector('.menu-toggle').addEventListener('click', function () {
      document.querySelector('.navbar-right').classList.toggle('active');
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>