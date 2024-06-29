<?php  
    include("../include/connect.php");


  if(isset($_POST["termek_mod"])){
    $termek_id = $_POST['termek_id'];
    $termek_nev = $_POST['termek_nev'];
    $termek_leiras = $_POST['termek_leiras'];
    $termek_kulcsszo = $_POST['termek_kulcsszo'];
    $kategoria_id = $_POST['kategoria_id'];                        
    $marka_id = $_POST['marka_id'];                        
    $termek_ar = $_POST['termek_ar'];                        
    $elerhetoseg = $_POST['elerhetoseg'];
    $sor = $_POST["termek_id"];    
      
    $select_query_termekek = "SELECT * FROM `termekek`";
    $result_query_termekek = mysqli_query($conn, $select_query_termekek);
    
    while ($row_termekek = mysqli_fetch_array($result_query_termekek)) {
        $termek_id = $row_termekek["termek_id"];
                
        if ($termek_id == $sor) {
            $insert_query = "UPDATE `termekek` SET `termek_nev` = '$termek_nev', `termek_leiras` = '$termek_leiras', `termek_kulcsszo` = '$termek_kulcsszo', `kategoria_id` = '$kategoria_id', `marka_id` = '$marka_id', `termek_ar` = '$termek_ar', `elerhetoseg` = '$elerhetoseg' WHERE `termek_id` = '$sor'";
            
            $result = mysqli_query($conn, $insert_query);
            
            if ($result) {
                echo "<script>alert('A Termék sikeresen módosítva')</script>";
            } else {
                echo "<script>alert('Hiba a módosítás során.')</script>";
            }
            
            break;
        }
    }
    }
    
      


?>

<h2 class="text-center">Termék módosítása</h2>



              <div class="container">
                <div class="row">
                <form action="" method="POST">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Termék id</th>
                        <th>Termék neve</th>
                        <th>Termék leírása</th>
                        <th>Termék kulcsszó</th>
                        <th>Kategória id</th>                                                                                     
                        <th>Márka id</th>                                                                                     
                        <th>Termék ár</th>                                                                                     
                        <th>Van raktáron</th>                                                                                     
                    </tr>
                </thead>
                <tbody>
                <?php
                    global $conn;                                        
                    $select_query = "SELECT * FROM `termekek`";
                    $result_query = mysqli_query($conn, $select_query);

                    
                    while ($row = mysqli_fetch_array($result_query)) {
                        $termek_id = $row['termek_id'];
                        $termek_nev = $row['termek_nev'];
                        $termek_leiras = $row['termek_leiras'];
                        $termek_kulcsszo = $row['termek_kulcsszo'];
                        $kategoria_id = $row['kategoria_id'];                        
                        $marka_id = $row['marka_id'];                        
                        $termek_ar = $row['termek_ar'];                        
                        $elerhetoseg = $row['elerhetoseg'];                        
                    ?>
                    <tr>
                        <td><?php echo $termek_id ?></td>
                        <td><?php echo $termek_nev ?></td>
                        <td><?php echo $termek_leiras ?></td>
                        <td><?php echo $termek_kulcsszo ?></td>
                        <td><?php echo $kategoria_id ?></td>                                                   
                        <td><?php echo $marka_id ?></td>
                        <td><?php echo $termek_ar ?></td>
                        <td><?php if($elerhetoseg){ echo "Van";}else{echo "Nincs";}  ?></td>
                    </tr>
                    <?php                            
                        }
                    ?>
                </tbody>
            </table>
            
        </form>

        <form action="" method="post" class="mb-2">
<div class="form-outline mb-2 text-dark w-50 m-auto">
  <label for="termek_id" class="form-label">Termék id</label>
  <select name="termek_id" id="termek_id" class="form-select">            
    <?php
    $select_query_termekek = "SELECT * FROM `termekek`";
    $select_query_termekek = mysqli_query($conn, $select_query_termekek);
    while($row_termekek = mysqli_fetch_array($select_query_termekek)) {              
      $termek_id = $row_termekek["termek_id"];
      echo "<option value='$termek_id'>$termek_id</option>";
    }
    ?> 
  </select>
</div>

<div class="form-outline mb-2 text-dark w-50 m-auto">
        <label for="termek_nev" class="form-label"> Termék neve</label>        
        <input type="text" name="termek_nev" id="termek_nev" class="form-control  text-dark" placeholder="Adja meg a termék nevét" autocomplete="off" required="required">
</div>
<div class="form-outline mb-2 text-dark w-50 m-auto">
        <label for="termek_leiras" class="form-label"> Termék leírása</label>        
        <input type="text" name="termek_leiras" id="termek_leiras" class="form-control  text-dark" placeholder="Adja meg a termék leírását" autocomplete="off" required="required">
</div>
<div class="form-outline mb-2 text-dark w-50 m-auto">
        <label for="termek_kulcsszo" class="form-label"> Termák kulcsszó</label>        
        <input type="text" name="termek_kulcsszo" id="termek_kulcsszo" class="form-control  text-dark" placeholder="Adja meg a termék kulcsszavát" autocomplete="off" required="required">
</div>
<div class="form-outline mb-2 text-dark w-50 m-auto">
        <label for="kategoria_id" class="form-label"> Kategória id</label>
        <input type="number" name="kategoria_id" id="kategoria_id" class="form-control  text-dark" placeholder="Adja meg a kategória id-t" autocomplete="off" required="required">
</div>
<div class="form-outline mb-2 text-dark w-50 m-auto">
        <label for="marka_id" class="form-label"> Márka id</label>
        <input type="number" name="marka_id" id="marka_id" class="form-control  text-dark" placeholder="Adja meg a márka id-t" autocomplete="off" required="required">
</div>
<div class="form-outline mb-2 text-dark w-50 m-auto">
        <label for="termek_ar" class="form-label"> Termék ára</label>
        <input type="number" name="termek_ar" id="termek_ar" class="form-control  text-dark" placeholder="Adja meg a termék árát" autocomplete="off" required="required">
</div>
<div class="form-outline mb-2 text-dark w-50 m-auto">
        <label for="elerhetoseg" class="form-label"> Van-e</label>        
        <select name="elerhetoseg" id="elerhetoseg" class="form-select">
            <option value=true>Van</option>
            <option value=false>Nincs</option>
        </select>
</div>


<div class="form-outline mb-5 text-dark w-50 m-auto">                                                 
    <input type="submit" value="Módosítás" class="bg-dark my-3 px-3 text-light" name ="termek_mod">   
</div>
</form>
</div> 
</div>


