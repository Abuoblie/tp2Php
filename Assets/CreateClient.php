<?php include_once "header.php"; ?>
<h1>welcome</h1>
<section>
  <form action="CreateClient.php" method="POST">
    <?php
    $client = new process();
    if (isset($_POST['submit'])) {
      $regex = "/^[\w\s]+$/";
      if (preg_match($regex, $_POST['Firstname']) && preg_match($regex, $_POST['Lastname']) && preg_match($regex, $_POST['Address'])   && preg_match($regex, $_POST['PostaleCode']) && preg_match($regex, $_POST['Telephone'])) {
        $Firstname = htmlentities(filter_var($_POST['Firstname'], FILTER_SANITIZE_STRING));
        $Lastname = htmlentities(filter_var($_POST['Lastname'], FILTER_SANITIZE_STRING));
        $Address = htmlentities(filter_var($_POST['Address'], FILTER_SANITIZE_STRING));
        $PostaleCode  = htmlentities(filter_var($_POST['PostaleCode'], FILTER_SANITIZE_STRING));
        $Telephone = htmlentities(filter_var($_POST['Telephone'], FILTER_SANITIZE_STRING));
        
        $client->addClient($Lastname, $Firstname, $_POST['Dateofbirth'], $Address, $PostaleCode, $Telephone, $_POST['idStatus']);
        exit();
      } 
      else {
        echo " malice element identified";
      }
    } else {
      echo "data not yet submitted";
    }
    ?>
    <fieldset>
      <legend>user info</legend>
      <p><input type="text" name="Firstname" placeholder="Firstname" required="required"></p>
      <p><input type="text" name="Lastname" placeholder="Lastname" required="required"></p>
      <p><input type="date" name="Dateofbirth" placeholder="DateOfbirth" required="required"></p>
      <p><input type="text" name="Address" placeholder="Address" required="required"></p>
      <p><input type="text" name="PostaleCode" placeholder="PostaleCode" required="required"></p>
      <p><input type="telephone" name="Telephone" placeholder="TelephoneNumber" required="required"></p>
      <p><label>Célibataire</label><input type="radio" name="idStatus"  required="required" value="1">
       <label> Concubinage</label><input type="radio" name="idStatus" value="2">
       <label> Divorcé</label><input type="radio" name="idStatus" value="3">
       <label> Marié Veuf</label><input type="radio" name="idStatuse" value="4""></p>
                      <p><button type=" submit" class="btn btn-primary" class="btn" name="submit">create</button></p>
    </fieldset>
  </form>
</section>


<?php 
   include_once "footer.php"; 
?>
