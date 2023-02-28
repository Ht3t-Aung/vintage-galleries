<?php
  
  // Start the session.
  session_start();
  if(isset($_SESSION['user'])) header('location: dashboard.php');

  $error_message = ''; 

  if($_POST){
    include('database/connection.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    

    $query = 'SELECT *  FROM users WHERE users.email="'. $username .'" AND users.password="'. $password .'"';
    $stmt = $conn->prepare($query);
    $stmt->execute();

    if($stmt->rowCount() > 0){
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $user = $stmt->fetchAll()[0];

      // Captures data of currently login users.
      $_SESSION['user'] = $user;

      header('Location: dashboard.php');
    }  else $error_message = 'Please make sure that username and password are correct.';
    
  }
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vintage Galleries</title>
    <link rel="stylesheet" href="css/login.css" type="text/css" />
    <link rel="icon" type="image/x-icon" href="./images/Logo.jpg" />
  </head>
  <body id="loginBody">
    <?php if(!empty($error_message)) { ?>
      <div id="errorMessage">
          <strong>ERROR:</strong> </p><?= $error_message ?> </p>
        </div>
      <?php } ?>
    <div class="container">
      <div class="loginHeader">
        <h1>Vintage Galleries</h1>
        <h3>Inventory Management</h3>
      </div>
      <div class="loginBody">
        <form action="login.php" method="POST">
          <div class="loginInputsContainer">
            <label for="">Username</label>
            <input placeholder="username" name="username" type="text" />
          </div>
          <div class="loginInputsContainer">
            <label for="">Password</label>
            <input placeholder="password" name="password" type="password" />
          </div>
          <div class="loginButtonContainer">
            <button>Login</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
