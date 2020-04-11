<?php 
	session_start();

	// variable declaration
	$username = "";
	$email = "";
	$password = "";
	$errors = array(); 
	$_SESSION['success'] = "";



	$host = "studmysql01.fhict.local";
	$username = "dbi435688";
	$password = "webhosting54";
	$db = "dbi435688";

	
		// connect to database
	$db =  new PDO( "mysql:host=$host;dbname=$db", $username, $password);
	//$db = mysqli_connect('localhost', 'root', '', 'registration');

	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if(isset($_GET['email'])){
		$email = $_GET['email'];
	}
	
	// $email    = $_POST["email"];
	// change password USER
	if (isset($_POST['changePassword']))
	 {
		 
		 try{

		//Getting the inputs thorugh post method
		$emailToChange = $_POST["emailToChange"];	
	    $NewPassword = $_POST["New_Password"];
		$R_New_Password = $_POST["Repeat_New_Password"];
		

		$password = md5($R_New_Password);//encrypt the password before saving in the database
		$sql =  "UPDATE person SET password =:R_New_Password WHERE email = :emailToChange" ;
		$stmt = $db->prepare($sql); 
		$stmt->bindParam(':emailToChange', $emailToChange);
		$stmt->bindParam(':R_New_Password', $R_New_Password);
		$stmt->execute();
		header('location: login.php');
		 }
		catch(PDOException $e)
		{
		echo $sql . "<br>" . $e->getMessage();
		}
	}
	

	// LOGIN USER
	if (isset($_POST['login_user'])) 
	{
	 $email = $_POST["email"];
	 $role = "Employee";
	 $password_login = $_POST["password_login"];

		if (empty($email)) {
			array_push($errors, "Username is required"); //Adding the error to the errors so that It wont be possible to login with an empty username and password
		}
		if (empty($password_login)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
		
			$sql = "SELECT * FROM person WHERE email=:email AND password= :password_login AND role= :givenRole";
			$stmt = $db->prepare($sql);
			$stmt->execute(

				array(
					'givenRole' => "Employee",
					'email' => $email,
					'password_login' =>  $password_login	
				)
				
			);
			$count = $stmt->rowCount();
			if($count > 0 ){
				
				echo '<script>
				alert("Youre logged in")
				</script>';

			}
			else
			{
				echo '<script>
				alert("Password/Username is wrong")
				</script>';
			}
		}
	}

	if (isset($_POST['SendMail'])) 
	{
	require 'mail\PHPMailer-master\PHPMailerAutoload.php';
	$emailTo=$_POST["emailToUse"];
	$body = "<!DOCTYPE html>
	<html lang='en'>
	<head>
		<meta charset='UTF-8'>
		<meta name='viewport'content='width=device-width, initial-scale=1.0'>
		<title>Document</title>
	</head>
	<body>
		<div class = 'Wrapper'>
		
		<p>	
			Hello there,
			
			Please click on the link to reset your password.
			<a href='http://localhost/r2da-project-website/changePassword.php?email=".$emailTo."'</a>
		Reset your password
		
		</p>	
		</div>
	</body>
	</html>";

	//find current working directory/rootfolder




	$sql = "SELECT * FROM person WHERE email=:emailTo AND role= :givenRole";
	
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':emailTo', $emailTo);
	$stmt->bindParam(':givenRole', "Employee");
	$mail = new PHPMailer();
	  
	  //Enable SMTP debugging.
	  $mail->SMTPDebug = 1;
	  //Set PHPMailer to use SMTP.
	  $mail->isSMTP();
	  //Set SMTP host name
	  $mail->Host = "smtp.gmail.com";
	  $mail->SMTPOptions = array(
						'ssl' => array(
							'verify_peer' => false,
							'verify_peer_name' => false,
							'allow_self_signed' => true
						)
					);
	  //Set this to true if SMTP host requires authentication to send email
	  $mail->SMTPAuth = TRUE;
	  //Provide username and password
	  $mail->Username = "mediabazaar2@gmail.com";
	  $mail->Password = "Sendcode43";
	  //If SMTP requires TLS encryption then set it
	  $mail->SMTPSecure = "false";
	  $mail->Port = 587;
	  //Set TCP port to connect to
	  
	  $mail->From = "mediabazaar2@gmail.com";
	  $mail->FromName = "Media Bazaar";
	  
	  $mail->addAddress("Anaswarraich72@gmail.com");
	
	  $mail->Subject = "test mail";
	  $mail->Body = $body;
	
	  if($mail->send())
	  {
		  echo '<script>
		alert("email sent")
		</script>';
	}
		
	 

}
?>
<!-- if (isset($_POST['SendMail'])) 
{

	require 'mail\PHPMailer-master\PHPMailerAutoload.php';
	$emailID=$_POST["emailToGetMail"];
	// $email = $emailID;
	$linkToResetPassword = 'localhost/r2da-project-website\forgotPassword.php';
	$body = '<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
	</head>
	<body>
		<div class = "Wrapper">
		
		<p>	
			Hello there,
			
			Please click on the link to reset your password.
			<a href="http://localhost/r2da-project-website/changePassword.php?email="<?php echo $emailID ?> </a>
		Reset your password
		</p>	
		</div>
	</body>
	</html>'";
	$sql = "SELECT * FROM person WHERE email=:emailID AND role= 'Employee'";
	$stmt = $db->prepare($sql);
	$mail = new PHPMailer();
	  
	  //Enable SMTP debugging.
	  $mail->SMTPDebug = 1;
	  //Set PHPMailer to use SMTP.
	  $mail->isSMTP();
	  //Set SMTP host name
	  $mail->Host = "smtp.gmail.com";
	  $mail->SMTPOptions = array(
						'ssl' => array(
							'verify_peer' => false,
							'verify_peer_name' => false,
							'allow_self_signed' => true
						)
					);
	  //Set this to true if SMTP host requires authentication to send email
	  $mail->SMTPAuth = TRUE;
	  //Provide username and password
	  $mail->Username = "mediabazaar2@gmail.com";
	  $mail->Password = "Sendcode43";
	  //If SMTP requires TLS encryption then set it
	  $mail->SMTPSecure = "false";
	  $mail->Port = 587;
	  //Set TCP port to connect to
	  
	  $mail->From = "mediabazaar2@gmail.com";
	  $mail->FromName = "Media Bazaar";
	  
	  $mail->addAddress("Anaswarraich72@gmail.com");
	  
	  $mail->isHTML(true);
	 
	  $mail->Subject = "test mail";
	  $mail->Body = "<i>this is your password:</i>".$body;
	  $mail->AltBody = "This is the plain text version of the email content";
	  if($mail->send())
	  {
		echo "Message has been sent successfully";  
	  }
	  else
	  {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	  } -->

<!-- }
?> -->