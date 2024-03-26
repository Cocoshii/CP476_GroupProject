<?php
    // Logs user out of the website and destroys session data
    // Also redirects the user back to login page
    session_destroy();
    header("Location: login.php");
?>