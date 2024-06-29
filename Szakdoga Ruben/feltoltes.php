<?php
    include("./include/connect.php");
    include("function/common_function.php");  
    
    if(isset($_SESSION["felhasznalo_id"])){
      $id = $_SESSION["felhasznalo_id"];
    } 

    if(isset($_POST["termek_feltolt"])){
      $termek_nev = $_POST["termek_nev"];      
      $termek_leiras = $_POST["termek_leiras"];
      $termek_kulcsszo = $_POST["termek_kulcsszo"];
      $kategoria_id = $_POST["kategoria_id"];
      $marka_id = $_POST["marka_id"];  
      $termek_ar = $_POST["termek_ar"];
      $termek_elerhetoseg = false;
      $termek_kep = $_FILES["termek_kep"]["name"];
      $termek_kep_tmp = $_FILES["termek_kep"]["tmp_name"];
      if($termek_nev == "" or $termek_leiras == "" or $termek_kulcsszo == "" or $kategoria_id == "" or $marka_id == "" or $termek_ar == "" or $termek_kep == ""){
        echo "<script>alert('Kérem töltse ki az összes mezőt!')</script>";
        exit();
      }else{
        move_uploaded_file($termek_kep_tmp,"./termek_kepek/$termek_kep");
        $insert_query="INSERT INTO `termekek` (termek_nev, termek_leiras, termek_kulcsszo, kategoria_id, marka_id, termek_kep, termek_ar, felhasznalo_id, elerhetoseg) VALUES ('$termek_nev', '$termek_leiras', '$termek_kulcsszo', '$kategoria_id', '$marka_id', '$termek_kep', '$termek_ar', '$id', '$termek_elerhetoseg')";
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

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Ruha Webshop</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>

    <body>
        
        <div class = "container-fluid p-0">

            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                  <img src="./kepek/logo.png" alt="" class="shop-logo">                    
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Kezdőlap</a>
                      </li>
                      
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Termékek
                        </a>                        
                        <ul class="dropdown-menu text-light bg-secondary" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item text-light bg-secondary" href="osszes_termek.php">Összes</a></li>
                        <li class = "text-dark"><hr class="dropdown-divider">Márkák</li>
                        <?php                        
                        getMarkak();
                        ?>
                        
                          <li class = "text-dark"><hr class="dropdown-divider">Termékek</li>
                          <?php
                            getKategoriak();
                            
                        ?>
                        </ul>
                      </li>                     
                      <li class="nav-item">
                        <a class="nav-link" href="reg.php">Regisztráció</a>
                      </li>                     
                      <li class="nav-item">
                        <a class="nav-link" href="kosar.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php termek_mennyiseg(); ?></sup></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link"><i class="fa-solid fa-coins"></i><sup><?php osszeg(); ?></sup><sup> Ft</sup></a>
                      </li>
                    </ul>
                    <form class="d-flex" action="termek_kereses.php" method="GET">
                      <input class="form-control me-2" type="search" placeholder="Keresés" aria-label="Search" name="kereses">
                      <input type="submit" value ="Keresés" class="btn btn-dark btn-outline-light" name="termek_kereses">
                    </form>
                  </div>
                </div>
              </nav>
              


              <?php
  kosar();
?>

              <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
                <ul class="navbar-nav me-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="#">Üdv!</a>
                  </li>
                  <li class="nav-item">
                    <?php

                      if(empty($_SESSION["felhasznalo_id"])){
                        echo "<a class='nav-link' href='login.php''>Bejelentkezés</a>";
                      } 
                      else{                        
                        echo "<a class='nav-link' href='logout.php'>Kijelentkezés</a>";
                      }         
  
                    ?>
                    
                  </li>
                  <li class="nav-item">
                  <?php

                      if(empty($_SESSION["felhasznalo_id"])){
                        
                      } 
                      else{                        
                        echo "<a class='nav-link' href='feltoltes.php'>Ruhacikk feltöltése</a>";
                      }         

?>
                  </li>
                </ul>
              </nav>

              <div class="bg-dark">
                <h3 class="text-center" id="labjegyzet">Webáruház</h3>                
              </div>

              <div class="row px-1">
                <div class="col md-12">
                  <div class="row">

                  <?php                
                      if(isset($_SESSION["felhasznalo_id"])){
                        $id = $_SESSION["felhasznalo_id"];
                      }            
                  ?>        
                                    
                  
                  </div>
                </div>                
              </div>


             

        </div>
        <form action="" method="post" enctype="multipart/form-data" class="mb-2">
            <div class="form-outline mb-4 text-dark w-50 m-auto">
              <label for="marka_id" class="form-label">Márka név</label>
              <select name="marka_id" id="marka_id" class="form-select">            
                <?php
                $select_query_markak = "SELECT * FROM `markak`";
                $select_query_markak = mysqli_query($conn, $select_query_markak);
                while($row_markak = mysqli_fetch_array($select_query_markak)) {              
                  $marka_id = $row_markak["marka_id"];
                  $marka_nev = $row_markak["marka_nev"];
                  echo "<option value='$marka_id'>$marka_nev</option>";
                }
                ?> 
              </select>
            </div>

            <div class="form-outline mb-4 text-dark w-50 m-auto">
              <label for="kategoria_id" class="form-label">Kategória név</label>
              <select name="kategoria_id" id="kategoria_id" class="form-select">            
                <?php
                $select_query_kategoriak = "SELECT * FROM `kategoriak`";
                $select_query_kategoriak = mysqli_query($conn, $select_query_kategoriak);
                while($row_kategoriak = mysqli_fetch_array($select_query_kategoriak)) {              
                  $kategoria_id = $row_kategoriak["kategoria_id"];
                  $kategoria_nev = $row_kategoriak["kategoria_nev"];
                  echo "<option value='$kategoria_id'>$kategoria_nev</option>";
                }
                ?> 
              </select>
            </div>
            
            <div class="form-outline mb-4 text-dark w-50 m-auto">
                    <label for="termek_nev" class="form-label"> Termék neve</label>        
                    <input type="text" name="termek_nev" id="termek_nev" class="form-control  text-dark" placeholder="Adja meg a termék nevét" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 text-dark w-50 m-auto">
                    <label for="termek_leiras" class="form-label"> Termék leírás</label>        
                    <input type="text" name="termek_leiras" id="termek_leiras" class="form-control  text-dark" placeholder="Adja meg a termék leírását" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 text-dark w-50 m-auto">
                    <label for="termek_kulcsszo" class="form-label"> Termék kulcsszó</label>        
                    <input type="text" name="termek_kulcsszo" id="termek_kulcsszo" class="form-control  text-dark" placeholder="Adja meg a termék kulcsszavát" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-1 text-dark w-50 m-auto">
                    <label for="termek_kep" class="form-label">Termék képe</label>
                    <input type="file" name="termek_kep" id="termek_kep" class="form-control text-dark" placeholder="Adja meg a termék képét" autocomplete="off" required="required">
           </div>

            <div class="form-outline mb-4 text-dark w-50 m-auto">
                    <label for="termek_ar" class="form-label"> Termék ára</label>        
                    <input type="number" name="termek_ar" id="termek_ar" class="form-control  text-dark" placeholder="Adja meg a termék árát" autocomplete="off" required="required">
            </div>
            
            <div class="form-outline mb-5 text-light w-50 m-auto">                                                 
              <input type="submit" value="Feltöltés" class="bg-dark my-3 px-3 text-light" name ="termek_feltolt">   
            </div>
        </form>
        
        
        <?php
          footer();
        ?>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
          
        </script>
        
    </body>
    
</html>