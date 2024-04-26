<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylez.css">
    <title>Конференция</title>
</head>
<body>
<script>
        function checkFile() {
            var fileInput = document.getElementById('filein');
            var submitButton = document.getElementById('subbut');
            
            if (fileInput.files.length > 0) {
                submitButton.disabled = false; // Разрешить нажатие кнопки
            } else {
                submitButton.disabled = true; // Запретить нажатие кнопки
            }
        }
    </script>
<?php include('header.php'); ?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'vendor/autoload.php';
if (isset($_POST['submitt'])) {

        $mail = new PHPMailer(true);

        $surname = $_POST['Surname'];
        $name = $_POST['Surname'];
        $fathername = $_POST['FathersName'];
        $adress = $_POST['Adress'];
        $job = $_POST['Job'];
        $dateofbirth = $_POST['Birth'];
        $city = $_POST['City'];
        $theme = $_POST['Theme'];
        $degree = $_POST['Degree'];

        for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++) 
        { $mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);}

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
        $mail->Body = "<h1>Заявка на конференцию</h1>
        Фамилия: $surname<br>
        Имя: $name<br>
        Отчество: $fathername<br>
        Место работы: $adress<br>
        Должность: $job<br>
        Дата рождения: $dateofbirth<br>
        Город проживания: $city<br>
        Тема доклада: $theme<br>
        Ученая степень: $degree";

        $mail->send();
        echo "
        <script>
            alert('Ваша заявка принята!');
            document.location.href = 'Conference.php';
        </script>
        ";
}

?>

<div class="forms">
    <form method="post" id="RoundForm">
        <h1>Заявка на конференцию</h1>
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