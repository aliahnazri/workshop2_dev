<?php 
include '../connect.php';
$id = $_GET["id"];
$status = $_GET["status"];
$email = $_GET["email"];

if($status == "approve"){
	$query = "UPDATE restaurant SET status = 'APPROVED' WHERE rest_id = '".$id."'";
    $result =mysqli_query($con,$query);
    if($result == TRUE){
    	echo ("<script LANGUAGE='JavaScript'>
		    window.alert('Succesfully Approved');
		    window.location.href='res_appr.php';
		    </script>");
    }
    else{
    	echo "Unsuccess";
    }
}
else if($status == "delete"){

    require_once ('PHPMailer-master/PHPMailerAutoload.php');
    $mail = new PHPMailer();
    $mail ->IsSmtp();
    $mail ->SMTPDebug = 0;
    $mail ->SMTPAuth = true;
    $mail ->SMTPSecure = 'ssl';
    $mail ->Host = "smtp.gmail.com";
    $mail ->Port = 465; // or 587
    $mail ->IsHTML(true);
    $mail ->Username = "aliahnazri00@gmail.com";
    $mail ->Password = "snow girl";
    $mail ->SetFrom($email);
    $mail ->Subject = "Rejection of restaurant at Tapaulah";
    $mail ->Body ="Sorry your restaurant is rejected due to some factors";
    $mail ->AddAddress($email);

    if(!$mail->Send()){
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else{
        $query = "DELETE FROM restaurant WHERE rest_id = '".$id."'";
        $result =mysqli_query($con,$query);
        if($result == TRUE){
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Succesfully Rejected!');
                window.location.href='res_appr.php';
                </script>");
        }
        else{
            echo "Unsuccess";
        }
    }
}
?>