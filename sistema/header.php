<?php   

?>
<div class="header">
<h1>Universidad Boliviana De Informatica</h1>
<p>Sede El Alto-Bolivia </p>
    
<p > Usuario:<span class="user"> <?php  echo $_SESSION['user'];?></span></p>
<p > Rol:<span class="user"> <?php   echo $_SESSION['rol'];?></span></p>
<a href="salir.php" class="salir"><span class="icon-home"></span>SALIR</a>

</div>