<?php

require 'db_conn.php';

   

class person  
{
	public $name ;
	public $email;
	private $password ;
	public $phone;

	function setpass($pass)
	{
		$this->password = $pass;
	}

	function login($usermail,$userpass)
	{
        $connect = mysqli_connect("localhost","root","","first");
    if(mysqli_connect_errno())
    {
        die("error happend". mysqli_error());                
    }
		$query ='select * from users where email = "'.$usermail.'"and password = "'.$userpass.'"'; 
        $result = mysqli_query($connect, $query);
        
        if($row = mysqli_fetch_assoc($result))
        {
            $this->email = $row['email'];
            $this->password = $row['password'];
            $this->name = $row['name'];
            return 1;
        }
        else
        {    
            return 0;
        }
	}
}




class user extends person
{
    public $credit;
    public $offers = array();
}








