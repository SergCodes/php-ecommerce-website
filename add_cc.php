<?php
session_start();
$errors = array();
    function filter($date)
    {
        return trim(htmlspecialchars($date));
    }

	include('functions/functions.php');

    $cc_name = filter($_POST['cc_name']);
    $cc_number = filter($_POST['cc_number']);
    $cc_exp_date = filter($_POST['cc_exp_date']);
    $cc_sec_code = filter($_POST['cc_sec_code']);
    $id = $_POST['ccID'];
	$userid = $_SESSION['SESS_USERID'];
	
	if(isset($_SESSION['SESS_USERID'])) {
		if(!empty ($cc_name))
		{
			$query = mysqli_query($con, "UPDATE credit_cards SET cc_name = '$cc_name' WHERE cc_ID=$id");
		}
		if(!empty ($cc_number))
		{
			$query = mysqli_query($con, "UPDATE credit_cards SET cc_number = '$cc_number' WHERE cc_ID=$id");
		}
		if(!empty ($cc_exp_date))
		{
			$query = mysqli_query($con, "UPDATE credit_cards SET exp_date = '$cc_exp_date' WHERE cc_ID=$id");
		}
		if(!empty ($cc_sec_code))
		{
			$query = mysqli_query($con, "UPDATE credit_cards SET sec_code = '$cc_sec_code' WHERE cc_ID=$id");
		}
	}
	header('Location: creditCardManager.php');
?>