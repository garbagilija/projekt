<?php
include_once 'db.php';
?>
<!doctype html>
<html>
<head>
     <title>Login</title>
</head>
<body>

     <form action="" method="post">
         <div class='container'>
          <label>Korisnicko ime:</label><input type="text" name="korisnicko_ime" placeholder="Korisnicko ime"><br/>
          <label>Lozinka:</label><input type="password" name="lozinka" placeholder="Lozinka"><br/>
          <input type="submit" value="Login" name="submit"><br/>

     </div>

     <form action="prikaz_tablice.php" method ="post">
         <div class='container'>
          <input type=button onClick="parent.location='neregistrirani.php'" value='Nastavi neregistriran'>

     </form>
     <?php

     if(isset($_POST["submit"])){
          if(!empty($_POST['korisnicko_ime']) && !empty($_POST['lozinka'])){
               $korisnicko_ime = $_POST['korisnicko_ime'];
               $lozinka = $_POST['lozinka'];

               $query = mysqli_query($conn, "SELECT * FROM korisnik WHERE korisnicko_ime='".$korisnicko_ime."' AND lozinka='".$lozinka."'");
               $numrows = mysqli_num_rows($query);
               if($numrows !=0)
               {
                    while($row = mysqli_fetch_assoc($query))
                    {
                         $dbkorisnicko_ime=$row['korisnicko_ime'];
                         $dblozinka=$row['lozinka'];
                         $uloga=$row['tip_id'];
                    }
                    if($korisnicko_ime == $dbkorisnicko_ime && $lozinka == $dblozinka )
                    {
                         session_start();
                         $_SESSION['korisnik_sesije']=$korisnicko_ime;
//Redirect Browser

                         switch($uloga){
                              case 0:
                              header('location: admin.php');
                              break;
                              case 1:
                              header('location: voditelj.php');
                              break;
                              case 2:
                              header('location: Korisnici.php');
                              break;
                              




                         }

                    }

               }
          }
     }
     ?>


</body>
</html>