<?php
if (($_SERVER['REQUEST_METHOD'] == 'POST') && (!empty($_POST['action']))):

	//Nos aseguramo que si alguna variable que recibimos por el formulario viene vacía se le asigne un string vacío como valor.
	if (isset($_POST['myname'])) { $myname = $_POST['myname'] ?? ''; }
	if (isset($_POST['mypassword'])) { $mypassword = $_POST['mypassword'] ?? ''; }
	if (isset($_POST['mypasswordconf'])) { $mypasswordconf = $_POST['mypasswordconf'] ?? ''; }
	if (isset($_POST['mycomments'])) {
			$mycomments = filter_var($_POST['mycomments'], FILTER_SANITIZE_STRING ) ?? '';
	}
	if (isset($_POST['reference'])) { $reference = $_POST['reference']; }
	//En este caso como viene un array, si no está lo que hacemos es asignarle un array vacío.
	if (isset($_POST['favoritemusic'])) { $favoritemusic = $_POST['favoritemusic'] ?? array(); }
	if (isset($_POST['requesttype'])) { $requesttype = $_POST['requesttype'] ?? ''; }
	if (isset($_POST['ajaxrequest'])) { $ajaxrequest = $_POST['ajaxrequest'] ?? ''; }

	$formerrors = false;

	if ($myname === '') :
		$err_myname = '<div class="error">Sorry, your name is a required field</div>';
		$formerrors = true;
	endif; // input field empty

	if (strlen($mypassword) <= 6):
		$err_passlength = '<div class="error">Sorry, the password must be at least six characters</div>';
		if ( $ajaxrequest ) { echo "<script>$('#mypassword').after('<div class=\"error\">Sorry, the password must be at least six characters</div>');</script>"; }
		$formerrors = true;
	endif; //password not long enough


	if ($mypassword !== $mypasswordconf) :
		$err_mypassconf = '<div class="error">Sorry, passwords must match</div>';
		if ( $ajaxrequest ) { echo "<script>$('#mypasswordconf').after('<div class=\"error\">Sorry, passwords must match</div>');</script>"; }
		$formerrors = true;
	endif; //passwords don't match


	if ( !(preg_match('/[A-Za-z]+, [A-Za-z]+/', $myname)) ) :
		$err_patternmatch = '<div class="error">Sorry, the name must be in the format: Last, First</div>';
		$formerrors = true;
	endif; // pattern doesn't match

	//Lo primero que hacemos es crear una SALT. Esto se hace para qeu en el caso que dos contraseñas sean iguales,
	// no aparezcan en la base de datos con el mismo hash en caso de hackeo. Para eso añadimos algo que sea diferente
	// cada vez y así complica más la labor de desencriptado de esta contraseña. La idea en este caso es coger un
	// timestamp de la fecha actual
	//Definimos la timezone
	date_default_timezone_set('US/Eastern');
	//Creamos una variable con el tiempo actual
	$currentTime = time();
	//Este valor también hay que guardarlo en la base de datos para tenerlo a la hora de decodificar la password.
	$datefordb = date('Y-m-d H:i:s', $currentTime);
	//Convertimos este valor en hexadecimal para complicarlo un poco más. y lo añadimos a la contraseña
	$salty = dechex($currentTime) . $mypassword;
	//Hasheamos lo anterior y será el valor que se mande a la base de datos como contraseña
	$salted = hash('sha1', $salty);


  $formdata = array (
    'myname' => $myname,
    'mypassword' => $mypassword,
    'mypasswordconf' => $mypasswordconf,
    'mycomments' => $mycomments,
    'reference' => $reference,
    'favoritemusic' => $favoritemusic,
    'requesttype' => $requesttype
  );

	if (!($formerrors)) :
		include("db_credentials.php");

		$forminfolink = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		$forminfoquery = "INSERT INTO form_info (
		  forminfo_id,
		  forminfo_ts,
		  myname,
		  mypassword,
		  mycomments,
		  reference,
		  favoritemusic,
		  requesttype
		) 
		VALUES (
		  '',
		  '".$datefordb."',
		  '".$myname."',
		  '".$salted."',
		  '".$mycomments."',
		  '".$reference."',
		  '".implode(', ', $favoritemusic)."',
		  '".$requesttype."'
		)";

		if ($forminforesult = mysqli_query($forminfolink, $forminfoquery)):
			$msg = "Your form data has been processed. Thanks.";
			if ( $ajaxrequest ):
				echo "<script>$('#myform').before('<div id=\"formmessage\"><p>",$msg,"</p></div>'); $('#myform').hide();</script>";
			endif; // ajaxrequest
		else:
			$msg = "Problem with database";
			if ( $ajaxrequest ):
				echo "<script>$('#myform').before('<div id=\"formmessage\"><p>",$msg,"</p></div>'); $('#myform').hide();</script>";
			endif; // ajaxrequest
		endif; //write to database

		mysqli_close($forminfolink);

	endif; // check for form errors

endif; //form submitted
?>
