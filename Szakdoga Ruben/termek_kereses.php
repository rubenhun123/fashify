<?php
    include("./include/connect.php");
    include("function/common_function.php");
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
                  getKonkretKategoriak();
                  getKonkretMarka();
                  termekKereses();
                  if(isset($_SESSION["felhssznalo_id"])){
                    $id = $_SESSION["felhasznalo_id"];
                  }
                  ?>                                    
                  
                  </div>
                </div>                
              </div>


<?php
  footer();
?>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
          
        </script>
        
    </body>
</html>