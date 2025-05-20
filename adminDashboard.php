<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - RPL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .sidebar {
      background-color: #0093D0;
      color: #fff;
      padding-top: 20px;
      height: 100vh;
      position: sticky;
      top: 0;
    }

    .sidebar h4 {
      text-align: center;
      margin-bottom: 30px;
    }

    .sidebar ul {
      list-style: none;
      padding-left: 0;
    }

    .sidebar ul li {
      padding: 15px 25px;
    }

    .sidebar ul li a {
      color: #fff;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 1.1rem;
    }

    .sidebar ul li a:hover {
      background-color: #007cb3;
      border-radius: 4px;
    }

    .topbar {
      background-color: #0093D0;
      height: 50px;
      display: flex;
      justify-content: flex-end;
      align-items: center;
      padding: 0 20px;
      color: white;
      font-size: 1.1rem;
    }

    .card-box {
      padding: 20px;
      border-radius: 10px;
      color: #fff;
      margin-bottom: 20px;
    }

    .bg-primary-light { background-color: #007bff; }
    .bg-success-light { background-color: #28a745; }
    .bg-warning-light { background-color: #ffc107; color: #212529; }
    .bg-danger-light { background-color: #dc3545; }

    .btn-edit {
      background-color: #0d6efd;
      color: white;
    }

    .btn-delete {
      background-color: #dc3545;
      color: white;
    }

    @media (max-width: 768px) {
      .sidebar {
        position: relative;
        height: auto;
      }
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row flex-nowrap">
    <!-- Sidebar -->
    <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 sidebar">
      <h4>Hello, Admin</h4>
      <ul>
        <li><a href="#"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
        <li><a href="#"><i class="bi bi-people-fill"></i> Candidates</a></li>
        <li><a href="#"><i class="bi bi-file-earmark-check"></i> Assessments</a></li>
        <li><a href="#"><i class="bi bi-graph-up"></i> Reports</a></li>
        <li><a href="#"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="col py-3">
      <!-- Topbar -->
      <div class="topbar mb-3">
        <span>Admin Dashboard</span>
      </div>

      <h2 class="text-center mb-4">RPL Applications</h2>

      <!-- Stats Cards -->
      <div class="row text-white">
        <div class="col-sm-6 col-md-3 mb-3">
          <div class="card-box bg-primary-light text-center">
            <h5>Total Candidates</h5>
            <h2 id="totalCandidates">--</h2>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 mb-3">
          <div class="card-box bg-warning-light text-center">
            <h5>Pending Assessments</h5>
            <h2 id="pendingAssessments">--</h2>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 mb-3">
          <div class="card-box bg-success-light text-center">
            <h5>Passed</h5>
            <h2 id="passedAssessments">--</h2>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 mb-3">
          <div class="card-box bg-danger-light text-center">
            <h5>Failed</h5>
            <h2 id="failedAssessments">--</h2>
          </div>
        </div>
      </div>

      <!-- Candidate Table -->
      <div class="card mt-4">
        <div class="card-header bg-dark text-white">
          <h5 class="mb-0">Candidate Applications</h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered">
              <thead class="table-light">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Full Name</th>
                  <th scope="col">Trade</th>
                  <th scope="col">Experience</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Status</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody id="candidateTable">
                <!-- JS inserts data here -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Dynamic Data Script -->
<script>
  document.getElementById("totalCandidates").innerText = "134";
  document.getElementById("pendingAssessments").innerText = "32";
  document.getElementById("passedAssessments").innerText = "84";
  document.getElementById("failedAssessments").innerText = "18";

  const candidates = [
    { id: 1, name: "John Doe", trade: "Masonry", experience: 4, phone: "0788123456", result: "Pending" },
    { id: 2, name: "Jane Uwimana", trade: "Electricity", experience: 6, phone: "0788567890", result: "Passed" },
    { id: 3, name: "Eric Nshimiyimana", trade: "Masonry", experience: 3, phone: "0788120000", result: "Failed" }
  ];

  const table = document.getElementById("candidateTable");

  candidates.forEach((c, i) => {
    const row = document.createElement("tr");
    row.innerHTML = `
      <td>${i + 1}</td>
      <td>${c.name}</td>
      <td>${c.trade}</td>
      <td>${c.experience} years</td>
      <td>${c.phone}</td>
      <td>
        <span class="badge bg-${c.result === 'Passed' ? 'success' : c.result === 'Failed' ? 'danger' : 'warning'}">${c.result}</span>
      </td>
      <td>
        <a href="view_candidate.php?id=${c.id}" class="btn btn-sm btn-edit mb-1">
          <i class="bi bi-pencil-square"></i> Edit
        </a>
        <a href="delete_candidate.php?id=${c.id}" class="btn btn-sm btn-delete mb-1" onclick="return confirm('Are you sure you want to delete this candidate?')">
          <i class="bi bi-trash"></i> Delete
        </a>
      </td>
    `;
    table.appendChild(row);
  });
</script>

</body>
</html>
