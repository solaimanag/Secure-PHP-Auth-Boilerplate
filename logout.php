<?php
/**
 * Logout Controller
 * Destroys the user session and redirects to the login page.
 */
session_start();

// Unset all session variables and destroy the session
session_unset();
session_destroy();

header('Location: index.php?message=logged_out');
exit;