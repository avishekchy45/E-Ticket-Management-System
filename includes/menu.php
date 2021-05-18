<?php
if (isset($_SESSION['user'])) {
  $user = $_SESSION["user"];
  $user_id = $_SESSION["user_id"];
  if ($user == 'admin') {
    echo "  
    <br>
    <ul class='nav flex-column nav-pills nav-fill'>
      <li class='nav-item'>
        <a class='nav-link active bg-secondary' href='registerowner.php'>Register Owner</a>
      </li><br>
      <li class='nav-item'>
        <a class='nav-link active bg-secondary' href='listofowners.php'>List of Owners</a>
      </li><br>
      <li class='nav-item'>
        <a class='nav-link active bg-secondary' href='resetpass.php'>Reset Password</a>
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
        <a class='nav-link active bg-secondary' href='availablebus.php'>Available Bus</a>
      </li><br>
      <li class='nav-item'>
        <a class='nav-link active bg-secondary' href='../index.php'>Search Bus</a>
      </li><br>
    </ul>
    <br>
    ";
  } else if ($user == 'user') {
    echo "  
    <br>
    <ul class='nav flex-column nav-pills nav-fill'>
      <li class='nav-item'>
        <a class='nav-link active bg-info' href='bookedbustickets.php'>Booked Bus Tickets</a>
      </li><br>
      <li class='nav-item'>
        <a class='nav-link active bg-secondary' href='../index.php'>Book Bus Ticket</a>
      </li><br>
      <li class='nav-item'>
        <a class='nav-link active bg-secondary' href='../index.php'>Book Train Ticket</a>
      </li><br>
      <li class='nav-item'>
        <a class='nav-link active bg-secondary' href='../index.php'>Book Air Ticket</a>
      </li><br>
      <li class='nav-item'>
        <a class='nav-link active bg-secondary' href='../index.php'>Book Launch Ticket</a>
      </li><br>
      <li class='nav-item'>
        <a class='nav-link active bg-secondary' href='../index.php'>Book Movie Ticket</a>
      </li><br>
      <li class='nav-item'>
        <a class='nav-link active bg-secondary' href='../index.php'>Book Hotel</a>
      </li><br>
    </ul>
    <br>
    ";
  }
}
