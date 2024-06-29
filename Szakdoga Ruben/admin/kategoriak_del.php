<?php  
    include("../include/connect.php");

    if(isset($_POST["kategoriak_del"])){    
        $sor = $_POST["kategoria_id"];
        
        $select_query_kategoriak = "SELECT * FROM `kategoriak`";
            $select_query_kategoriak = mysqli_query($conn, $select_query_kategoriak);
            
            while ($row_kategoriak = mysqli_fetch_array($select_query_kategoriak)) {
                $kategoria_id = $row_kategoriak["kategoria_id"];
                        
                if ($kategoria_id == $sor) {
                    $delete_query = "DELETE FROM `kategoriak` WHERE `kategoria_id` = '$sor'";                
                    $result = mysqli_query($conn, $delete_query);
                    
                    if ($result) {
                        echo "<script>alert('A Kategória törölve lett')</script>";
                    } else {
                        echo "<script>alert('Hiba a törlés során.')</script>";
                    }
                    
                    break;
                }
            }
    
    
      }
    
      


?>

<h2 class="text-center">Kategória törlése</h2>



<div class="bg-dark">                            
              </div>

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
<div class="form-outline mb-4 text-dark w-50 m-auto">
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

<div class="form-outline mb-5 text-dark w-50 m-auto">                                                 
    <input type="submit" value="Törlés" class="bg-dark my-3 px-3 text-light" name ="kategoriak_del">   
</div>
</form>
</div> 
</div>

