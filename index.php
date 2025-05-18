<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>RPL Application Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .form-label {
      font-weight: 500;
      margin-top: 10px;
    }
    .error-message {
      color: #dc3545;
      font-size: 0.875rem;
      margin-top: 0.25rem;
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
  </style>
</head>
<body class="bg-light">
  <!-- Success Alert -->
  <div class="alert alert-success alert-dismissible fade show success-alert" id="successAlert" role="alert">
    <span id="successMessage"></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

  <div class="container mt-5 mb-5">
    <div class="card shadow-lg">
      <div class="card-header text-white text-center" style="background-color: #0093D0;">
        <h3>RECOGNITION OF PRIOR LEARNING (RPL) Application Form</h3>
        <p>For Masonry and Domestic Electricity Installation</p>
      </div>
      <div class="card-body p-4">
        <form id="rplForm" enctype="multipart/form-data">
          <div class="row g-3">
            <div class="col-12">
              <label for="fullname" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="fullname" name="fullname" required>
              <div class="error-message" id="fullname-error"></div>
            </div>

            <div class="col-12">
              <label for="dob" class="form-label">Date of Birth</label>
              <input type="date" class="form-control" id="dob" name="dob" required>
              <div class="error-message" id="dob-error"></div>
            </div>

            <div class="col-12">
              <label for="nationality" class="form-label">Nationality</label>
              <select class="form-select" id="nationality" name="nationality" required>
                <option value="">Choose...</option>
                <option value="Rwandan">Rwandan</option>
                <option value="Resident">Rwandan Resident</option>
              </select>
              <div class="error-message" id="nationality-error"></div>
            </div>

            <div class="col-12">
              <label for="nin" class="form-label">National ID / Passport Number</label>
              <input type="text" class="form-control" id="nin" name="nin" pattern="\d{16}" minlength="16" maxlength="16" title="Enter exactly 16 digits" required>
              <div class="error-message" id="nin-error"></div>
            </div>

            <div class="col-12">
              <label for="trade" class="form-label">Field of Assessment</label>
              <select class="form-select" id="trade" name="trade" required>
                <option value="">Choose...</option>
                <option value="Masonry">Masonry</option>
                <option value="Domestic Electricity Installation">Domestic Electricity Installation</option>
              </select>
              <div class="error-message" id="trade-error"></div>
            </div>

            <div class="col-12">
              <label for="experience" class="form-label">Years of Experience</label>
              <input type="number" class="form-control" id="experience" name="experience" min="2" required>
              <div class="error-message" id="experience-error"></div>
            </div>

            <div class="col-12">
              <label for="employer" class="form-label">Employer / Business Name</label>
              <input type="text" class="form-control" id="employer" name="employer" required>
              <div class="error-message" id="employer-error"></div>
            </div>

            <div class="col-12">
              <label for="union" class="form-label">Member of Trade Union / Association?</label>
              <select class="form-select" id="union" name="union" required>
                <option value="">Choose...</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
              <div class="error-message" id="union-error"></div>
            </div>

            <div class="col-12" id="unionNameContainer">
              <label for="unionName" class="form-label">If Yes, Specify Union/Association Name</label>
              <input type="text" class="form-control" id="unionName" name="unionName">
              <div class="error-message" id="unionName-error"></div>
            </div>

            <div class="col-12">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="tel" class="form-control" id="phone" name="phone" pattern="\d{10}" minlength="10" maxlength="10" title="Enter exactly 10 digits" required>
              <div class="error-message" id="phone-error"></div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="email" name="email">
              <div class="error-message" id="email-error"></div>
            </div>

            <div class="col-12">
              <label for="id_doc" class="form-label">Upload National ID / Passport</label>
              <input class="form-control" type="file" id="id_doc" name="id_doc" accept=".pdf,.jpg,.jpeg,.png" required>
              <div class="small text-muted mt-1">Allowed: PDF, JPG, PNG (Max 2MB)</div>
              <div class="error-message" id="id_doc-error"></div>
            </div>

            <div class="col-12">
              <label for="recommendation" class="form-label">Upload Recommendation / Certificate</label>
              <input class="form-control" type="file" id="recommendation" name="recommendation" accept=".pdf,.jpg,.jpeg,.png" required>
              <div class="small text-muted mt-1">Allowed: PDF, JPG, PNG (Max 2MB)</div>
              <div class="error-message" id="recommendation-error"></div>
            </div>

            <div class="col-12 text-center mt-4">
              <button type="submit" class="btn btn-success px-5" id="submitBtn">
                Submit Application
                <div class="spinner-border spinner-border-sm loading-spinner" id="loadingSpinner" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

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
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
