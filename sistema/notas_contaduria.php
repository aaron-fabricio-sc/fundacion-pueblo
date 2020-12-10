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

    <link rel="stylesheet" href="iconos/style.css">
    <title>Notas de estudiantes contaduria </title>
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
                
      
               <li> <a href="lista_estudiantes_conta.php"><span class="icon-user"></span>LISTA DE ESTUDIANTES</a></li>
                   
                   
                    <li> <a href="contaduria.php"><span class="icon-home"></span></span>ATRAS</a></li> </div>
               
          </ul>
        </nav>


    </header>
    

    <div class="contenedor1">
            <h2 class="titulo">NOTAS DE ESTUDIANTES</h2>


                <div class="tablas">
                <table> 
                    <tr>
                        <th>ID Estudiante</th>
                        <th>Nombre</th>
                        <th>1er Apellido</th>
                        <th>2do Apellido</th>
                        <th>Año</th>    
                        <th>Carrera</th>
                        <th>Materia</th>    
                        <th>Nota Final</th>      
                        <th>2da Instancia</th>  
                                      
                    </tr>
                    
                    
                  
                <?php   
                        
                        $query = mysqli_query($conection, "SELECT e.id,e.nombre,e.ap_paterno,e.ap_materno,e.gestion,n.carrera,n.promedio,n.segunda_instancia,n.materia,n.cod_nota
                        FROM estudiantes e INNER JOIN notas n ON e.id = n.estudiante WHERE e.carrera='CONT'" );
                        $result = mysqli_num_rows($query);
                        if($result > 0){
                            while( $data = mysqli_fetch_array($query)){
                 ?>
                        <tr>
                        <td><?php echo $data ["id"];?></td>
                        <td><?php echo $data ["nombre"];?></td>
                        <td><?php echo $data ["ap_paterno"];?></td>
                        <td><?php echo $data ["ap_materno"];?></td>
                        <td><?php echo $data ["gestion"];?></td>
                        <td><?php echo $data ["carrera"];?></td>
                        <td><?php echo $data ["materia"];?></td>
                        <td><?php echo $data ["promedio"];?></td>
                        <td><?php echo $data ["segunda_instancia"];?>
                        <?php
                        if( $data["segunda_instancia"] == "si"){
                                ?>
                                    |
                         <a  class="link_delete" href="segunda_instancia.php? id=<?php echo $data ["cod_nota"];?>">segunda instancia</a>
                           
                           <?php } ?>
                        
                        
                        
                        </td>
                      

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