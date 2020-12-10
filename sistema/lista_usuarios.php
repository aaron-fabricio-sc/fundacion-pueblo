<?php
    include "privacidad.php";

  if($_SESSION['rol'] !=1){
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
    <title>Registro de usuario</title>
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
                    <li> <a href="registro_personal.php"><span class="icon-pencil2"></span>AGREGAR USUARIO</a></li>
                    <li> <a href="menu_navegacion.php"><span class="icon-home"></span></span>MENU PRINCIPAL</a></li> </div>
               
          </ul>
        </nav>
  </header>
    <div class="contenedor1">
            <h2 class="titulo">LISTA DE USUARIO</h2>
            <div class="tablas">
                <table> 
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Rol</th>
                        <th>Acciones</th>                   
                    </tr>
                <?php  
                        $query = mysqli_query($conection, "SELECT u.idusuario, u.nombre, u.usuario,r.rol 
                        FROM usuarios u INNER JOIN rol r ON u.rol = r.idrol WHERE estatus = 1");
                        $result = mysqli_num_rows($query);
                        if($result > 0){
                            while( $data = mysqli_fetch_array($query)){
                 ?>
                <tr>
                        <td><?php echo $data ["idusuario"];?></td>
                        <td><?php echo $data ["nombre"];?></td>
                        <td><?php echo $data ["usuario"];?></td>
                        <td><?php echo $data ["rol"];?></td>
                        <td>
                            <a  class="link_add" href="editar_usuario.php? id=<?php echo $data ["idusuario"];?>">Editar</a>
                          <?php if($data['idusuario'] !=1){

                           ?>   
                            |
                            <a  class="link_delete" href="eliminar.php? id=<?php echo $data ["idusuario"];?>">Eliminar</a>
                       <?php }?>
                        </td>

                   <?php                         

                            }                
                        }
               
                    ?>



                    
                    
                        
                
                </table>
                    </div>
             
    </div>
               <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/formulario.js"></script>
    <script src="js/particles.js"></script>
    <script src="js/app.js"></script>
</body>
</html>