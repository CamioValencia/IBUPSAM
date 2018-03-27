<?php
 
 class Database extends PDO{
	 public function __construct () {
	

		parent::__construct('mysql:host=localhost;dbname=mydb','root''');
		parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 }
	 
	 
	 
 }





