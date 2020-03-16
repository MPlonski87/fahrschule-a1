<?php
	if (isset($_POST['submitKontaktformular']))
	{
		
		session_start();
		$zahl1 = $_POST['zahl1'];
		$zahl2 = $_POST['zahl2'];
		$ergebnis = $zahl1 + $zahl2;
		$ergebnisEingabe = $_POST['ergebnis'];
		
		if($ergebnis == $ergebnisEingabe)
		{
			$empfaengerEmail = 'info@fahrschule-a1.de';

			$absender = $_POST['absender'];
			$absenderEmail = $_POST['absenderEmail'];
			$nachricht = $_POST['nachricht'];
			
			$subject = "Fahrschule A1 Website (Kontaktmail) ";
			$reply = $empfaengerEmail;								
			
			$message = "<p style='color: grey;'>" .
						"<b>Absender</b><br>" . $absender . "<br><br>" .
						"<b>E-Mail</b><br>" . $absenderEmail . "<br><br>" .
						"<b>Nachricht</b><br>" . $nachricht . "<br><br>" . "</p>";

			$headers .= 'From:' . $absenderEmail . "\n";
			$headers .= 'Reply-To:' . $reply . "\n"; 
			$headers .= 'X-Mailer: PHP/' . phpversion() . "\n"; 
			$headers .= 'X-Sender-IP: ' . $REMOTE_ADDR . "\n"; 
			$headers .= "Mime-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=utf-8";
			
			mail($empfaengerEmail, $subject, $message, $headers);
			echo "<i class='fa fa-check-square-o fa-2x'></i> <p style='color: #92c021;'>" . "E-Mail erfolgreich versandt." . "</p>";				
		} else {
			echo "<p style='color: red;'>" . "Eingabe fehlerhaft. E-Mail nicht versandt." . "</p>";				
		}
	}
?>