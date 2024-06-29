<?php
  include("../include/connect.php");

  if(isset($_POST["marka_beillesztes"])){
      $marka_nev = $_POST["marka_nev"];      
      $select_query = "SELECT * FROM `markak` WHERE marka_nev='$marka_nev'";
      $result_select = mysqli_query($conn, $select_query);
      $number = mysqli_num_rows($result_select);
      
      if($number > 0){
          echo "<script>alert('A márka már létezik.')</script>";
      }
      else{
          $insert_query = "INSERT INTO `markak` (marka_nev) VALUES ('$marka_nev')";
          $result = mysqli_query($conn, $insert_query);
          
          if($result){
              echo "<script>alert('A márka sikeresen hozzáadva')</script>";
          }
      }
  }

?>

<h2 class="text-center">Márkák hozzáadása</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <input type="text" class="form-control" name="marka_nev" placeholder="Márka beillesztése" aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group w-10 mb-5 m-auto">                                                 
    <input type="submit" value="Hozzáadás" class="bg-dark my-3 px-3 text-light" name ="marka_beillesztes">   
  </div>
</form>