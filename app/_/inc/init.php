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
	switch ($ServerName) {
		case 'ccc':
			define("CONTACT_EMAIL", "");
			define("ANALYTICS_ID", "");
			define("DB_HOST", "localhost");
			define("DB_USER", "ccc");
			define("DB_PASS", "devccc");
			define("DB_SCHEMA", "BiblioCaracol");
			break;
		
		case 'ccc.i2d.in':
			define("CONTACT_EMAIL", "");
			define("ANALYTICS_ID", "");
			break;
	}

	// Create connection
	$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

	// Check connection
	if ($db->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}

?>
