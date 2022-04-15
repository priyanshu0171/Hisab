<?php
// Creating a class for handling dataabase requests
class DatabaseHandler
{
    /*
Database Handeler class Creates a connection and returns a variable conn.
*/
    // Private variables for storing data
    private $servername;
    private $username;
    private $password;
    private $database;

    // Creating connect method 
    protected function connect()
    {
        // Un comment on local Server
        $this->servername = "localhost";
        $this->username = 'root';
        $this->password = '';
        $this->database = 'hisab';

        // Uncomment on Original Server
        // $this -> servername = "sql113.epizy.com";
        // $this -> username = 'epiz_30586005';
        // $this -> password = 'DgUT7Zh40G9Ok';
        // $this -> database = 'epiz_30586005_hisab';

        // Creating connection to the data base usning OOPS
        try {
            $conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
            return $conn;
        } catch (Exception $e) {
            echo "<strong><p> Internal Server Error </p></strong>";
            exit(0);
        }
        
    }
}
