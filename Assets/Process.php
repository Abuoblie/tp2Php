<?php 
include_once "Connection.php";

class process extends dbh {
        

      public function addClient($Lastname, $Firstname, $DateofBirth, $Address, $PostalCode, $Telephone, $idStatus)
      {
              $sql= "INSERT INTO client(Lastname, Firstname, DateofBirth, Address, PostalCode, Telephone, idStatus)
                                 values(?,?,?,?,?,?,?)";
              $stmt = $this->connect()->prepare($sql);
              $stmt->execute([$Lastname, $Firstname, $DateofBirth, $Address, $PostalCode, $Telephone, $idStatus]);
                            
      }

      public function addCredit($Organization, $Amount, $idclient)
      {
                $sql= "INSERT INTO credit(Organization,	Amount,	idclient)
                values(?,?,?)";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$Organization, $Amount, $idclient]);
      }


      public function getClient($condition, $values)
      {
            $sql = "SELECT * FROM client a join maritalstatus b on b.idStatus = a.idStatus WHERE $condition =?";
            $stmt = $this->connect()->prepare($sql);
            $stmt ->execute([$values]);
            $result = $stmt->fetchAll();
            return $result;
      }

      public function getDetail($condition, $values)
      {
        $sql = "SELECT * FROM credit c join client a on c.idclient = a.idclient join maritalstatus b on b.idStatus = a.idStatus WHERE $condition =?";
        $stmt = $this->connect()->prepare($sql);
        $stmt ->execute([$values]);
        $result = $stmt->fetchAll(); 
        return $result;           
      }

      
}


