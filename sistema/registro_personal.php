<?php
    include "privacidad.php";
if($_SESSION['rol'] !=1){
    header('location: menu_navegacion.php');
}

    include "../conexion.php";
    if(!empty($_POST))
    {
        $alert='';
        if(empty($_POST['nombre']) || empty($_POST['usuario']) || empty($_POST['clave']) || empty($_POST['tipo']))
        {
            $alert='<p class="msg_error">Todos los campos son obligatorios</p>';
        }else{
            

                $nombre=$_POST['nombre'];
                $usuario=$_POST['usuario'];
                $clave=md5($_POST['clave']);
                $tipo=$_POST['tipo'];

                $query= mysqli_query($conection,"SELECT * FROM usuarios WHERE usuario ='$usuario'");
                $result = mysqli_fetch_array($query);
                if($result>0){
                    $alert='<p class="msg_error"> El usuario ya existe.</p>';
                
                }else{
                    $query_insert= mysqli_query($conection,"INSERT INTO usuarios(nombre,usuario,codigo,rol) 
                                                            VALUES ('$nombre','$usuario','$clave','$tipo')");
                if($query_insert){
                    $alert='<p class="msg_save">Usuario creado correctamente.</p>';

                }else{
                    $alert='<p class="msg_error"> Error al crear el usuaario.</p>';
                }
            
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
    <title>Registro de personal</title>
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
                
 
                    <li> <a href="lista_usuarios.php"><span class="icon-users"></span>LISTA DE USUARIOS</a></li>
                    <li> <a href="menu_navegacion.php"><span class="icon-home"></span>MENU PRINCIPAL</a></li> </div>
               
          </ul>
        </nav>


    </header>
    

    <div class="contenedor1">
            <h2 class="titulo">REGISTRO DE USUARIOS </h2>
      
             <form  class="form1"action="" method="post" >
             <div class="alert"><?php  echo isset($alert) ? $alert : ''; ?></div>
                         <label for="NOMBRES" class="label_for1">NOMBRE :</label>
                         <input type="text" name="nombre" id="NOMBRES" class="input_form1">
                         <BR />
                               
                         <label for="USUARIO" class="label_for1">USUARIO :</label>
                         <input type="text"name="usuario" id="USUARIO" class="input_form1">
                         <BR />
                         <label for="CLAVE" class="label_for1">CLAVE:</label>
                         <input type="password" name="clave" id="CLAVE" class="input_form1">   
                         <BR /> 
                         
                         <label for="TIPO_USUARIO" class="label_for1">TIPO USUARIO:</label>


                        <?php
                            $query_rol = mysqli_query($conection,"SELECT * FROM rol");
                            $result_rol = mysqli_num_rows($query_rol);

                        ?>

                         <select class="input_form1"  id="rol" name="tipo">
                             <?php
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
                         <input type="submit"  value="REGISTRAR" class="boton">
                    </form>
             
               </div>
               <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/formulario.js"></script>
    <script src="js/particles.js"></script>
    <script src="js/app.js"></script>
</body>
</html>