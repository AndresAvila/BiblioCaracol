<?php
	set_include_path( get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'] );

	require("_/inc/functions.php");

	//Constants
	define("FROM_EMAIL", "ccc.i2d.in <webform@ccc.i2d.in>");
	
	//Setup Variable for tracking VirtualPageViews in analytics.
	$VirtualPageView = "";

	//Variables to store Site/URL information
	$ServerName = $_SERVER['SERVER_NAME'];
	$SiteSection = "";
	$SubSection = "";

	$RequestMethod = $_SERVER['REQUEST_METHOD'];
	$FormErrors = array();

	setSectionInfo();

	//SET SERVER SPECIFIC VARIABLES AND CONSTANTS
	require_once("_/inc/localVars.php");

	// Create connection
	$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);
	$db->set_charset("utf8");

	// Check connection
	if ($db->connect_error) {
    	die("Connection failed: " . $db->connect_error);
	}
	session_start();
	
	//Other vars
	$tiempoRenta = new DateInterval('P1W');
?>
