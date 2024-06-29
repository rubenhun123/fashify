<?php  
//include("./include/connect.php");


function getTermekek(){
    global $conn;
    if(!isset($_GET['kategoria'])){
        if(!isset($_GET['marka'])){
            $select_query = "SELECT * FROM `termekek` WHERE elerhetoseg = '1' ORDER BY rand() LIMIT 3";
            $result_query = mysqli_query($conn, $select_query);
            while($row = mysqli_fetch_array($result_query)){
              $termek_id = $row['termek_id'];
              $termek_nev = $row['termek_nev'];
              $termek_leiras = $row['termek_leiras'];
              $termek_id_kulcsszo = $row['termek_kulcsszo'];
              $kategoria_id = $row['kategoria_id'];
              $marka_id = $row['marka_id'];
              $termek_kep = $row['termek_kep'];
              $termek_ar = $row['termek_ar'];

              echo "<div class='col-md-4 mb-2'>
              <div class='card'>
                <img src='./termek_kepek/$termek_kep' class='card-img-top' alt='$termek_nev''>
                <div class='card-body'>
                  <h5 class='card-title'>$termek_nev</h5>
                  <p class='card-text'>$termek_leiras</p>
                  <p class='card-text'>$termek_ar FT</p>
                  <a href='index.php?kosarba=$termek_id' class='btn btn-primary'>Tedd kosárba</a>
                <a href='index.php?kategoria=$kategoria_id' class='btn btn-secondary'>Több termék ilyen kategóriában</a>
                </div>
              </div>
            </div>";  

            }
    }
}
}

function getOsszesTermekek(){
  global $conn;
  if(!isset($_GET['kategoria'])){
      if(!isset($_GET['marka'])){
          $select_query = "SELECT * FROM `termekek` WHERE `elerhetoseg` = 1";
          $result_query = mysqli_query($conn, $select_query);
          while($row = mysqli_fetch_array($result_query)){
            $termek_id = $row['termek_id'];
            $termek_nev = $row['termek_nev'];
            $termek_leiras = $row['termek_leiras'];
            $termek_id_kulcsszo = $row['termek_kulcsszo'];
            $kategoria_id = $row['kategoria_id'];
            $marka_id = $row['marka_id'];
            $termek_kep = $row['termek_kep'];
            $termek_ar = $row['termek_ar'];

            echo "<div class='col-md-4 mb-5'>
            <div class='card'>
              <img src='./termek_kepek/$termek_kep' class='card-img-top' alt='$termek_nev''>
              <div class='card-body'>
                <h5 class='card-title'>$termek_nev</h5>
                <p class='card-text'>$termek_leiras</p>
                <p class='card-text'>$termek_ar FT</p>
                <a href='index.php?kosarba=$termek_id' class='btn btn-primary'>Tedd kosárba</a>
                <a href='index.php?kategoria=$kategoria_id' class='btn btn-secondary'>Több termék ilyen kategóriában</a>
              </div>
            </div>
          </div>";  

          }
  }
}
}

   

function getKonkretKategoriak(){
    global $conn;
    if(isset($_GET['kategoria'])){
        $kategoria_id=$_GET['kategoria'];        
            $select_query = "SELECT * FROM `termekek` WHERE kategoria_id = $kategoria_id";
            $result_query = mysqli_query($conn, $select_query);
            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows < 1){
                echo "<h2 class='text-center text-danger'> Ebben a kategória jelenleg nincs termék webáruházunkban és raktáron sem.</h2>";
            }
            while($row = mysqli_fetch_array($result_query)){
              $termek_id = $row['termek_id'];
              $termek_nev = $row['termek_nev'];
              $termek_leiras = $row['termek_leiras'];
              $termek_id_kulcsszo = $row['termek_kulcsszo'];
              $kategoria_id = $row['kategoria_id'];
              $marka_id = $row['marka_id'];
              $termek_kep = $row['termek_kep'];
              $termek_ar = $row['termek_ar'];

              echo "<div class='col-md-4 mb-5'>
              <div class='card'>
                <img src='./termek_kepek/$termek_kep' class='card-img-top' alt='$termek_nev''>
                <div class='card-body'>
                  <h5 class='card-title'>$termek_nev</h5>
                  <p class='card-text'>$termek_leiras</p>
                  <p class='card-text'>$termek_ar FT</p>
                  <a href='index.php?kosarba=$termek_id' class='btn btn-primary'>Tedd kosárba</a>
                <a href='index.php?kategoria=$kategoria_id' class='btn btn-secondary'>Több termék ilyen kategóriában</a>
                </div>
              </div>
            </div>";  

            }
    }
}



function getKonkretMarka(){
    global $conn;
    if(isset($_GET['marka'])){       
        $marka_id=$_GET['marka'];        
        $select_query = "SELECT * FROM `termekek` WHERE marka_id = $marka_id";
            $result_query = mysqli_query($conn, $select_query);
            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows < 1){
                echo "<h2 class='text-center text-danger'> Ilyen márkával rendelkező termék jelenleg nincsen webáruházunkban és raktáron sem.</h2>";
            }
            while($row = mysqli_fetch_array($result_query)){
              $termek_id = $row['termek_id'];
              $termek_nev = $row['termek_nev'];
              $termek_leiras = $row['termek_leiras'];
              $termek_id_kulcsszo = $row['termek_kulcsszo'];
              $kategoria_id = $row['kategoria_id'];
              $marka_id = $row['marka_id'];
              $termek_kep = $row['termek_kep'];
              $termek_ar = $row['termek_ar'];

              echo "<div class='col-md-4 mb-5'>
              <div class='card'>
                <img src='./termek_kepek/$termek_kep' class='card-img-top' alt='$termek_nev''>
                <div class='card-body'>
                  <h5 class='card-title'>$termek_nev</h5>
                  <p class='card-text'>$termek_leiras</p>
                  <p class='card-text'>$termek_ar FT</p>
                  <a href='index.php?kosarba=$termek_id' class='btn btn-primary'>Tedd kosárba</a>
                <a href='index.php?kategoria=$kategoria_id' class='btn btn-secondary'>Több termék ilyen kategóriában</a>
                </div>
              </div>
            </div>";  

            }
    }
}


function getMarkak(){
    global $conn;
    $select_markak = "SELECT * FROM markak";
                        $result_markak = mysqli_query($conn, $select_markak);                                                
                        while($row_markak = mysqli_fetch_array($result_markak)){
                            $marka_nev = $row_markak['marka_nev'];
                            $marka_id = $row_markak['marka_id'];
                            echo "<li><a class='dropdown-item text-light bg-secondary' href='index.php?marka=$marka_id'>$marka_nev</a></li>";
                        }     
}

function getKategoriak(){
    global $conn;
    $select_kategoriak = "SELECT * FROM kategoriak";
                            $result_kategoriak = mysqli_query($conn, $select_kategoriak);                                                
                            while($row_kategoriak = mysqli_fetch_array($result_kategoriak)){
                                $kategoria_nev = $row_kategoriak['kategoria_nev'];
                                $kategoria_id = $row_kategoriak['kategoria_id'];
                                echo "<li><a class='dropdown-item text-light bg-secondary' href='index.php?kategoria=$kategoria_id'>$kategoria_nev</a></li>";
                            }                        
}

function termekKereses(){
    global $conn;
    if(isset($_GET["termek_kereses"])){
        $keresett_termek=$_GET['kereses'];
        $search_query = "SELECT * FROM `termekek` WHERE termek_kulcsszo LIKE '%$keresett_termek%'";
        $result_query = mysqli_query($conn, $search_query);
        $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows < 1){
                echo "<h2 class='text-center text-danger'> Ilyen kulcsszóval rendelkező termék jelenleg nincsen webáruházunkban és raktáron sem.</h2>";
            }
        while($row = mysqli_fetch_array($result_query)){
            $termek_id = $row['termek_id'];
            $termek_nev = $row['termek_nev'];
            $termek_leiras = $row['termek_leiras'];
            $termek_id_kulcsszo = $row['termek_kulcsszo'];
            $kategoria_id = $row['kategoria_id'];
            $marka_id = $row['marka_id'];
            $termek_kep = $row['termek_kep'];
            $termek_ar = $row['termek_ar'];

            echo "<div class='col-md-4 mb-5'>
            <div class='card'>
            <img src='./termek_kepek/$termek_kep' class='card-img-top' alt='$termek_nev''>
            <div class='card-body'>
                <h5 class='card-title'>$termek_nev</h5>
                <p class='card-text'>$termek_leiras</p>
                <p class='card-text'>$termek_ar</p>
                <a href='index.php?kosarba=$termek_id' class='btn btn-primary'>Tedd kosárba</a>
                <a href='index.php?kategoria=$kategoria_id' class='btn btn-secondary'>Több termék ilyen kategóriában</a>
            </div>
            </div>
        </div>";  

        }
    }
        
}

function footer(){
  echo "<div class='bg-dark p-0 mx-0 text-center footer'>
  <p id='labjegyzet'>Elérhetőségek -> Tel.: 06306682833 || Email: bodoruben99@gmail.com || Helyszín: 6726, Szeged, kitalált utca 43/a</p>
  </div>";
}  


function kosar(){
  if(isset($_SESSION["felhasznalo_id"])){
    if(isset($_GET["kosarba"])){
      global $conn;
      $id = $_SESSION["felhasznalo_id"];
      $get_termek_id = $_GET["kosarba"];
      
      $select_query = "SELECT * FROM `kosar` WHERE felhasznalo_id = '$id' AND termek_id = $get_termek_id";
      $result_query = mysqli_query($conn, $select_query);
      $num_of_rows = mysqli_num_rows($result_query);
  
      if($num_of_rows > 0){
        echo "<script>alert('Ez a termék már a kosárban van')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
      } else {      
        $insert_query = "INSERT INTO `kosar` (termek_id, felhasznalo_id, mennyiseg, datum) VALUES ($get_termek_id, '$id', 1, NOW())";
        mysqli_query($conn, $insert_query);
  
        echo "<script>alert('Termék sikeresen hozzáadva a kosárhoz')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
      }
    }
  }else{
    
  }
  
}

function termek_mennyiseg(){
  global $conn;
  if(isset($_SESSION["felhasznalo_id"])){
    $id = $_SESSION["felhasznalo_id"];
    $get_termek_id = isset($_GET["kosarba"]) ? $_GET["kosarba"] : null;
  
    $select_query = "SELECT SUM(mennyiseg) AS total_mennyiseg FROM `kosar` WHERE felhasznalo_id = '$id'";
    $result_query = mysqli_query($conn, $select_query);

    if($result_query){
      $row = mysqli_fetch_array($result_query);
      $total_mennyiseg = $row['total_mennyiseg'];
      echo $total_mennyiseg;
    }
  }
  else{

  }
  
}


function osszeg(){
  global $conn;
  if(isset($_SESSION["felhasznalo_id"])){
    $id = $_SESSION["felhasznalo_id"];
    $osszertek = 0;
    $select_query = "SELECT * FROM `kosar` WHERE felhasznalo_id = '$id'";
    $result_query = mysqli_query($conn, $select_query);
    while ($row = mysqli_fetch_array($result_query)) {
      $termek_id = $row["termek_id"];
      $mennyiseg = $row["mennyiseg"];
      $termekek_kivalaszt = "SELECT * FROM `termekek` WHERE termek_id = '$termek_id'";
      $termekek_res = mysqli_query($conn, $termekek_kivalaszt);
      while ($row_termek_ar = mysqli_fetch_array($termekek_res)) {
        $termek_ar = array($row_termek_ar['termek_ar']);
        $termek_osszar = array_sum($termek_ar) * $mennyiseg;
        $osszertek += $termek_osszar;
      }
    }
    echo $osszertek;
  }
  
}








?>