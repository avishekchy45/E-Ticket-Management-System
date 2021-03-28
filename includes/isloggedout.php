<?php
if (!isset($_SESSION['user'])) {
    echo("<script>location.href = '../login.php';</script>");
}
?>
