<?php
// Will  handler  sending  mail with  stats
//No  graphic  interface
//set  vars  from ajax  to PHP


//echo "go";
$emailP=$_GET['emailPH'];
$scoreP=$_GET['scorePH'];
//echo $scoreP;
//echo $emailP;
$cc=1;



// Start PhpMAiler ******************************************************
require_once("libraries/PHPMailer-master/class.phpmailer.php"); // Class

//if(isset($_POST['mailSendPhpMail'])) { //press  the  button 

                                    
//echo "1";
                       
                        $phpMailTo=$emailP; //to
                        $phpMailTheme="Your  Waze Performance"; //theme
                        $phpMailBody="<pre>Dear Wazer,</br>today you have proceded Your Waze Performance with ".$scoreP."% .</br>Good luck </pre>";   //body
                        $phpMailFromEmail="waze@ukr.net";   //from e-email
                        $phpMailFromName="Admin";
                        //if(isset($_POST['fromPhpMailname'])) {$phpMailFromName=$_POST['fromPhpMailname'];}  else {$phpMailFromName='User';}    //from name if  initial is  empty





    $mail = new PHPMailer(); 
    $mail->From = $phpMailFromEmail; //From  who 
    $mail->FromName = $phpMailFromName;//Wrom  who  name
    $mail->AddAddress($phpMailTo);  // to  whome  //($phpMailTo, "/*name*/");
    $mail->CharSet = 'UTF-8'; // 
         
          //start  attachment
          /* if (isset($_FILES['filePhpMail']) &&
    $_FILES['filePhpMail']['error'] == UPLOAD_ERR_OK) {
    $mail->AddAttachment($_FILES['filePhpMail']['tmp_name'],
                         $_FILES['filePhpMail']['name']);
                                                         }*/
         //end  attachment
              
    ///$mail->AddAttachment("file_adress", 'file_name'); // attach  file  if  required
    $mail->IsHTML(true); // setting HTML  flag
    $mail->Subject = $phpMailTheme;
    $mail->Body = $phpMailBody;
    //sending;
if(!$mail->Send()){
  echo "Message was not sent";
  echo "Mailer Error: " . $mailer->ErrorInfo;
} else {echo"<center><p id='phpMailerTextDestroyer'>Message  is  send</p></center>";}
//


//Recording all inputs //If  planted inside  the  mail function-Do not  work;
  //include("Classes/RecordTxt.php");
 // RecordTxt::RecordAnyInput(array($emailP,$scoreP), 'recordText/phpmailer.txt');// Record  to  text;


//} //  end  isset($_POST['mailSendPhpMail']))
// End  PhpMAiler--------------------------------------------


?>