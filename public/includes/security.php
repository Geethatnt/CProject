<?php
if(!isset($_SESSION['role'])){
    header("Location:/GIT/M6CommunityPortal/public/login.php");
}
if($_SERVER['PHP_SELF']=="/GIT/M6CommunityPortal/public/modules/user/userlist1.php")
{
    if($_SESSION['role']=="user")
    {
        header("Location:/GIT/M6CommunityPortal/public/login.php");
    }
}
if($_SERVER['PHP_SELF']=="/GIT/M6CommunityPortal/public/bulkmail.php")
{
    if($_SESSION['role']=="user")
    {
        header("Location:/GIT/M6CommunityPortal/public/login.php");
    }
}
?>