<?php
if (!isset($_SESSION['user'])) {
    echo "
    <nav class='navbar navbar-expand-sm bg-info navbar-dark sticky-top'>
        <a class='navbar-brand' href='index.php'>ticket.com</a>

        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#collapsibleNavbar'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='collapsibleNavbar'>
            <ul class='navbar-nav'>
                <li class='nav-item'>
                    <a class='nav-link' href='login.php'> LOGIN </a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='signup.php'> SIGNUP </a>
                </li>
                <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'>Book Ticket</a>
                    <div class='dropdown-menu'>
                        <a class='dropdown-item' href='index.php'>Bus</a>
                        <a class='dropdown-item' href='index.php'>Train</a>
                        <a class='dropdown-item' href='index.php'>Air</a>
                        <a class='dropdown-item' href='index.php'>Hotel</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    ";
} else {
    $user = $_SESSION["user"];
    $user_id = $_SESSION["user_id"];
    echo "
        <nav class='navbar navbar-expand-sm bg-info navbar-dark sticky-top'>
            <a class='navbar-brand' href='$user/index.php'>ticket.com</a>

            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#collapsibleNavbar'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='collapsibleNavbar'>
                <ul class='navbar-nav'>
                    <li class='nav-item'>
                        <a class='nav-link' href='#'> This is $user account. </a>
                    </li>
                    <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'> $user_id </a>
                        <div class='dropdown-menu'>
                            <a class='dropdown-item' href='$user/index.php'>Home</a>
                            <a class='dropdown-item' href='settings.php'>Settings</a>
                            <a class='dropdown-item text-danger' href='?logout'>LOG OUT</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <br>
        ";
}

if (isset($_GET['logout'])) {
    $_SESSION['login_status'] = "out";
    unset($_SESSION['user']);
    unset($_SESSION['user_id']);
    echo ("<script>location.href = 'login.php';</script>");
}
