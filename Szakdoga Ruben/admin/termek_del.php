<?php  
    include("../include/connect.php");

    if(isset($_POST["termek_del"])){    
        $sor = $_POST["termek_id"];
        
        $select_query_termekek = "SELECT * FROM `termekek`";
            $select_query_termekek = mysqli_query($conn, $select_query_termekek);
            
            while ($row_termekek = mysqli_fetch_array($select_query_termekek)) {
                $termek_id = $row_termekek["termek_id"];
                        
                if ($termek_id == $sor) {
                    $delete_query = "DELETE FROM `termekek` WHERE `termek_id` = '$sor'";                
                    $result = mysqli_query($conn, $delete_query);
                    
                    if ($result) {
                        echo "<script>alert('A Termék törölve lett')</script>";
                    } else {
                        echo "<script>alert('Hiba a törlés során.')</script>";
                    }
                    
                    break;
                }
            }
    
    
      }
    
      


?>

<h2 class="text-center">Termék törlése</h2>



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
<div class="form-outline mb-4 text-dark w-50 m-auto">
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


<div class="form-outline mb-5 text-dark w-50 m-auto">                                                 
    <input type="submit" value="Törlés" class="bg-dark my-3 px-3 text-light" name ="termek_del">   
</div>
</form>
</div> 
</div>

