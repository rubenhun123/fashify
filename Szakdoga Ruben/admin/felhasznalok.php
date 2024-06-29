<?php  
    include("../include/connect.php");

    if(isset($_POST["torol"])){
        if(isset($_POST["kijeloltfelhasznalo"]) && is_array($_POST["kijeloltfelhasznalo"])){
            foreach($_POST["kijeloltfelhasznalo"] as $felhasznalo_id){
                $delete_query = "DELETE FROM `felhasznalo` WHERE `id` = '$felhasznalo_id'";
                $result = mysqli_query($conn, $delete_query);

                if($result){
                    echo "<script>alert('A felhasznló sikeresen törölve.');</script>";
                }else{
                    echo "<script>alert('Hiba a törlés során.');</script>";
                }
            }
        }else{
            echo "<script>alert('Válasszon ki legalább 1 felhasználót.');</script>";
        }    
        
    }

    if(isset($_POST["admin"])){
        if(isset($_POST["kijeloltfelhasznalo"]) && is_array($_POST["kijeloltfelhasznalo"])){
            foreach($_POST["kijeloltfelhasznalo"] as $felhasznalo_id){
                $UPDATE_query = "UPDATE `felhasznalo` SET `admine` = 1 WHERE `id` = '$felhasznalo_id'";
                $result_2 = mysqli_query($conn, $UPDATE_query);

                if($result_2){
                    echo "<script>alert('A felhasznló sikeresen adminné téve.');</script>";
                }else{
                    echo "<script>alert('Hiba a frissítés során.');</script>";
                }
            }
        }else{
            echo "<script>alert('Válasszon ki legalább 1 felhasználót.');</script>";
        }    
        
    }
?>
    
    <h2 class="text-center text-dark">Felhasználó műveletek</h2>
    <div class="container">
    <div class="row">   
    <form action="" method="POST">
    <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Felhasználónév</th>
                        <th>E-mail</th>
                        <th>Név</th>
                        <th>Telefonszám</th>                                                                                     
                        <th>Lakcím</th>
                        <th>Admin jog</th>
                        <th>Profilkép</th>
                        <th>Kijelölt felhasználó</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    global $conn;
                    $id = $_SESSION["felhasznalo_id"];                    
                    $osszertek = 0;
                    $select_query = "SELECT * FROM `felhasznalo`";
                    $result_query = mysqli_query($conn, $select_query);

                    while ($row = mysqli_fetch_array($result_query)) {
                        $felhasznalo_id = $row["id"];
                        $felhasznalo_kivalaszt = "SELECT * FROM `felhasznalo` WHERE id = '$felhasznalo_id'";
                        $felhasznalo_res = mysqli_query($conn, $felhasznalo_kivalaszt);

                        while ($row_felhasznalo = mysqli_fetch_array($felhasznalo_res)) {                            
                            $felhasznalonev = $row_felhasznalo['felhasznalonev'];
                            $felhasznalo_email = $row_felhasznalo['email'];
                            $felhasznalo_nev = $row_felhasznalo['nev'];
                            $felhasznalo_telefonszam = $row_felhasznalo['telefonszam'];
                            $felhasznalo_lakcim = $row_felhasznalo['lakcim'];
                            $felhasznalo_admine = $row_felhasznalo['admine'];
                            $felhasznalo_kep = $row_felhasznalo['profilkep'];
                           


                    ?>
                    <tr>
                        <td><?php echo $felhasznalonev ?></td>                        
                        <td><?php echo $felhasznalo_email ?></td>                               
                        <td><?php echo $felhasznalo_nev ?></td>  
                        <td><?php echo $felhasznalo_telefonszam ?></td>  
                        <td><?php echo $felhasznalo_lakcim ?></td>  
                        <td><?php if($felhasznalo_admine) { echo 'van';}else{ echo 'nincs';} ?></td>  
                        <td><img src="../felhasznalo_kepek/<?php echo $felhasznalo_kep ?>" alt="" class="cart-image"></td>                                 
                        <td><input type="checkbox" name="kijeloltfelhasznalo[]" value="<?php echo $felhasznalo_id; ?>"></td>                              
                                                                                       
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
            
            <div class="input-group w-10 mb-1 m-auto">                                                 
                <input type="submit" value="Töröl" class="bg-dark my-3 px-3 text-light" name ="torol">   
            </div>

            <div class="input-group w-10 mb-5 m-auto">                                                 
                <input type="submit" value="Admin jog" class="bg-dark my-3 px-3 text-light" name ="admin">   
            </div>
            
        </form>
        </div>
        </div>