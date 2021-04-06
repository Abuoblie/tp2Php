<?php require_once "header.php"; ?>
<table class="table">
         <thead class="thead-dark">
              <tr>							
                 <th cope="col">Firstname</th>
                 <th scope="col">Lastname</th>
                 <th scope="col">DateofBirth</th>
                 <th scope="col">Address</th>
                 <th scope="col">PostaleCode</th>
                 <th scope="col">Telephone</th>
                 <th scope="col">	Status</th>
                 
              </tr>
              
              
         <?php
               $client = new Process();
               $data = $client->getClient(1, 1);
               $viewData;
       
               if (!isset($_POST['submit']) || $_POST['client'] == 'All' || empty($_POST['client'])) {
            
                   $viewData = $data;
               }
               else {
       
                   $viewData = $client->getClient('idclient',$_POST['client']);
               
               }
       
               foreach ($viewData as $row) {
                   echo "<tr>
                              <td>{$row['Firstname']}</td>
                              <td>{$row['Lastname']}</td>
                              <td>{$row['DateofBirth']}</td>
                              <td>{$row['Address']}</td>
                              <td>{$row['PostalCode']}</td>
                              <td>{$row['Telephone']}</td>
                              <td>{$row['Status']}</td>
                           </tr>";
               }

        ?>



    </thead>
</table>

<form action="Clients.php" method="post">
    <input list="browsers" name="client" id="client" >

    <datalist id="browsers">
        <?php 
           
            foreach ($data as $row) {
                echo "<option value='{$row['idclient']}'>";
            }
        ?>
        <option value="All">
    </datalist>

    <input type="submit" value="submit" name="submit">
</form>
              
             

<?php require_once "footer.php"; ?>