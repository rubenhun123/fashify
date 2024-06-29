<?php  
    include("../include/connect.php");

    if(isset($_POST["markak_del"])){    
        $sor = $_POST["marka_id"];
        
        $select_query_markak = "SELECT * FROM `markak`";
            $select_query_markak = mysqli_query($conn, $select_query_markak);
            
            while ($row_markak = mysqli_fetch_array($select_query_markak)) {
                $marka_id = $row_markak["marka_id"];
                        
                if ($marka_id == $sor) {
                    $delete_query = "DELETE FROM `markak` WHERE `marka_id` = '$sor'";                
                    $result = mysqli_query($conn, $delete_query);
                    
                    if ($result) {
                        echo "<script>alert('A Márka törölve lett')</script>";
                    } else {
                        echo "<script>alert('Hiba a törlés során.')</script>";
                    }
                    
                    break;
                }
            }
    
    
      }
    
      


?>

<h2 class="text-center">Márka törlése</h2>



<div class="bg-dark">                            
              </div>

              <div class="container">
                <div class="row">
                <form action="" method="POST">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Márka id</th>
                        <th>Márka neve</th>                                                                                                          
                    </tr>
                </thead>
                <tbody>
                <?php
                    global $conn;                                        
                    $select_query = "SELECT * FROM `markak`";
                    $result_query = mysqli_query($conn, $select_query);

                    
                    while ($row = mysqli_fetch_array($result_query)) {
                        $marka_id = $row['marka_id'];
                        $marka_nev = $row['marka_nev'];                                                
                    ?>
                    <tr>
                        <td><?php echo $marka_id ?></td>
                        <td><?php echo $marka_nev ?></td>                       
                    </tr>
                    <?php                            
                        }
                    ?>
                </tbody>
            </table>
            
        </form>

        <form action="" method="post" class="mb-2">
<div class="form-outline mb-4 text-dark w-50 m-auto">
  <label for="marka_id" class="form-label">Márka id</label>
  <select name="marka_id" id="marka_id" class="form-select">            
    <?php
    $select_query_markak = "SELECT * FROM `markak`";
    $select_query_markak = mysqli_query($conn, $select_query_markak);
    while($row_markak = mysqli_fetch_array($select_query_markak)) {              
      $marka_id = $row_markak["marka_id"];
      echo "<option value='$marka_id'>$marka_id</option>";
    }
    ?> 
  </select>
</div>

<div class="form-outline mb-5 text-dark w-50 m-auto">                                                 
    <input type="submit" value="Törlés" class="bg-dark my-3 px-3 text-light" name ="markak_del">   
</div>
</form>
</div> 
</div>

