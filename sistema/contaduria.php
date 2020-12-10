
<?php
    include "privacidad.php";
    include "../conexion.php";

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximun-scale=1.0,minimum-scale=1.0">
    <link rel="stylesheet" href="cssb/bootstrap.min.css">
     <link rel="stylesheet" href="css/style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="iconos/style.css">
    <title>Contadurira</title>
</head>
<body>

<?php include "header.php"?>
<div class ="imagen">
            <img src="img/logo.jpg" width="200px">
            </div>
<header>
    <h1 class="titulo">CONTADURIA</h1>
        <div class="menu">
                <a href="#" class="btn"><span class="icon-list"></span>Menu</a>  
                  
              </div>
    <nav>
        <ul>
            <li><a href="lista_estudiantes_conta.php? id='lista_estudiantes_conta'"><span class="icon-pencil2"></span>LISTA DE ESTUDIANTES</a></li>
            <li class="submenu">
            <a href="notas_contaduria.php"><span class="icon-folder-open"></span> NOTAS ESTUDIANTES</a>
           
        </li>
            <li><a href="lista_materias_conta.php"><span class="icon-lab"></span>MATERIAS</a></li>
   
            <li><a href="menu_navegacion.php" ><span class="icon-undo"></span>ATRAS</a></li>
        </ul>
    </nav> 
</header>

<script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/formulario.js"></script>
    
</body>
</html>