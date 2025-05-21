<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$host = 'localhost';
$db   = 'rpl_applications';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $stmt = $pdo->query("SELECT c.candidate_id, c.registration_number, c.full_name, c.nationality, c.national_id_passport, c.field_of_assessment, c.phone, c.email, d.id_document_path, d.recommendation_path
        FROM candidates c
        LEFT JOIN documents d ON c.candidate_id = d.candidate_id
        ORDER BY c.candidate_id asc");

    $candidates = $stmt->fetchAll();

} catch (PDOException $e) {
    echo "<tr><td colspan='8'>Error fetching data: " . $e->getMessage() . "</td></tr>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - RPL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body { font-family: 'Segoe UI', sans-serif; background-color: #f8f9fa; }
    .sidebar { background-color: #1e3c5a; color: #fff; height: 100vh; position: sticky; top: 0; padding-top: 20px; }
    .sidebar h4 { text-align: center; margin-bottom: 30px; }
    .sidebar ul { list-style: none; padding-left: 0; }
    .sidebar ul li { padding: 15px 25px; }
    .sidebar ul li a { color: #fff; text-decoration: none; display: flex; align-items: center; gap: 10px; font-size: 1.1rem; }
    .sidebar ul li a:hover { background-color: #007cb3; border-radius: 5px; }
    .topbar { background-color: #1e3c5a; height: 80px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); display: flex; justify-content: space-between; align-items: center; padding: 0 20px; font-weight: 500; color: white; font-size: 30px; }
    .dashboard-header { margin-top: 30px; display: flex; justify-content: space-between; flex-wrap: wrap; align-items: center; gap: 20px; }
    .stat-card { background: linear-gradient(135deg, #0093D0, #006999); color: white; border-radius: 15px; padding: 25px 30px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); display: flex; align-items: center; gap: 20px; min-width: 250px; }
    .stat-card i { font-size: 2.5rem; }
    .stat-card h5 { margin: 0; font-size: 1.1rem; }
    .stat-card h3 { margin: 0; font-size: 2rem; font-weight: bold; }
    .search-box input { border-radius: 10px; padding: 12px 20px; font-size: 1rem; box-shadow: 0 1px 4px rgba(0,0,0,0.1); min-width: 280px; }
    a.view-doc { text-decoration: none; color: #007cb3; }
    a.view-doc:hover { text-decoration: underline; }
    @media (max-width: 768px) {
      .sidebar { position: relative; height: auto; }
      .dashboard-header { flex-direction: column; align-items: stretch; }
      .search-box input { width: 100%; }
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row flex-nowrap">
    <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 sidebar">
      <h4>Hello, Admin</h4>
      <ul>
        <li><a href="#"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
        <li><a href="#"><i class="bi bi-people-fill"></i> Candidates</a></li>
        <li><a href="#"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
      </ul>
    </div>

    <div class="col py-3">
      <div class="topbar">
        <span>Admin Dashboard</span>
      </div>

      <div class="dashboard-header">
        <div class="stat-card">
          <i class="bi bi-people-fill"></i>
          <div>
            <h5>Total Applicants</h5>
            <h3><?= count($candidates) ?></h3>
          </div>
        </div>
        <div class="search-box">
          <input type="text" id="searchInput" class="form-control" placeholder="Search by Name, National ID or Reg. Number...">
        </div>
      </div>

      <div class="card mt-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered w-100">
              <thead class="table-light">
                <tr>
                  <th>#</th>
                  <th>Reg. Number</th>
                  <th>Full Name</th>
                  <th>Nationality</th>
                  <th>National ID</th>
                  <th>Field of Assessment</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Attachment Files</th>
                </tr>
              </thead>
              <tbody id="candidateTable">
                <?php $index = 1; foreach ($candidates as $candidate): ?>
                <tr>
                  <td><?= $index++ ?></td>
                  <td><?= htmlspecialchars($candidate['registration_number']) ?></td>
                  <td><?= htmlspecialchars($candidate['full_name']) ?></td>
                  <td><?= htmlspecialchars($candidate['nationality']) ?></td>
                  <td><?= htmlspecialchars($candidate['national_id_passport']) ?></td>
                  <td><?= htmlspecialchars($candidate['field_of_assessment']) ?></td>
                  <td><?= htmlspecialchars($candidate['phone']) ?></td>
                  <td><?= htmlspecialchars($candidate['email']) ?></td>
                  <td>
                    <?php if (!empty($candidate['id_document_path'])): ?>
                      <a href="#" class="view-doc" data-file="<?= htmlspecialchars($candidate['id_document_path']) ?>">ID Card</a>&nbsp;&nbsp;
                    <?php endif; ?>
                    <?php if (!empty($candidate['recommendation_path'])): ?>
                      <a href="#" class="view-doc" data-file="<?= htmlspecialchars($candidate['recommendation_path']) ?>">Recommendation Letter</a>
                    <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="modal fade" id="docModal" tabindex="-1" aria-labelledby="docModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header d-flex justify-content-between align-items-center">
              <h5 class="modal-title" id="docModalLabel">Document Preview</h5>
              <div>
                <a id="downloadBtn" href="#" class="btn btn-success btn-sm me-2" download target="_blank">
                  <i class="bi bi-download"></i> Download
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            </div>
            <div class="modal-body" style="height: 80vh;">
              <iframe id="docFrame" src="" width="100%" height="100%" frameborder="0"></iframe>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const docLinks = document.querySelectorAll('.view-doc');
    const modal = new bootstrap.Modal(document.getElementById('docModal'));
    const iframe = document.getElementById('docFrame');
    const downloadBtn = document.getElementById('downloadBtn');

    docLinks.forEach(link => {
      link.addEventListener('click', function (e) {
        e.preventDefault();
        const fileUrl = this.getAttribute('data-file');
        iframe.src = fileUrl;
        downloadBtn.href = fileUrl;
        modal.show();
      });
    });

    const searchInput = document.getElementById('searchInput');
    const tableRows = document.querySelectorAll('#candidateTable tr');

    searchInput.addEventListener('input', function () {
      const searchTerm = this.value.toLowerCase();
      tableRows.forEach(row => {
        const regNumber = row.children[1].textContent.toLowerCase();
        const fullName = row.children[2].textContent.toLowerCase();
        const nationalId = row.children[4].textContent.toLowerCase();
        row.style.display = regNumber.includes(searchTerm) || fullName.includes(searchTerm) || nationalId.includes(searchTerm) ? '' : 'none';
      });
    });
  });
</script>

</body>
</html>