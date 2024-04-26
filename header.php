<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylez.css">
    <title>Head</title>
</head>
<body>
<header class="logo">
  <?php
  
    session_start();
    if(null == isset($_SESSION['usernamem'])) {
      echo '<a href = "loginpage.php">войти</a><a href = "Conference.php">Заявка на конференцию</a><a href = "Quiz.php">Заявка на квиз</a><a href = "RoundTable.php">Заявка на круглый стол</a>';
    }
    else{
        echo '<a href = "loginpage.php">'.$_SESSION['usernamem'].'</a><a href = "Conference.php">Заявка на конференцию</a><a href = "Quiz.php">Заявка на квиз</a><a href = "RoundTable.php">Заявка на круглый стол</a>';
    }
  ?>
  
</header>
</body>
</html>