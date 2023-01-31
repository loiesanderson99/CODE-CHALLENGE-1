<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    require 'database.php';

    if(isset($_POST["inputSend"])) 
    {

        $email = $_POST["inputEmail"];
        $subject = $_POST["inputSubject"];
        $message = $_POST["inputMessage"];

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'loiesanderson9@gmail.com'; // email of the sender
        $mail->Password = '.......';   // password email of the sender (using 2-Step Verification)
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('loiesanderson9@gmail.com'); // email of the sender
        $mail->addAddress($email);
        $mail->isHTML(true);

        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();

        $query = "INSERT INTO sended (email, subject, message) VALUES ('$email', '$subject', '$message')";
        if (mysqli_query($conn, $query)) {
            echo "Success";
        } else {
            echo "Error : " . ysqli_error($conn);
        }

        header('Location: index.php?success');
    }

?>