<?php  
    include("../include/connect.php");


  if(isset($_POST["markak_mod"])){
    $marka_id = $_POST['marka_id'];
    $marka_nev = $_POST['marka_nev'];    
    $sor = $_POST["marka_id"];    
      
    $result_query_markak = "SELECT * FROM `markak`";
    $result_query_markak = mysqli_query($conn, $result_query_markak);
    
    while ($row_markak = mysqli_fetch_array($result_query_markak)) {
        $marka_id = $row_markak["marka_id"];
                
        if ($marka_id == $sor) {
            $insert_query = "UPDATE `markak` SET `marka_nev` = '$marka_nev' WHERE `marka_id` = '$sor'";
            
            $result = mysqli_query($conn, $insert_query);
            
            if ($result) {
                echo "<script>alert('A Márka sikeresen módosítva')</script>";
            } else {
                echo "<script>alert('Hiba a módosítás során.')</script>";
            }
            
            break;
        }
    }
    }
    
      


?>

<h2 class="text-center">Kategóriák szűrése</h2>



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

<div class="form-outline mb-4 text-dark w-50 m-auto">
        <label for="marka_nev" class="form-label"> Márka neve</label>        
        <input type="text" name="marka_nev" id="marka_nev" class="form-control  text-dark" placeholder="Adja meg a Márka nevét" autocomplete="off" required="required">
</div>

<div class="form-outline mb-5 text-dark w-50 m-auto">                                                 
    <input type="submit" value="Módosítás" class="bg-dark my-3 px-3 text-light" name ="markak_mod">   
</div>
</form>
</div> 
</div>

