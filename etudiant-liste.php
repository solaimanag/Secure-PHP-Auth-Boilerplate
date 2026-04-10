<?php
/**
 * Students List Dashboard
 * Fetches and displays registered students for authenticated users.
 */
session_start();
require_once 'config/db.php';

// Enforce authentication: Redirect to login if session is missing
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

// Initialize database connection and fetch all students
$pdo = getPDO();
$stmt = $pdo->query('SELECT * FROM etudiants');
$students = $stmt->fetchAll();

/**
 * Calculates age based on date of birth.
 * * @param string $birthdate (Format: YYYY-MM-DD)
 * @return int Age in years
 */
function calculateAge($birthdate) {
    $birthDateObj = new DateTime($birthdate);
    $today = new DateTime('now');
    return $today->diff($birthDateObj)->y;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Major</th>
                <th>Registration Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
            <tr>
                <td><?= htmlspecialchars($student['nom']); ?></td>
                <td><?= htmlspecialchars($student['prenom']); ?></td>
                <td><?= calculateAge($student['date_naissance']) . ' years'; ?></td>
                <td><?= htmlspecialchars($student['email']); ?></td>
                <td><?= htmlspecialchars($student['telephone'] ?: 'Not provided'); ?></td>
                <td><?= htmlspecialchars($student['filiere']); ?></td>
                <td><?= htmlspecialchars($student['date_inscription']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="logout-btn-container">
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>