<?php  
    include("../include/connect.php");


  if(isset($_POST["kategoriak_mod"])){
    $kategoria_id = $_POST['kategoria_id'];
    $kategoria_nev = $_POST['kategoria_nev'];    
    $sor = $_POST["kategoria_id"];    
      
    $result_query_kategoriak = "SELECT * FROM `kategoriak`";
    $result_query_kategoriak = mysqli_query($conn, $result_query_kategoriak);
    
    while ($row_kategoriak = mysqli_fetch_array($result_query_kategoriak)) {
        $kategoria_id = $row_kategoriak["kategoria_id"];
                
        if ($kategoria_id == $sor) {
            $insert_query = "UPDATE `kategoriak` SET `kategoria_nev` = '$kategoria_nev' WHERE `kategoria_id` = '$sor'";
            
            $result = mysqli_query($conn, $insert_query);
            
            if ($result) {
                echo "<script>alert('A Kategória sikeresen módosítva')</script>";
            } else {
                echo "<script>alert('Hiba a módosítás során.')</script>";
            }
            
            break;
        }
    }
    }
    
      


?>

<h2 class="text-center">Kategóriák szűrése</h2>



<!--<div class="bg-dark">                            
              </div>-->

              <div class="container">
                <div class="row">
                <form action="" method="POST">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kategória id</th>
                        <th>Kategória neve</th>                                                                                                        
                    </tr>
                </thead>
                <tbody>
                <?php
                    global $conn;                                        
                    $select_query = "SELECT * FROM `kategoriak`";
                    $result_query = mysqli_query($conn, $select_query);

                    
                    while ($row = mysqli_fetch_array($result_query)) {
                        $kategoria_id = $row['kategoria_id'];
                        $kategoria_nev = $row['kategoria_nev'];
                    ?>
                    <tr>
                        <td><?php echo $kategoria_id ?></td>
                        <td><?php echo $kategoria_nev ?></td>                      
                    </tr>
                    <?php                            
                        }
                    ?>
                </tbody>
            </table>
            
        </form>

        <form action="" method="post" class="mb-2">
<div class="form-outline mb-0 text-dark w-50 m-auto">
  <label for="kategoria_id" class="form-label">Kategória id</label>
  <select name="kategoria_id" id="kategoria_id" class="form-select">            
    <?php
    $select_query_kategoriak = "SELECT * FROM `kategoriak`";
    $select_query_kategoriak = mysqli_query($conn, $select_query_kategoriak);
    while($row_kategoriak = mysqli_fetch_array($select_query_kategoriak)) {              
      $kategoria_id = $row_kategoriak["kategoria_id"];
      echo "<option value='$kategoria_id'>$kategoria_id</option>";
    }
    ?> 
  </select>
</div>

<div class="form-outline mb-4 text-dark w-50 m-auto">
        <label for="kategoria_nev" class="form-label"> Kategória neve</label>        
        <input type="text" name="kategoria_nev" id="kategoria_nev" class="form-control  text-dark" placeholder="Adja meg a kategória nevét" autocomplete="off" required="required">
</div>

<div class="form-outline mb-5 text-dark w-50 m-auto">                                                 
    <input type="submit" value="Módosítás" class="bg-dark my-3 px-3 text-light" name ="kategoriak_mod">   
</div>
</form>
</div> 
</div>


