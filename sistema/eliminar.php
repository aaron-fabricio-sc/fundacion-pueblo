<?php

    include "privacidad.php";
    if($_SESSION['rol'] !=1){
        header('location: menu_navegacion.php');
    } 
    include "../conexion.php";

    if(!empty($_POST))
    {
        if($_POST['idusuario']==1){
            header("location: lista_usuarios.php");
            exit;
        }
        $idusuario= $_POST['idusuario'];
        //$query_delete= mysqli_query($conection,"DELETE FROM usuarios WHERE idusuario =$idusuario");
         $query_delete = mysqli_query($conection,"UPDATE usuarios SET estatus = 0 WHERE idusuario =$idusuario ");
        if($query_delete){
            $alert='<p class="msg_save">Eliminacion completa.</p>';
        }else{
            $alert='<p class="msg_error">Sin exito</p>';
        }

    }





    /*verificar*/
    if(empty($_REQUEST['id']) ||$_REQUEST['id'] == 1)
    {
        header("location: lista_usuarios.php");
    }else{
        
        $idusuario=$_REQUEST['id'];
        $query= mysqli_query($conection,"SELECT u.nombre,u.usuario,r.rol FROM usuarios u
                                        INNER JOIN rol r ON u.rol = r.idrol WHERE u.idusuario = $idusuario");
        $result= mysqli_num_rows($query);
        if($result >0){
            while ($data = mysqli_fetch_array($query)){
                $nombre=$data['nombre'];
                $usuario=$data['usuario'];
                $rol=$data['rol'];
            }
        }else{
            header("location: lista_usuarios.php");
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
    <title>Eliminar usuario</title>
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
                    <li> <a href="registro_personal.php"><span class="icon-user"></span>AGREGAR USUARIO</a></li>
                    <li> <a href="menu_navegacion.php"><span class="icon-home"></span></span>MENU PRINCIPAL</a></li> </div>
               
          </ul>
        </nav>


    </header>
    <div class="contenedor1">
            <h2 class="titulo">ELIMINAR USUARIO </h2>
            
             <div class="eliminar"> 
             <div class="alert"><?php  echo isset($alert) ? $alert : '
                '; ?></div>
                <h3> Seguro que desea eliminar el siguiente registro?</h3>
                <p>nombre: <span><?php echo $nombre; ?></span></p>
                <p>usuario: <span><?php echo $usuario; ?></span></p>
                <p>Tipo de usuario: <span><?php echo $rol; ?></span></p>
             
                <form method="post" action="">
                    <input type="hidden" name="idusuario" value="<?php echo $idusuario;?>">
                    
                    
                    <input type="submit"  value="Eliminar" class="boton">
                    <div>
                             <a class="atras"href="lista_usuarios.php">Atras</a>
                     </div>                
                </form>
             </div>
             
    </div>
               <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/formulario.js"></script>
   
</body>
</html>