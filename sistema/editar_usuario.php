<?php


    include "privacidad.php";
    if($_SESSION['rol'] !=1){
        header('location: menu_navegacion.php');
    } 
    include "../conexion.php";
    if(!empty($_POST))
    {
        $alert='';
        if(empty($_POST['nombre']) || empty($_POST['usuario']) || empty($_POST['rol']))
        {
            $alert='<p class="msg_error">Todos los campos son obligatorios</p>';
        }else{
            
                $idusuario =$_POST["idusuario"];
                $nombre=$_POST['nombre'];
                $usuario=$_POST['usuario'];
                $clave=md5($_POST['clave']);
                $rol=$_POST['rol'];

                $query= mysqli_query($conection,"SELECT * FROM usuarios
                                                 WHERE (usuario ='$usuario' AND idusuario !=$idusuario)");
                $result = mysqli_fetch_array($query);
                if($result > 0){
                    $alert='<p class="msg_error"> El usuario ya existe.</p>';
                
                }else{
                    if(empty($_POST['clave'])){
                        $sql_update = mysqli_query($conection,"UPDATE usuarios SET nombre='$nombre',usuario='$usuario',rol='$rol' WHERE idusuario= $idusuario");
                    }else{
                        $sql_update = mysqli_query($conection,"UPDATE usuarios SET nombre='$nombre',usuario='$usuario', clave='$clave',rol='$rol WHERE idusuario= $idusuario");
                    }
                   
                if($sql_update){
                    $alert='<p class="msg_save">Usuario actualizado correctamente.</p>';

                }else{
                    $alert='<p class="msg_error"> Error al actualizar el usuario.</p>';
                }
            
            }



        }
    
    
    }

        /*MOSTRAR DATOS*/

        if(empty($_GET['id']))
        {
            header('location:lista_usuarios.php');
        }  
        $iduser = $_GET['id'];
        $sql = mysqli_query($conection, "SELECT u.idusuario, u.nombre, u.usuario, (u.rol) as idrol, (r.rol) as rol 
                                        FROM  usuarios u INNER JOIN rol r on u.rol = r.idrol WHERE idusuario= $iduser");
        
        $result_sql = mysqli_num_rows($sql);
        if($result_sql == 0){
            header('location: lista_usuarios.php');
            }else{
                $option='';
                while($data =mysqli_fetch_array($sql)){
                    $iduser = $data['idusuario'];
                    $nombre = $data['nombre'];
                    $usuario = $data['usuario'];
                    $idrol = $data['idrol'];
                    $rol = $data['rol'];


                    if($idrol == 1)
                    {
                        $option = '<option value="'.$idrol.'" select>'.$rol.'</option> ';
                    }else if($idrol == 2){
                        $option = '<option value="'.$idrol.'" select>'.$rol.'</option> ';
                    }else if($idrol == 3){
                        $option = '<option value="'.$idrol.'" select>'.$rol.'</option> ';
                    }
                }
            }
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
    <title>Actualizar usuario</title>
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
                
      
               <li> <a href="registro_de_docente.php"><span class="icon-user"></span>REGISTRO DE DOCENTE</a></li>
                    <li><a href="registro_de_alumnos.php"><span class="icon-pencil2"></span>REGISTRO DE ALUMNO</a></li>
                    <li> <a href="lista_usuarios.php"><span class="icon-user"></span>LISTA DE USUARIOS</a></li>
                    <li> <a href="menu_navegacion.php"><span class="icon-home"></span>MENU PRINCIPAL</a></li> </div>
               
          </ul>
        </nav>


    </header>
    

    <div class="contenedor1">
            <h2 class="titulo">ACTUALIZAR USUAIRO</h2>
      
             <form  class="form1"action="" method="post" >
             <div class="alert"><?php  echo isset($alert) ? $alert : ''; ?></div>
                    <input type="hidden" name="idusuario" id="idusuario" value="<?php echo $iduser; ?>">
                         <label for="NOMBRES" class="label_for1">NOMBRE :</label>
                         <input type="text" name="nombre" id="NOMBRES" class="input_form1" value=<?php echo $nombre;?>>
                         <BR />
                               
                         <label for="USUARIO" class="label_for1">USUARIO :</label>
                         <input type="text"name="usuario" id="USUARIO" class="input_form1" value=<?php echo $usuario;?>>
                         <BR />
                         <label for="CLAVE" class="label_for1">CLAVE:</label>
                         <input type="password" name="clave" id="CLAVE" class="input_form1">   
                         <BR /> 
                         
                         <label for="TIPO_USUARIO" class="label_for1">TIPO USUARIO:</label>


                        <?php
                            $query_rol = mysqli_query($conection,"SELECT * FROM rol");
                            $result_rol = mysqli_num_rows($query_rol);

                        ?>

                         <select class="noelemen"  id="rol" name="rol">

                             <?php
                                echo $option;
                                if($result_rol > 0)
                                {
                                    while ($rol = mysqli_fetch_array($query_rol)){
                              ?>
                                     <option value="<?php echo $rol["idrol"]; ?>"><?php echo $rol["rol"]?></option>   
                                
                                <?php
                                    }
                                }

                            ?>
                            
                         </select>
                         <BR />
                         <input type="submit"  value="Actualizar" class="boton">
                         <div>
                             <a class="atras"href="lista_usuarios.php">Atras</a>
                         </div>
                    </form>
             
               </div>
               <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/formulario.js"></script>
  
</body>
</html>