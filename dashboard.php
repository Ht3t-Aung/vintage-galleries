<?php
  // Start the session
  session_start();
  if(!isset($_SESSION['user'])) header('location: login.php');

  $user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vintage Galleries - Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css" type="text/css" />
    <link rel="stylesheet" href="css/general.css" type="text/css" />
    <link rel="icon" type="image/x-icon" href="./images/Logo.jpg" />
    <script
      src="https://kit.fontawesome.com/ea4278b458.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div id="dashboardMainContainer">
      <?php  include('partials/app-sidebar.php') ?>
      <div class="dashboard_content_container" id="dashboard_content_container">
        <?php include('partials/app-topnav.php') ?>
        <div class="dashboard_content">
          <div class="dashboard_content_main"></div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="js/script.js"></script>
  </body>
</html>
