<?php
    include "privacidad.php";
    if($_SESSION['rol'] ==3){
        header('location: menu_navegacion.php');
    }  
    
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
    <title>Lista de Docentes</title>
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
                
      
               <li> <a href="registro_de_docente.php"><span class="icon-user"></span>AGREGAR DOCENTE</a></li>
                   
                   
                    <li> <a href="menu_navegacion.php"><span class="icon-home"></span></span>MENU PRINCIPAL</a></li> </div>
               
          </ul>
        </nav>


    </header>
    

    <div class="contenedor1">
            <h2 class="titulo">LISTA DE DOCENTEs</h2>
            <div class="tablas">
                <table> 
                    <tr>
                        <th>COD</th>
                        <th>Nombre</th>
                        <th>1er Apellido</th>
                        <th>2do Apellido</th>
                        <th>Especialidad</th>    
                        <th>Acciones</th>                 
                    </tr>
                    <?php    
                    //paginador
                    $sql_registe= mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM docente WHERE estatus = 1 ");
                    $result_register =mysqli_fetch_array($sql_registe);
                    $total_registro =$result_register['total_registro'];
                    
                    $por_pagina = 5;

                    if(empty($_GET['pagina'])){
                        $pagina=1;
                    }else{
                        $pagina=$_GET['pagina'];
                    }
                    $desde =($pagina-1) * $por_pagina;
                    $total_paginas= ceil($total_registro / $por_pagina);
                    ?>
                <?php   
                        
                        $query = mysqli_query($conection, "SELECT cod,nombre,primer_apellido,segundo_apellido,especialidad
                        FROM docente   WHERE estatus = 1 ORDER BY cod ASC LIMIT $desde,$por_pagina");
                    
                        $result = mysqli_num_rows($query);
                        mysqli_close($conection);
                        if($result > 0){
                            while( $data = mysqli_fetch_array($query)){
                 ?>
                <tr>
                        <td><?php echo $data ["cod"];?></td>
                        <td><?php echo $data ["nombre"];?></td>
                        <td><?php echo $data ["primer_apellido"];?></td>
                        <td><?php echo $data ["segundo_apellido"];?></td>
                        <td><?php echo $data ["especialidad"];?></td>
                        <td>
                            <a  class="link_add" href="editar_docente.php? id=<?php echo $data ["cod"];?>">Editar</a>
                         

                       
                            |
                            <a  class="link_delete" href="eliminar_docente.php? id=<?php echo $data ["cod"];?>">Eliminar</a>
                      
                        </td>

                   <?php                         

                            }                
                        }
                    
               
                    ?>



                    
                    
                        
                
                </table>
                </div>
                     <div class="paginador"> 
                    <ul>
                    <?php  
                        if($pagina !=1)
                        {
                    ?>
                        <li><a href="?pagina=<?php echo 1; ?>">|<<</a></li>
                        <li><a href="?pagina=<?php echo $pagina-1; ?>"><<<</a></li>
                      <?php 
                      }
                        for($i=1; $i <= $total_paginas; $i++)
                                if($i == $pagina)
                                {
                                    echo '<li class="sele">'.$i.'</li>';
                                }else{
                                    echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
                                }

                            
                                if($pagina !=$total_paginas)
                                {
                        
                      ?>

                        <li><a href="?pagina=<?php echo +1; ?>">>>></a></li>
                        <li><a href="?pagina=<?php echo $total_paginas; ?>">>>|</a></li>
                                <?php  } ?>
             
    </div>
               <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/formulario.js"></script>
</body>

</html>