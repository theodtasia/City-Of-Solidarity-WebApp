<?php session_start();
require('connection.php'); 
$username=$_SESSION['username'];
$lang=$_SESSION["lang"];
//ανάθεση μεταβλητών από το POST 

	
	if (isset($_POST['send']))
	{
		$name = $message='';
		$name = $_POST['name'];
		$message = $_POST['message'];
        $sql1="SELECT * FROM usertable WHERE username='$username';";
        $res1=mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_array($res1);
        $id=$row1['id'];
	}
//έλεγχος για σφάλματα
    if ($name === ''){
        echo "Το όνομα δεν μπορεί να είναι κενό.";
        die();
        }
  
        
    if ($message === ''){
        echo "Το μήνυμα δεν μπορεί να είναι κενό.";
        die();
        }  
//αποστολή στη βάση
   $sql = "INSERT INTO org_action (orgID, date, username, name,  message)  VALUES ('$id','$date','$username','$name','$message')";
    $res=mysqli_query($conn, $sql);

if($res)
{//μήνυμα επιτυχίας
        if($lang == 'gr')
        {
	     $_SESSION['action'] = 1;
		  header('Location:actionsGR.php');   
		}
	    else
		{
			$_SESSION['action'] = 1;
		    header('Location:actionsEN.php');   
		}
	   
}
else
	{ 
	  if($lang == 'gr')   
	   {
	     $_SESSION['action'] = 2;
		  header('Location:actionsGR.php');   
		}
	    else
		{
			$_SESSION['action'] = 2;
		    header('Location:actionsEN.php');   
		}
	}   
	   

?>