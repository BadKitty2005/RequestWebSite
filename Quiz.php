<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="stylez.css">
  <title>Квиз</title>
</head>
<body>
<?php include('header.php'); ?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'vendor/autoload.php';
if (isset($_POST['sendmail'])) {

        $mail = new PHPMailer(true);

                // Получение названия команды
                $teamName = $_POST['ComandName'];

                // Формирование тела письма
                $body = "<h2>Заявка на квиз</h2>";
                $body .= "<p>Команда: $teamName</p>";
                $body .= "<table>";
                $body .= "<tr><th>ФИО</th><th>Место работы</th><th>Должность</th></tr>";
                
                // Цикл для обработки данных о каждом участнике
                for ($i = 1; $i <= 5; $i++) {
                    $surname = $_POST["Surname$i"];
                    $name = $_POST["Name$i"];
                    $fathername = $_POST["FathersName$i"];
                    $adress = $_POST["Adress$i"];
                    $job = $_POST["Job$i"];
                    $body .= "<tr><td>$surname $name $fathername</td><td>$adress</td><td>$job</td></tr>";
                }
                
                $body .= "</table>";
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'viktoriasnus@gmail.com'; // Your gmail
        $mail->Password = 'otep lgpd sbhf lavj'; // Your gmail app password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('viktoriasnus@gmail.com'); // Your gmail
        $mail->addAddress('puv2912@gmail.com');
        $mail->isHTML(true) ;
        $mail->Body = $body;
        $mail->send();
        echo "
        <script>
            alert('Ваша заявка принята!');
            document.location.href = 'Quiz.php';
        </script>
        ";
}

?>
<div class="forms">
    <form id="quizForm" method="POST">
        <h1>Заявка на квиз</h1>
        <p>Название вашей команды: <input type="text" name="ComandName"></p>
            <h3>Первый участник</h3>
            <div class="bord">
            <p>Фамилия:</p>
            <input type="text" name="Surname1">
                        <p>Имя:</p>
                        <input type="text" name="Name1">
                        <p>Отчество:</p>
                        <input type="text" name="FathersName1">
                        <p>Место работы:</p>
                        <input type="text" name="Adress1">
                        <p>Должность:</p>
                        <input type="text" name="Job1">
                    </div>
        <h3>Второй участник</h3>
        <div class="bord">
        <p>Фамилия: </p>
        <input type="text" name="Surname2">
                    <p>Имя:</p>
                    <input type="text" name="Name2">
                    <p>Отчество:</p>
                    <input type="text" name="FathersName2">
                    <p>Место работы:</p>
                    <input type="text" name="Adress2">
                    <p>Должность: </p>
                    <input type="text" name="Job2">
                </div>
        <h3>Третий участник</h3>
        <div class="bord">
        <p>Фамилия:</p>
        <input type="text" name="Surname3">
        <p>Имя:</p>
        <input type="text" name="Name3">
        <p>Отчество: </p>
        <input type="text" name="FathersName3">
        <p>Место работы:</p>
        <input type="text" name="Adress3">
        <p>Должность: </p>
        <input type="text" name="Job3">
        
        </div>
    <h3>Четвертый участник</h3>
        <div class="bord">
        <p>Фамилия: </p>
        <input type="text" name="Surname4">
        <p>Имя: </p>
        <input type="text" name="Name4">
        <p>Отчество: </p>
        <input type="text" name="FathersName4">
        <p>Место работы: </p>
        <input type="text" name="Adress4">
        <p>Должность: </p>
        <input type="text" name="Job4">
    </div>
        <h3>Пятый участник</h3>
        <div class="bord">
        <p>Фамилия: </p>
        <input type="text" name="Surname5">
        <p>Имя: </p>
        <input type="text" name="Name5">
        <p>Отчество: </p>
        <input type="text" name="FathersName5">
        <p>Место работы: </p>
        <input type="text" name="Adress5">
        <p>Должность: </p>
        <input type="text" name="Job5">
        </div>
        <button class="butstyle" type="submit" name="sendmail">Отправить заявку</button>
        </form>
        </div>
</body>
</html>