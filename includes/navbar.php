<?php
$user = $_SESSION["user"];
$user_id = $_SESSION["user_id"];
echo "
    <nav class='navbar navbar-expand-sm bg-info navbar-dark'>
        <a class='navbar-brand' href='index'>ticket.com</a>

        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#collapsibleNavbar'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='collapsibleNavbar'>
            <ul class='navbar-nav'>
                <li class='nav-item'>
                    <a class='nav-link text-uppercase' href='#'> This is $user account </a>
                </li>
                <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'> $user_id </a>
                    <div class='dropdown-menu'>
                        <a class='dropdown-item' href='index'>Home</a>
                        <a class='dropdown-item' href='../settings'>Settings</a>
                        <a class='dropdown-item text-danger' href='?logout'>LOG OUT</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    ";

if (isset($_GET['logout'])) {
    $_SESSION['login_status'] = "out";
    unset($_SESSION['user']);
    unset($_SESSION['user_id']);
    echo ("<script>location.href = '../login.php';</script>");
}
