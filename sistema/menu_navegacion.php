<?php include "privacidad.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu de navegación UBI</title>
    <link rel="stylesheet" href="cssb/bootstrap.min.css">
     <link rel="stylesheet" href="css/style.css">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximun-scale=1.0,minimum-scale=1.0">
        <link rel="stylesheet" href="iconos/style.css">
</head>
<body> 
    
    <?php include "header.php"?>
           <div class ="imagen">
            <img src="img/logo.jpg">
            </div> 
            <header>
        <div class="menu">
          <a href="#" class="btn"><span class="icon-list"></span>Menu</a>      
        </div>
        <nav >
                <ul>
                <?php 
                    if($_SESSION['rol']!=1){
                    }else{
     
                ?>
                <li class="submenu"> 
                <a href="#"><span class="icon-unlocked"></span>PERSONAL</a>
                <ul class="listado">
                       <li ><a href="registro_personal.php">REGISTRO PERSONAL<span class="icon-key"></span></a></li>
                       <li><a href="lista_usuarios.php">LISTA USUARIOS<span class="icon-users"></span></a></li>
                    
                        </ul>
                        </li>                       
                        <?php   }
                        ?>
                         <?php 
                            if($_SESSION['rol']==3){

                            }else{
                         
                         ?>               
                    <li class="submenu">
                     <a href="#"><span class="icon-user"></span>DOCENTES</a>
                     
                     <ul class="listado">
                       <li ><a href="registro_de_docente.php">REGISTRO DOCENTE<span class="icon-unlocked"></span></a></li>
                       <li><a href="lista_docentes.php">LISTA DOCENTES<span class="icon-users"></span></a></li>
                    
                        </ul>
                     
                     </li>
                     <?php } ?>

                    <?php 
                                if($_SESSION['rol']==3){ ?>
                                    <li><a href="lista_estudiantes_total.php">LISTA DE ALUMNOS<span class="icon-users"></span></a></li>
                           <?php     }else{  
                                
                                ?>
                    <li class="submenu"><a href="#"><span class="icon-pencil2"></span>ESTUDIANTES</a>
                     <ul class="listado">
                      
                       <li ><a href="registro_alumnos.php">REGISTRO DE ALUMNOS<span class="icon-pencil2"></span></span></a></li>
                       <li><a href="lista_estudiantes_total.php">LISTA DE ALUMNOS<span class="icon-users"></span></a></li>
                    
                        </ul>
                           <?php  } ?>
                    </li>
                    <li class="submenu">
                        <a href="#"><span class="icon-folder-open"></span> CARRERAS</a>
                        <ul class="listado">
                       <li ><a href="ingenieria_en_sistemas.php">INGENIERIA EN SISTEMAS<span class="icon-pushpin"></span></a></li>
                       <li><a href="contaduria.php">CONTADURIA<span class="icon-pushpin"></span></a></li>
                       <li><a href="arquitectura.php">ARQUITECTURA<span class="icon-pushpin"></span></a></li>
                        </ul>
                    </li>

                    <?php 
                                if($_SESSION['rol']==3){ ?>
                                    <li><a href="lista_materias_total.php">LISTA DE MATERIAS<span class="icon-users"></span></a></li>
                           <?php     }else{  
                                
                                ?>
                    <li class="submenu"><a href="#"><span class="icon-lab"></span> MATERIAS</a>
                    
                    
                      
                    <ul class="listado">
                       <li ><a href="agregar_materia.php">REGISTRO DE MATERIAS<span class="icon-pencil2"></span></span></a></li>
                       <li><a href="lista_materias_total.php">LISTA DE MATERIAS<span class="icon-users"></span></a></li>
                    
                        </ul>
                        <?php  } ?>
                    
                    </li>
                </ul>
        </nav>
    </header>
         
    <script src="js/jquery-3.4.0.min.js"></script>

    <script src="js/formulario.js"></script>
    <script src="js/particles.js"></script>
    <script src="js/app.js"></script>
</body>
</html>