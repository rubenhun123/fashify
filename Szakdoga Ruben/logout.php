
<?php
    include("./include/connect.php");
    
    $_SESSION = [];
    session_unset();
    session_destroy();
    echo "Sikeres kijelentkezés!";    
    echo '<script>window.setTimeout(function(){ window.location.href = "index.php"; }, 500);</script>';          
    
?>