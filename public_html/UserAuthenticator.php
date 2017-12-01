<?php
/*Katelyn Boone
October 13, 2017
CSC 390 - Web Programming
Project 4 – Database Interaction and AJAX
*/
session_start();
class UserAuthenticator{
    public function isLoggedIn()
    {
        if($_SESSION['loggedin']!=NULL && $_SESSION['loggedin']==true)
        {
            return true;
        }
        else if($_SESSION['username'] == " "|| $_SESSION['loggedin']==NULL)
        {
            return false;
        } 
    }

    public function authenticate($username, $password)
    {
        $user = "root";
		$pass = "";
        $dbh = new PDO('mysql:host=localhost; dbname=capstone', $user, $pass);
        
		if($dbh==false)
		{
            die("Unable to connect to database.");
            return false;
		}
        $sql = "SELECT Password, Username FROM Users WHERE Username = :Username AND Password = :Password";
        
        $query = $dbh->prepare($sql);
        $query->bindValue(':Password', $password);
        $query->bindValue(':Username', $username);

        $success=$query->execute();

		$row = $query->fetch(PDO::FETCH_ASSOC);

        if($row === false) {
            echo "<script type='text/javascript'>alert('Login is Invalid');</script>";
            return false;
        }
        else if($row !== false)
        {
            $_SESSION['loggedin']=true;
            return true;
        }

    }
    
    public function logUserIn($username)
    {
            $_SESSION['username'] = $username;
             
    }

    public function logout()
    {
        session_unset();
        session_destroy();
    }

    public function redirectToLogin()
    {
		header("location: login.php");
    }
}
?>