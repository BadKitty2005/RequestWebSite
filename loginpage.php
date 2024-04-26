<!DOCTYPE html>
<html>
<head>
	<title>Вход / Регистрация</title>
	<link rel="stylesheet" type="text/css" href="stylez.css">
	<script src="script.js"></script>
</head>
<body class="loginpage">
<?php include('header.php'); ?>
 <?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kokosik";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Проверка, была ли нажата кнопка "Зарегистрироваться"
if(isset($_POST['submitr'])){
    // Получение данных из формы регистрации
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // Проверка наличия такого же пользователя в базе данных
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($query);
    if($result->num_rows > 0){
        echo "Пользователь c таким именем уже существует!";
    } else {
        // Добавление пользователя в базу данных
        $insert_query = "INSERT INTO users (username, password, repeatpassword, role)
                         VALUES ('$username', '$password', '$confirmpassword', 2)";
        if($conn->query($insert_query) === TRUE){
            if($confirmpassword == $password){
                echo "<script>
                alert('Регистрация успешна!');
                document.location.href = 'loginpage.php';
            </script>";
            }
        } else {
            echo "<script>
            alert('Ошибка при регистрации');
            document.location.href = 'loginpage.php';
            </script>";
        }
    }
}
if(isset($_POST['submitl'])){
    $usernamel = $_POST['usernamel'];
    $passwordl = $_POST['passwordl'];
    $select = "SELECT * from users where username = '$usernamel' and password = '$passwordl'";
    $selectr = "SELECT role from users where username = '$usernamel' and password = '$passwordl'";
    $result = $conn->query($select);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            session_start();
            $_SESSION['role'] = $row['role'];
            $_SESSION['usernamem'] = $row['username'];
        }
    }
}
// Закрытие соединения с базой данных
$conn->close();
?>
     <div>
        <div class="form">
          <form class="register-form" method="post" >
              <h1>Регистрация</h1>
            <input type="text" name="username" placeholder="Введите электронную почту" required><br>
            <input type="password" name="password" placeholder="Введите пароль" required><br>
            <input type="password" name="confirmpassword" placeholder="Подтвердите пароль" required><br>
            <input type="submit" name="submitr" value="Зарегистрироваться">
            <p class="message">
              Уже зарегистрированны? <a href="#">Войти</a>
            </p>
          </form>
          
          <form class="login-form" method="post">
          <h1>Авторизация</h1>
            <input type="text" name="usernamel" placeholder="Введите электронную почту"/>
            <input type="text" name="passwordl" placeholder="Введите пароль"/>
            <input type="submit" name="submitl" value="войти">
            <p class="message">
              Не зарегистрированны? <a href="#">Регистрация</a>
            </p>
          </form>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script>
          $('.message a').click(function() {
              $('form').animate({height: "toggle", opacity: "toggle"}, "slow");})
          </script>
    </div>
</body>
</html>