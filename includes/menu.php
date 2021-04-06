<?php
if (isset($_SESSION['user'])) {
  $user = $_SESSION["user"];
  $user_id = $_SESSION["user_id"];
  if ($user == 'admin') {
    echo "  
    <br>
    <ul class='nav flex-column nav-pills nav-fill'>
      <li class='nav-item'>
        <a class='nav-link active bg-secondary' href='register.php'>Register Owner</a>
      </li><br>
      <li class='nav-item'>
        <a class='nav-link active bg-secondary' href='resetpass.php'>Reset Password</a>
      </li><br>
      <li class='nav-item'>
        <a class='nav-link active bg-secondary' href='list.php'>List of Owners</a>
      </li><br>
      <li class='nav-item'>
        <a class='nav-link active bg-secondary' href='../index.php'>Search Bus</a>
      </li><br>
    </ul>
    <br>
    ";
  } else if ($user == 'owner') {
    echo "  
    <br>
    <ul class='nav flex-column nav-pills nav-fill'>
      <li class='nav-item'>
        <a class='nav-link active bg-secondary' href='addcounter.php'>Add Counter</a>
      </li><br>
      <li class='nav-item'>
        <a class='nav-link active bg-secondary' href='addbus.php'>Add Bus</a>
      </li><br>
      <li class='nav-item'>
        <a class='nav-link active bg-secondary' href='schedule.php'>Schedule Bus</a>
      </li><br>
      <li class='nav-item'>
        <a class='nav-link active bg-secondary' href='../index.php'>Search Bus</a>
      </li><br>
    </ul>
    <br>
    ";
  } else if ($user == 'counter') {
    echo "  
    <br>
    <ul class='nav flex-column nav-pills nav-fill'>
      <li class='nav-item'>
        <a class='nav-link active bg-secondary' href='booking.php'>Book Ticket</a>
      </li><br>
      <li class='nav-item'>
        <a class='nav-link active bg-secondary' href='../index.php'>Search Bus</a>
      </li><br>
    </ul>
    <br>
    ";
  }
}
