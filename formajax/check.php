<?php
	if (isset($_GET["check"])) {
		$username = $_GET["check"];
		if($username == 'abc12345') {
			echo "true";
		}
		else
		{
			echo "false";
		}
	}