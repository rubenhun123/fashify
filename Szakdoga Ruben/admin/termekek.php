<?php  
    include("../include/connect.php");

    if(isset($_POST["atenged"])){
        if(isset($_POST["kijelolttermek"]) && is_array($_POST["kijelolttermek"])){
            foreach($_POST["kijelolttermek"] as $termek_id){
                $update_query = "UPDATE `termekek` SET `elerhetoseg` = true WHERE `termek_id` = '$termek_id'";
                $result = mysqli_query($conn, $update_query);

                if($result){
                    echo "<script>alert('A termék sikeresen átengedve.');</script>";
                }else{
                    echo "<script>alert('Hiba a termék átengedése során.');</script>";
                }
            }
        }else{
            echo "<script>alert('Válasszon ki legalább 1 terméket.');</script>";
        }    
        
    }

    if(isset($_POST["torol"])){
        if(isset($_POST["kijelolttermek"]) && is_array($_POST["kijelolttermek"])){
            foreach($_POST["kijelolttermek"] as $termek_id){
                $delete_query = "UPDATE `termekek` SET `elerhetoseg` = true WHERE `termek_id` = '$termek_id'";
                $result = mysqli_query($conn, $delete_query);

                if($result){
                    echo "<script>alert('A termék sikeresen törölve.');</script>";
                }else{
                    echo "<script>alert('Hiba a termék törlése során.');</script>";
                }
            }
        }else{
            echo "<script>alert('Válasszon ki legalább 1 terméket.');</script>";
        }    
        
    }
?>
    <h2 class="text-center text-dark">Termékek átengedése</h2>
    <form action="" method="POST">
    <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Termék neve</th>
                        <th>Termék képe</th>
                        <th>Termék leírása</th>
                        <th>Termék kulcsszava</th>                                                                                     
                        <th>Kategória</th>
                        <th>Márka</th>
                        <th>Termék ára</th>
                        <th>Kijelölt termék</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    global $conn;
                    $id = $_SESSION["felhasznalo_id"];                    
                    $osszertek = 0;
                    $select_query = "SELECT * FROM `termekek` WHERE `elerhetoseg` = 0";
                    $result_query = mysqli_query($conn, $select_query);

                    while ($row = mysqli_fetch_array($result_query)) {
                        $termek_id = $row["termek_id"];
                        $termekek_kivalaszt = "SELECT * FROM `termekek` WHERE termek_id = '$termek_id'";
                        $termekek_res = mysqli_query($conn, $termekek_kivalaszt);

                        while ($row_termek = mysqli_fetch_array($termekek_res)) {                            
                            $termek_nev = $row_termek['termek_nev'];
                            $termek_kep = $row_termek['termek_kep'];
                            $termek_leiras = $row_termek['termek_leiras'];
                            $termek_kulcsszo = $row_termek['termek_kulcsszo'];
                            $kategoria_id_1 = $row_termek['kategoria_id'];
                            $marka_id_1 = $row_termek['marka_id'];
                            $termek_ar = $row_termek['termek_ar'];

                            $kategoria_query = "SELECT * FROM `kategoriak` WHERE `kategoria_id` = $kategoria_id_1";
                            $kategoria_result = mysqli_query($conn, $kategoria_query);
                            while ($kat_row = mysqli_fetch_array($kategoria_result)){
                                $kategoria_id = $kat_row['kategoria_nev'];
                            }

                            $marka_query = "SELECT * FROM `markak` WHERE `marka_id` = $marka_id_1";
                            $marka_result = mysqli_query($conn, $marka_query);
                            while ($marka_row = mysqli_fetch_array($marka_result)){
                                $marka_id = $marka_row['marka_nev'];
                            }


                    ?>
                    <tr>
                        <td><?php echo $termek_nev ?></td>
                        <td><img src="../termek_kepek/<?php echo $termek_kep ?>" alt="" class="cart-image"></td>                                 
                        <td><?php echo $termek_leiras ?></td>                               
                        <td><?php echo $termek_kulcsszo ?></td>  
                        <td><?php echo $kategoria_id ?></td>  
                        <td><?php echo $marka_id ?></td>  
                        <td><?php echo $termek_ar ?></td>  
                        <td><input type="checkbox" name="kijelolttermek[]" value="<?php echo $termek_id; ?>"></td>                              
                                                                                       
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
    <div class="input-group w-10 mb-1 m-auto">                                                 
        <input type="submit" value="Átenged" class="bg-dark my-3 px-3 text-light" name ="atenged">   
    </div>
    <div class="input-group w-10 mb-5 m-auto">                                                 
        <input type="submit" value="Töröl" class="bg-dark my-3 px-3 text-light" name ="torol">   
    </div>
    
    </form>