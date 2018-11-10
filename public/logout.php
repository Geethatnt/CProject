<?php
session_start();
session_destroy();
header("Location:/GIT/M6CommunityPortal/public/login.php");
?>