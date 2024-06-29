<?php
  include("../include/connect.php");

  if(isset($_POST["kategoria_beillesztes"])){
      $kategoria_nev = $_POST["kategoria_nev"];      
      $select_query = "SELECT * FROM `kategoriak` WHERE kategoria_nev='$kategoria_nev'";
      $result_select = mysqli_query($conn, $select_query);
      $number = mysqli_num_rows($result_select);
      
      if($number > 0){
          echo "<script>alert('A kategória már létezik.')</script>";
      }
      else{
          $insert_query = "INSERT INTO `kategoriak` (kategoria_nev) VALUES ('$kategoria_nev')";
          $result = mysqli_query($conn, $insert_query);
          
          if($result){
              echo "<script>alert('A kategória sikeresen hozzáadva')</script>";
          }
      }
  }

?>

<h2 class="text-center">Kategória beillesztése</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">  
  <input type="text" class="form-control" name="kategoria_nev" placeholder="Kategória beillesztése" aria-label="Username" aria-describedby="basic-addon1">
</div>


  <div class="input-group w-10 mb-5 m-auto">                                                 
    <input type="submit" value="Hozzáadás" class="bg-dark my-3 px-3 text-light" name ="kategoria_beillesztes">   
  </div>

</form>