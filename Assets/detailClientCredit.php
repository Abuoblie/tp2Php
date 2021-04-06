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
            <th scope="col">Status</th>
            <th scope="col">Organization</th>
            <th scope="col">Amount</th>
            <th scope="col">idCredit</th>
        </tr>

        <?php
        $client = new Process();
        $data = $client->getDetail(1, 1);
        $viewData;

        if (!isset($_POST['submit']) || $_POST['client'] == 'All' || empty($_POST['client'])) {
            
            $viewData = $data;
        }
        else {

            $viewData = $client->getDetail('idCredit',$_POST['client']);
        
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
                              <td>{$row['Organization']}</td>
                              <td>{$row['Amount']}</td>
                              <td>{$row['idCredit']}</td>
                          </tr>";
        }

        ?>



    </thead>
</table>
<form action="detailClientCredit.php" method="post">
    <input list="browsers" name="client" id="client" >

    <datalist id="browsers">
        <?php 
           
            foreach ($data as $row) {
                echo "<option value='{$row['idCredit']}'>";
            }
        ?>
        <option value="All">
    </datalist>

    <input type="submit" value="submit" name="submit">
</form>
<?php require_once "footer.php"; ?>