<?php

class User_login extends My_Model{
	const DB_TABLE = "user_login";
	const DB_TABLE_PK = 2;			// this value will be set from the session data collected in the session table
	const DB_PK_NAME = "login_id";
}


?>