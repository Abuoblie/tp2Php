<?php include_once "header.php"; ?>
<h1>welcome</h1>
<section>
  <form action="AddCredit.php" method="POST">
    <?php
    if(isset($_POST['submit'])) {
       $credit =new Process();
        $regex = "/^[\w\s]+$/";
        if (preg_match($regex, $_POST['Organization']) && preg_match($regex, $_POST['Amount'])) {
          $Organization = htmlentities(filter_var($_POST['Organization'], FILTER_SANITIZE_STRING));
          $Amount = htmlentities(filter_var($_POST['Amount'], FILTER_SANITIZE_NUMBER_FLOAT));
          $credit-> addCredit($Organization,$Amount,$_POST['idclient'] );
        } 
        else {
          echo " malice element identified";
        }
      } 
      else {
        echo "data not yet submitted";
      }
     
  
    ?>

    <fieldset>
      <legend>user info</legend>
      <p><input type="text" name="Organization" placeholder="Organization" required="required"></p>
      <p><input type="number" name="Amount" placeholder="Amount" required="required"></p>
      <p><input type="number" name="idclient" placeholder="idclient" required="required"></p>
      <p><button type=" submit" class="btn btn-primary" class="btn" name="submit">Add credit</button></p>
    </fieldset>
  </form>
</section>



<?php
include_once "footer.php";
?>