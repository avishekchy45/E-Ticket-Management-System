<?php
if (isset($_SESSION['user'])) {
    $type = $_SESSION['user'];
    echo("<script>location.href = '$type/index.php';</script>");
}
