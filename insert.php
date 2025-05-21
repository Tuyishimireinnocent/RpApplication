<?php
require 'connection.php';
require 'vendor/autoload.php';
header('Content-Type: application/json');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

ini_set('display_errors', 1);
error_reporting(E_ALL);

function generateRegistrationNumber($pdo) {
    $year = date('y'); // e.g. 25 for 2025
    $prefix = $year . 'VS';

    $stmt = $pdo->prepare("SELECT registration_number FROM candidates WHERE registration_number LIKE ? ORDER BY registration_number DESC LIMIT 1");
    $stmt->execute([$prefix . '%']);
    $last = $stmt->fetchColumn();

    if ($last) {
        $lastSeq = (int)substr($last, 4); // Get the numeric part
        $nextSeq = $lastSeq + 1;
    } else {
        $nextSeq = 1;
    }

    return $prefix . str_pad($nextSeq, 5, '0', STR_PAD_LEFT);
}

function validateFile($file) {
    if (!isset($file) || $file['error'] != UPLOAD_ERR_OK) {
        return ['valid' => false, 'message' => 'File upload error: ' . uploadErrorMessage($file['error'] ?? UPLOAD_ERR_NO_FILE)];
    }

    $maxSize = 1 * 1024 * 1024; // 1MB
    $allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png'];
    if ($file['size'] > $maxSize) {
        return ['valid' => false, 'message' => 'File size exceeds 1MB.'];
    }

    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($extension, $allowedExtensions)) {
        return ['valid' => false, 'message' => 'Invalid file type.'];
    }

    return ['valid' => true];
}

function uploadErrorMessage($code) {
    $errors = [
        UPLOAD_ERR_INI_SIZE => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        UPLOAD_ERR_FORM_SIZE => 'The uploaded file exceeds the MAX_FILE_SIZE directive in the HTML form',
        UPLOAD_ERR_PARTIAL => 'The uploaded file was only partially uploaded',
        UPLOAD_ERR_NO_FILE => 'No file was uploaded',
        UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder',
        UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk',
        UPLOAD_ERR_EXTENSION => 'A PHP extension stopped the file upload'
    ];
    return $errors[$code] ?? 'Unknown upload error';
}

function sendEmailNotification($email, $fullName, $registrationNumber) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'tuyishimireinnocent2002@gmail.com';
        $mail->Password = 'usbbggtyvqzcqrwt'; // App password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('tuyishimireinnocent2002@gmail.com', 'Rp kigali college Application Team');
        $mail->addAddress($email, $fullName);
        $mail->Subject = 'Gusaba Byakiriwe';
        $mail->Body = "Dear $fullName,\n\nMUrakoze Kwiyandikisha.\nNimero ikuranga nk'umunyeshuri  ni: $registrationNumber.\n\nNyamuneka Bika iyi nimero kuko izakenerwa.\n\nMurakoze\nRp kigali college Application Team";

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("PHPMailer error: {$mail->ErrorInfo}");
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        if (!isset($pdo)) throw new Exception("Database connection not established.");

        $fields = ['fullname', 'dob', 'nationality', 'nin', 'trade', 'experience', 'employer', 'union', 'phone'];
        $missing = [];
        foreach ($fields as $f) if (empty($_POST[$f])) $missing[] = $f;
        if ($missing) {
            echo json_encode(['success' => false, 'message' => 'Missing: ' . implode(', ', $missing)]);
            exit;
        }

        if (!isset($_FILES['id_doc']) || $_FILES['id_doc']['error'] != UPLOAD_ERR_OK) {
            echo json_encode(['success' => false, 'message' => 'ID Document: ' . uploadErrorMessage($_FILES['id_doc']['error'])]);
            exit;
        }
        if (!isset($_FILES['recommendation']) || $_FILES['recommendation']['error'] != UPLOAD_ERR_OK) {
            echo json_encode(['success' => false, 'message' => 'Recommendation: ' . uploadErrorMessage($_FILES['recommendation']['error'])]);
            exit;
        }

        $fullName = $_POST['fullname'];
        $dob = $_POST['dob'];
        $nationality = $_POST['nationality'];
        $nid = $_POST['nin'];
        $trade = $_POST['trade'];
        $experience = $_POST['experience'];
        $employer = $_POST['employer'];
        $union = $_POST['union'];
        $unionName = $_POST['unionName'] ?? null;
        $phone = $_POST['phone'];
        $email = $_POST['email'] ?? null;

        $stmt = $pdo->prepare("SELECT * FROM candidates WHERE national_id_passport = ? OR phone = ? OR (email IS NOT NULL AND email = ?)");
        $stmt->execute([$nid, $phone, $email]);
        $existing = $stmt->fetch();

        if ($existing) {
            if ($existing['national_id_passport'] == $nid) {
                echo json_encode(['success' => false, 'message' => 'indangamuntu isanzwe ihari.']);
            } elseif ($existing['phone'] == $phone) {
                echo json_encode(['success' => false, 'message' => 'Numero ya terefone isanzwe ihari.']);
            } elseif (!empty($email) && $existing['email'] == $email) {
                echo json_encode(['success' => false, 'message' => 'imeli yawe isanzwe ihari.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Inyandiko ebyiri zabonetse']);
            }
            exit;
        }

        $idCheck = validateFile($_FILES['id_doc']);
        $recCheck = validateFile($_FILES['recommendation']);
        if (!$idCheck['valid']) {
            echo json_encode(['success' => false, 'message' => 'ID Document: ' . $idCheck['message']]);
            exit;
        }
        if (!$recCheck['valid']) {
            echo json_encode(['success' => false, 'message' => 'Recommendation: ' . $recCheck['message']]);
            exit;
        }

        $registrationNumber = generateRegistrationNumber($pdo);

        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
        $timestamp = time();

        $pdo->beginTransaction();
        $stmt = $pdo->prepare("INSERT INTO candidates (registration_number, full_name, date_of_birth, nationality, national_id_passport, field_of_assessment, years_experience, employer_name, trade_union_member, trade_union_name, phone, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$registrationNumber, $fullName, $dob, $nationality, $nid, $trade, $experience, $employer, $union, $unionName, $phone, $email]);
        $candidateId = $pdo->lastInsertId();

        $idDocPath = $uploadDir . $timestamp . '_id_' . md5($candidateId . basename($_FILES['id_doc']['name'])) . "." . pathinfo(basename($_FILES['id_doc']['name']), PATHINFO_EXTENSION);
        $recPath = $uploadDir . $timestamp . '_rec_' . md5($candidateId . basename($_FILES['recommendation']['name'])) . "." . pathinfo(basename($_FILES['recommendation']['name']), PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['id_doc']['tmp_name'], $idDocPath);
        move_uploaded_file($_FILES['recommendation']['tmp_name'], $recPath);

        $docStmt = $pdo->prepare("INSERT INTO documents (candidate_id, id_document_path, recommendation_path) VALUES (?, ?, ?)");
        $docStmt->execute([$candidateId, $idDocPath, $recPath]);

        $pdo->commit();

        $msg = "Gusaba byatanzwe neza. Inomero yawe yo kwiyandikisha ni $registrationNumber.";
        if ($email) {
            $sent = sendEmailNotification($email, $fullName, $registrationNumber);
            $msg .= $sent ? ' Kwemeza imeri byoherejwe.' : ' Imeri yananiwe.';
        }

        echo json_encode(['success' => true, 'message' => $msg]);

    } catch (PDOException $e) {
        if ($pdo->inTransaction()) $pdo->rollBack();
        error_log("DB error: " . $e->getMessage());
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
    } catch (Exception $e) {
        if (isset($pdo) && $pdo->inTransaction()) $pdo->rollBack();
        error_log("App error: " . $e->getMessage());
        echo json_encode(['success' => false, 'message' => 'Unexpected error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid method.']);
}
?>
