<?php
	session_start();
		if ((!isset($_SESSION['validat']))||($_SESSION['validat']!=1)) {
			header('location: ../home.html');

		}
