<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="style1.css">
  <title>Meetings</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      outline: 0;

    }

    .filter {
      position: absolute;
      top: 0;
      right: 0;
      left: 0;
      bottom: 0;
      z-index: 1;
      opacity: .7;
      background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .5)), url(./images//img09.jpg) no-repeat center center /cover;

    }

    table {
      position: absolute;
      z-index: 2;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      width: 60%;
      height: 500px;
      border-collapse: collapse;
      border-spacing: 0;
      border-radius: 12px 12px 0 0;
      overflow: hidden;
      box-shadow: 0 12px 5px grey;
      background: #fafafa;
      text-align: center;


    }

    th {
      background: #8c8c8c;
      padding: 12px 15px;
      color: #fafafa;
      text-transform: uppercase;
      font-family: 'Roboto', 'sans-serif';

    }

    h2 {
      margin-top: 20%;
      text-align: center;
      color: black;
    }
  </style>

</head>

<body>

  <nav class="navbar navbar-expand-lg fixed-top nav-menu">
    <a href="/kiosk/welcome_visitor.php" class="navbar-brand text-light text-uppercase"><span class="h2 font-weight-bold">Navitas</span><span class="h1">KIOSK</span></a>
    <div class="collapse navbar-collapse justify-content-end text-uppercase font-weight-bold" id="myNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="/kiosk/showmeetings_visitors.php" class="nav-link m-1 menu-item">Meetings</a>
        </li>
        <li class="nav-item">
          <a href="/kiosk/search_visitor.php" class="nav-link m-1 menu-item">Location & Directions</a>
        </li>

        <li class="nav-item">
          <a href="/kiosk/buildingMap.php" class="nav-link m-1 menu-item">Building Map</a>
        </li>
        <li class="nav-item">
          <a href="/kiosk/Kiosk Directions/index.html" class="nav-link m-1 menu-item">Live Directions</a>
        </li>
        <li class="nav-item">
          <a href="/kiosk/login_staff.php" class="nav-link m-1 menu-item">log out</a>
        </li>
      </ul>
    </div>
  </nav>



  <div class="filter">

  </div>
  <table class="">
    <thead>
      <tr>
        <th scope="col">First_name</th>
        <th scope="col">Last_name</th>
        <th scope="col">Meeting ID</th>
        <th scope="col">Meeting Official</th>
        <th scope="col">Time</th>
        <th scope="col">Day</th>
      </tr>
      </div>
      </div>
      <?php
      //Session starting
      session_start();
      include('partials/_dbconnect.php'); //DB Connection
      error_reporting(0);
      //Sql query to connect visitor and visitor meeting by serial no.
      $sql = "select firstname,lastname,meetingid,meetingofficial,time,day from visitor_meetings JOIN visitors ON visitors.sno = visitor_meetings.sno WHERE visitors.email='$_SESSION[email]'";
      $result = mysqli_query($conn, $sql);
      //checking if there's any result
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td><td>" . $row["meetingid"] . "</td><td>" . $row["meetingofficial"] . "</td><td>" . $row["time"] . "</td><td>" . $row["day"] . "</td></tr>";
        }

        echo "</table>";
      } else {
        echo "0 result";
      }
      ?>
    </thead>

  </table>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="script.js"></script>
</body>

</html>