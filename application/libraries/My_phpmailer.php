<?php
	require_once('PHPMailer/PHPMailerAutoload.php');
	
	class My_PHPMailer extends PHPMailer{
		public function __construct(){
			parent::__construct();
		}
	}
?>
