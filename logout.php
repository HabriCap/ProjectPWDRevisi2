<?php
session_start();
session_destroy(); // Destroy the session
header("location:loginadmin&user.php?pesan=logout");