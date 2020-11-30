<?php
    include "privacidad.php";
    include "../conexion.php";
    
    


?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="cssb/bootstrap.min.css">
     <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximun-scale=1.0,minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="iconos/style.css">
    <title>Lista de materias </title>
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
                
      
               <li> <a href="agregar_materia.php"><span class="icon-pencil2"></span>AGREGAR MATERIAS</a></li>
                   
                   
                    <li> <a href="menu_navegacion.php"><span class="icon-home"></span></span>ATRAS</a></li> </div>
               
          </ul>
        </nav>


    </header>
    

    <div class="contenedor1">
            <h2 class="titulo">LISTA DE MATERIAS </h2>
                
            <div class="tablas">
                <table> 

                
                    <tr>
                        <th>COD MATERIA</th>
                        <th>NOMBRE</th>
                        <th>AÑO</th>
                    
                   
                                      
                        <th>Acciones</th>  
                                   
                    </tr>
                    
                    
                  
                <?php   
                        
                        $query = mysqli_query($conection, "SELECT *
                        FROM materias WHERE estatus = 1 ORDER BY cod_materia ");
                        $result = mysqli_num_rows($query);
                        if($result > 0){
                            while( $data = mysqli_fetch_array($query)){
                 ?>
                        <tr>
                        <td><?php echo $data ["cod_materia"];?></td>
                        <td><?php echo $data ["materia"];?></td>
                        <td><?php echo $data ["gestion"];?></td>
                        <?php 
                            if($_SESSION['rol']==3){

                            }else{
                         
                         ?>  
                        <td>
                        
                    
                            
                            |
                            <a  class="link_add" href="editar_materia.php? id=<?php echo $data ["cod_materia"];?>">Editar</a>
                         

                       
                         |
                         <a  class="link_delete" href="eliminar_materia.php? id=<?php echo $data ["cod_materia"];?>"> Eliminar</a>
                      
                        </td>
                        <?php  } ?> 
                        </tr>
                   <?php                         

                            }                
                        }
                    
               
                    ?>



                    
                    
                        
                
                </table>
                </div>
                    
             
    </div>
               <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/formulario.js"></script>
</body>

</html>