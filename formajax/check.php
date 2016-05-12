<?php
	if(isset($_POST['check'])) {
		$username = $_POST['check'];
		if($username == 'abc12345') {
			return true;
		}
		return false;
	}