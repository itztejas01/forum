<?php
session_start();
echo "logging you out. Please wait...";
session_destroy();
header("Location: /forum/index.php?logout=true");
?>