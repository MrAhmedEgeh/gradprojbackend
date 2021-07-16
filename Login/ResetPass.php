<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

include '../dbConnect.php';

//$_POST['email'] = 'mrxb114@gmail.com';

if(isset($_POST['email'])){
    $email = $_POST['email'];

    $query = "SELECT * FROM players WHERE email =  '$email'";
    $checkresult = mysqli_query($conn, $query);
    $checkrowcount=mysqli_num_rows($checkresult);

    if($checkrowcount > 0){
        while($rows = $checkresult->fetch_assoc()){
            $username = $rows['username'];
            $password = $rows['password'];
            $email = $rows['email'];
        }
        sendInfoToEmail($username, $password, $email);
    }else{
        echo 'Email was not found';
    }
}

function sendInfoToEmail($myusername, $mypass, $myemail) {

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'kingpower114@gmail.com';                    //SMTP username
    $mail->Password   = 'Ahmedabdulrazakegeh';                           //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('no-reply@mygame.org', 'Mailer');
    $mail->addAddress($myemail);     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Game Credentials';
    $mail->Body    = 'Username: '.$myusername.'  '.'Password: '.$mypass.'<br>'.' Happy gaming ';


    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
} 