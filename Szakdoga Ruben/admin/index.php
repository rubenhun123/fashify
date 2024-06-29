<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin</title>
    <link rel="stylesheet" href="../css/style.css">    
</head>
<body>
    <div class="container-fluid p-0 bg-dark">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">                
            </div>
        </nav>

        <div class="bg-dark">
            <h3 class="text-center p-2" id="labjegyzet">Admin kezelőfelület</h3>
        </div>

        <div class="row">
            <div class="col-md-12 bg-dark p-1 d-flex align-items-center">
                <div class="p-2">
                    <a href="#"><img src="../kepek/logo.png" alt="" class="admin-image"></a>
                    <p class="text-light text-center">Admin</p>
                </div>
                <div class="button text-center">
                    
                    <button><a href="index.php?kategoriak_beillesztese" class="nav-link text-dark bg-light my-1">Kategóriák hozzáadása</a></button>
                    <button><a href="index.php?markak_beillesztese" class="nav-link text-dark bg-light my-1">Márkák hozzáadása</a></button>
                    <button><a href="index.php?termekek_beillesztese" class="nav-link text-dark bg-light my-1">Termékek hozzáadása</a></button>
                    <button><a href="index.php?termek_mod" class="nav-link text-dark bg-light my-1">Termékek módosítása</a></button>
                    <button><a href="index.php?termek_del" class="nav-link text-dark bg-light my-1">Termékek törlése</a></button>
                    <button><a href="index.php?kategoriak_mod" class="nav-link text-dark bg-light my-1">Kategóriák módosítása</a></button>
                    <button><a href="index.php?kategoriak_del" class="nav-link text-dark bg-light my-1">Kategóriák törlése</a></button>
                    <button><a href="index.php?markak_mod" class="nav-link text-dark bg-light my-1">Márkák módosítása</a></button>
                    <button><a href="index.php?markak_del" class="nav-link text-dark bg-light my-1">Márkák törlése</a></button>
                    <button><a href="index.php?termekek" class="nav-link text-dark bg-light my-1">Termékek</a></button>
                    <button><a href="index.php?megrendelesek" class="nav-link text-dark bg-light my-1">Megrendelések</a></button>
                    <button><a href="index.php?fizetesek" class="nav-link text-dark bg-light my-1">Fizetések</a></button>
                    <button><a href="index.php?felhasznalok" class="nav-link text-dark bg-light my-1">Felhasználók</a></button>
                    <button><a href="logout.php" class="nav-link text-dark bg-light my-1">Kijelentkezés</a></button>
                </div>
            </div>
        </div>
    </div>


    <div class="container my-3">
        <?php

        if(isset($_SESSION["felhasznalo_id"])){
            $id = $_SESSION["felhasznalo_id"];
        }
       

        if(isset($_GET['termekek_beillesztese'])){
            include('termekek_beillesztese.php');
        }
        if(isset($_GET['kategoriak_beillesztese'])){
            include('kategoriak_beillesztese.php');
        }
        if(isset($_GET['markak_beillesztese'])){
            include('markak_beillesztese.php');
        }
        if(isset($_GET['termek_mod'])){
            include('termek_mod.php');
        }
        if(isset($_GET['termek_del'])){
            include('termek_del.php');
        }
        if(isset($_GET['kategoriak_mod'])){
            include('kategoriak_mod.php');
        }
        if(isset($_GET['kategoriak_del'])){
            include('kategoriak_del.php');
        }
        if(isset($_GET['markak_mod'])){
            include('markak_mod.php');
        }
        if(isset($_GET['markak_del'])){
            include('markak_del.php');
        }
        if(isset($_GET['termekek'])){
            include('termekek.php');
        }
        if(isset($_GET['felhasznalok'])){
            include('felhasznalok.php');
        }
        if(isset($_GET['megrendelesek'])){
            include('megrendelesek.php');
        }
        if(isset($_GET['fizetesek'])){
            include('fizetesek.php');
        }
        
        ?>
    </div>
        
<?php    
    include("../function/common_function.php");
    footer();
?>
   
    

</body>
</html>