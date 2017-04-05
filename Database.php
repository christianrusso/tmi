<?php
class Database {

    private $link;
    private $host, $username, $password, $database;

    public function __construct(){
        /*$this->host        = "192.168.0.195";
        $this->username    = "chrisrusso";
        $this->password    = "1682951";
        $this->database    = "tmi";*/
        $this->host        = "localhost";
        $this->username    = "root";
        $this->password    = "1682951";
        $this->database    = "tuminutoimporta";


        $this->link = mysqli_connect($this->host, $this->username, $this->password, $this->database);

        // Check connection
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        if (!mysqli_set_charset($this->link, "utf8")) {
            printf("Error cargando el conjunto de caracteres utf8: %s\n", mysqli_error($this->link));
            exit();
        }

        return true;
    }

    public function query($query) {
        $query = $this->link->real_escape_string($query);
        $result = mysqli_query($this->link, $query); 
        if (!$result)
            die('Invalid query: ' . mysqli_error($this->link));

        return $result;
    }

    public function real_escape_string($string)
    {
        return $this->link->real_escape_string($string);
    }

    public function __destruct() {
        mysqli_close($this->link)
            OR die("There was a problem disconnecting from the database.");
    }
}
?>