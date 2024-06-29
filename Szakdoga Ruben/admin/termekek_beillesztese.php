<?php
  include("../include/connect.php");

  if(isset($_POST["termek_hozzaadasa"])){
      $termek_nev = $_POST["termek_nev"];      
      $termek_leiras = $_POST["termek_leiras"];
      $termek_kulcsszo = $_POST["termek_kulcsszo"];
      $termek_kategoriak = $_POST["termek_kategoriak"];
      $termek_markak = $_POST["termek_markak"];  
      $termek_ar = $_POST["termek_ar"];
      $termek_elerhetoseg = true;
      $termek_kep = $_FILES["termek_kep"]["name"];
      $termek_kep_tmp = $_FILES["termek_kep"]["tmp_name"];
      if($termek_nev == "" or $termek_leiras == "" or $termek_kulcsszo == "" or $termek_kategoriak == "" or $termek_markak == "" or $termek_ar == "" or $termek_kep == ""){
        echo "<script>alert('Kérem töltse ki az összes mezőt!')</script>";
        exit();
      }else{
        move_uploaded_file($termek_kep_tmp,"../termek_kepek/$termek_kep");
        $insert_query="INSERT INTO `termekek` (termek_nev, termek_leiras, termek_kulcsszo, kategoria_id, marka_id, termek_kep, termek_ar, felhasznalo_id, elerhetoseg) VALUES ('$termek_nev', '$termek_leiras', '$termek_kulcsszo', '$termek_kategoriak', '$termek_markak', '$termek_kep', '$termek_ar', 0, '$termek_elerhetoseg')";
        $result_query = mysqli_query($conn, $insert_query);
      }
      $select_query = "SELECT * FROM `termekek` WHERE termek_nev='$termek_nev'";
      $result_select = mysqli_query($conn, $select_query);
      $number = mysqli_num_rows($result_select);
      if($result_query){
        echo "<script>alert('Termék sikeresen hozzáadva')</script>";
      }      
  }

?>



<h2 class="text-center text-dark">Termék hozzáadása</h2>
<div class="container">
  <div class="row">    
    <form action="" method="POST" enctype="multipart/form-data" class="mb-5">
      <div class="form-outline mb-1 text-dark w-50 m-auto">
        <label for="termek_nev" class="form-label text-dark">Termék neve</label>
        <input type="text" name="termek_nev" id="termek_nev" class="form-control text-dark" placeholder="Adja meg a termék nevét" autocomplete="off" required="required">
      </div>
      <div class="form-outline mb-1 text-dark w-50 m-auto">
        <label for="termek_leiras" class="form-label">Termékleírás</label>
        <input type="text" name="termek_leiras" id="termek_leiras" class="form-control  text-dark" placeholder="Adja meg a leírását nevét" autocomplete="off" required="required">
      </div>
      <div class="form-outline mb-1 text-dark w-50 m-auto">
        <label for="termek_kulcsszo" class="form-label">Termék kulcsszava</label>
        <input type="text" name="termek_kulcsszo" id="termek_kulcsszo" class="form-control  text-dark" placeholder="Adja meg a termék kulcsszavát" autocomplete="off" required="required">
      </div>
      <div class="form-outline mb-1 text-dark w-50 m-auto">
      <label for="termek_kategoriak" class="form-label">Termék kategóriája</label>
        <select name="termek_kategoriak" id="termek_kategoriak" class="form-select">
          <option value="">Kategória kiválasztása</option>
          <?php
            $select_query = "SELECT * FROM kategoriak";
            $result_query = mysqli_query($conn, $select_query);
            while($row = mysqli_fetch_array($result_query)){
              $kategoria_nev = $row["kategoria_nev"];
              $kategoria_id = $row["kategoria_id"];
              echo "<option value='$kategoria_id'>$kategoria_nev</option>";
            }
          ?>          
        </select>
      </div>
      <div class="form-outline mb-1 text-dark w-50 m-auto">
      <label for="termek_markak" class="form-label">Termék márkája</label>
        <select name="termek_markak" id="termek_markak" class="form-select">
          <option value="">Márka kiválasztása</option>
          <?php
            $select_query = "SELECT * FROM markak";
            $result_query = mysqli_query($conn, $select_query);
            while($row = mysqli_fetch_array($result_query)){
              $marka_nev = $row["marka_nev"];
              $marka_id = $row["marka_id"];
              echo "<option value='$marka_id'>$marka_nev</option>";
            }
          ?>  
        </select>
      </div>
      <div class="form-outline mb-1 text-dark w-50 m-auto">
        <label for="termek_kep" class="form-label">Termék képe</label>
        <input type="file" name="termek_kep" id="termek_kep" class="form-control text-dark" placeholder="Adja meg a termék képét" autocomplete="off" required="required">
      </div>
      <div class="form-outline mb-1 text-dark w-50 m-auto">
        <label for="termek_ar" class="form-label">Termék ára</label>
        <input type="text" name="termek_ar" id="termek_ar" class="form-control text-dark" placeholder="Adja meg a termék árát" autocomplete="off" required="required">
      </div>
      
      <div class="form-outline mb-5 text-dark w-50 m-auto">                                                 
        <input type="submit" value="Hozzáadás" class="bg-dark my-3 px-3 text-light" name ="termek_hozzaadasa">   
      </div>       
    </form>
  </div>
  </div>
  