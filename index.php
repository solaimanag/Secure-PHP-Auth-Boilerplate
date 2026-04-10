<?php
/**
 * Main Entry Point / Login Controller
 * Handles user authentication and session management.
 */
session_start();
require_once 'config/db.php';

// Redirect to dashboard if the user is already logged in
if (isset($_SESSION['user'])) {
    header('Location: etudiant-liste.php');
    exit;
}

$error = '';

// Process login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Validate inputs
    if (empty($username) || empty($password)) {
        $error = "All fields are required.";
    } else {
        $pdo = getPDO();
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        // Verify password and regenerate session ID to prevent Session Fixation attacks
        if ($user && password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            $_SESSION['user'] = $user;
            header('Location: etudiant-liste.php');
            exit;
        } else {
            $error = "Incorrect credentials.";
            sleep(1); // Delay response to mitigate brute-force attacks
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form method="post">
            <h2>System Login</h2>
            
            <?php if ($error): ?>
                <p class="error-message"><?= htmlspecialchars($error); ?></p>
            <?php endif; ?>
            
            <input type="text" name="username" placeholder="Username" required autofocus>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Sign In</button>
        </form>
    </div>
</body>
</html>