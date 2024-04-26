<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylez.css">
    <title>Круглый стол</title>
</head>
<body id="foot">
<?php include('header.php'); ?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'vendor/autoload.php';
if (isset($_POST['sendrmail'])) {

        $mail = new PHPMailer(true);
        $theme = $_POST["RoundTheme"];
        $surname = $_POST["Surname"];
        $name = $_POST["Name"];
        $fathername = $_POST["FathersName"];
        $adress = $_POST["Adress"];
        $job = $_POST["Job"];
        $anot = $_POST["opinion"];
        //$user_email = $_SESSION['emailm']; сайт на локальном сервере, для нормального сервера поребуется это чтобы поменять это в коде
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'viktoriasnus@gmail.com'; // почта с которой отправляется сообщение(Username = $user_email если это не локальный сервер)
        $mail->Password = 'otep lgpd sbhf lavj'; // пароль этой этпочты
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('viktoriasnus@gmail.com'); // почта с которой отправляется сообщение (setFrom($user_email) если это не локальный сервер)
        $mail->addAddress('puv2912@gmail.com'); //почта на которую отправляется сообщение сообщение
        $mail->isHTML(true) ;
        $mail->Body = "<h1>Заявка на участие в круглом столе</h1>
        Фамилия: $surname<br>
        Имя: $name<br>
        Отчество: $fathername<br>
        Место работы: $adress<br>
        Должность: $job<br>
        Анотация: $city";
        $mail->send();
        echo "
        <script>
            alert('Ваша заявка принята!');
            document.location.href = 'RoundTable.php';
        </script>
        ";
}

?>
<div class="forms">
            <form id="ConfForm" enctype="multipart/form-data" method="POST">
                <h1>Заявка на участие в круглом столе</h1>
        <p>Опишите тематику стола: </p>
        <input type="text" name="RoundTheme" require>
        <p>Ваша фамилия: </p>
        <input type="text" name="Surname" require>
        <p>Ваше имя: </p>
        <input type="text" name="Name" require>
        <p>Ваше отчество: </p>
        <input type="text" name="FathersName" require>
        <p>Место работы: </p>
        <input type="text" name="Adress" require>
        <p>Должность: </p>
        <input type="text" name="Job" require>
        <p>Анотация: </p>
        <textarea name="Opinion" require></textarea>
        <button class="butstyle" type="submit" name="sendrmail">Отправить заявку</button>
            </form>
        </div>
</body>
</html>
