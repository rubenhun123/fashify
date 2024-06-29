
<?php
    include("./include/connect.php");
    include("function/common_function.php");
    
    if(empty($_SESSION["felhasznalo_id"])){
      header("Location: login.php");    
    }          
  

    if (isset($_POST['kosar_modosit'])) {
        global $conn;
        $id = $_SESSION["felhasznalo_id"];
        $osszertek = 0;
        
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'mennyiseg_') !== false) {
                $termek_id = substr($key, strlen('mennyiseg_'));
                $mennyiseg = $_POST[$key];
              
                $kosar_frissit = "UPDATE `kosar` SET mennyiseg = '$mennyiseg' WHERE felhasznalo_id = '$id' AND termek_id = '$termek_id'";
                $res_termek = mysqli_query($conn, $kosar_frissit);
            }
        }

      
        $select_query = "SELECT * FROM `kosar` WHERE felhasznalo_id = '$id'";
        $result_query = mysqli_query($conn, $select_query);

        while ($row = mysqli_fetch_array($result_query)) {
            $termek_id = $row["termek_id"];
            $termekek_kivalaszt = "SELECT * FROM `termekek` WHERE termek_id = '$termek_id'";
            $termekek_res = mysqli_query($conn, $termekek_kivalaszt);

            while ($row_termek_ar = mysqli_fetch_array($termekek_res)) {
                $termek_ar = array($row_termek_ar['termek_ar']);
                $osszeg = $row_termek_ar['termek_ar'];
                $termek_osszar = array_sum($termek_ar);
                $osszertek += $termek_osszar;
            }
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
        <style>
          .cart-image{
            width: 50px;
            height: 50px;
          }
        </style>
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
                        <a class="nav-link" href="#">Regisztráció</a>
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

              <div class="container">
                <div class="row">
                <form action="" method="POST">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Termék neve</th>
                        <th>Termék képe</th>
                        <th>Mennyiség</th>
                        <th>Összeg</th>                                                             
                        <!--<th>Eltávolítás</th>-->
                    </tr>
                </thead>
                <tbody>
                <?php
                    global $conn;
                    $id = $_SESSION["felhasznalo_id"];                    
                    $osszertek = 0;
                    $select_query = "SELECT * FROM `kosar` WHERE felhasznalo_id = '$id'";
                    $result_query = mysqli_query($conn, $select_query);

                    while ($row = mysqli_fetch_array($result_query)) {
                        $termek_id = $row["termek_id"];
                        $termekek_kivalaszt = "SELECT * FROM `termekek` WHERE termek_id = '$termek_id'";
                        $termekek_res = mysqli_query($conn, $termekek_kivalaszt);

                        while ($row_termek_ar = mysqli_fetch_array($termekek_res)) {
                            $termek_ar = array($row_termek_ar['termek_ar']);
                            $osszeg = $row_termek_ar['termek_ar'];
                            $termek_nev = $row_termek_ar['termek_nev'];
                            $termek_kep = $row_termek_ar['termek_kep'];
                            $mennyiseg = $row['mennyiseg'];
                            $termek_osszar = $osszeg * $mennyiseg;
                            $osszertek += $termek_osszar;
                    ?>
                    <tr>
                        <td><?php echo $termek_nev ?></td>
                        <td><img src="./termek_kepek/<?php echo $termek_kep ?>" alt="" class="cart-image"></td>                                 
                        <td><input type="text" name="mennyiseg_<?php echo $termek_id; ?>" class="form-input w-50" value="<?php echo $mennyiseg; ?>"></td>                               
                        <td><?php echo $osszeg ?> Ft</td>  
                        <!--<td><input type="checkbox" name="kijelolttermek"></td>                              
                        <td>                                                                
                            <button class="bg-dark px-3 py-2 mx-3 text-light">Törlés</button>                                     
                        </td>                                                                -->
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
            <div class="d-flex mb-5">
                <h4 class="px-3">Végösszeg: <strong class="text-dark"><?php echo $osszertek ?></strong>FT</h4>
                <a href="/index.php"><button class="bg-dark px-3 py-2 mx-3 text-light">Vissza</button></a>
                <a href="fizetes.php"><button class="bg-dark px-3 py-2 mx-3 text-light">Fizetés</button></a>
                <input type="submit" value="Módosítás" class="bg-dark px-3 py-2 mx-3 text-light" name ="kosar_modosit"> 
            </div>
        </form>
        </div>
        </div>
             
        </div>
        
        <?php
          footer();
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
          
        </script>
        
    </body>
</html>