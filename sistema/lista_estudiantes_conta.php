<?php
    include "privacidad.php";
    include "../conexion.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="cssb/bootstrap.min.css">
     <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximun-scale=1.0,minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="cssb/bootstrap.min.css">
    <link rel="stylesheet" href="iconos/style.css">
    <title>Lista de estudiantes contaduria </title>
    
</head>
<body>
    <?php include "header.php"?>
    <div class ="imagen">
            <img src="img/logo.jpg" width="200px">
            </div>
    <header>
            <div class="menu">
                    <a href="#" class="btn"><span class="icon-list"></span>Menu</a>  
                      
                  </div>
        <nav>
          <ul>
                
      
               <li> <a href="notas_contaduria.php"><span class="icon-pencil2"></span>NOTAS DE ESTUDIANTES</a></li>
                   
                   
                    <li> <a href="contaduria.php"><span class="icon-home"></span></span>ATRAS</a></li> </div>
               
          </ul>
        </nav>


    </header>
    

    <div class="contenedor1">
            <h2 class="titulo">LISTA DE ESTUDIANTES CONTADURIA</h2>
            <div class="container w-100">
            <input type="text" class=" buscador form-control float-right w-50 mb-3 "  name="busqueda"  id="busqueda" placeholder="buscar">


            </div>
            <div class="tablas" id="datosConta">
               
    </div>
               <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/formulario.js"></script>
</body>

</html>