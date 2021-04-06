<?php 
class dbh{
        private $hostServer;
        private $dbname;
        private $password;
        private $user;
        private $charset;

        public function connect()
        {       
                $this->hostServer = "localhost";
                $this->dbname = "tp2";
                $this->password = "";
                $this->user = "root";
                $this->charset = "utf8mb4";
                
               
               try {
                      $dsn = "mysql:host=".$this->hostServer.";dbname=".$this->dbname.";charset =".$this->charset;
                      $pdo = new PDO($dsn, $this->user, $this->password);
                      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                      return $pdo;
               } catch (Exception $e) {
                       echo "connection failed".$e->getMessage();
               }
        }
 

        
}
