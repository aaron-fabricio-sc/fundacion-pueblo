<?php
    include "privacidad.php";
    include "../conexion.php";

    if(!empty($_POST))
    {
        
        $id= $_POST['id'];
        //$query_delete= mysqli_query($conection,"DELETE FROM usuarios WHERE idusuario =$idusuario");
         $query_delete = mysqli_query($conection,"UPDATE estudiantes SET estatus = 0 WHERE id =$id ");
        if($query_delete){
            $alert='<p class="msg_save">Eliminacion completa.</p>';
        }else{
            $alert='<p class="msg_error">Sin exito</p>';
        }

    }





    /*verificar*/
    if(empty($_REQUEST['id']) ||$_REQUEST['id'] == 1)
    {
        header("location: lista_estudiantes_sistemas.php");
    }else{
        
        $id=$_REQUEST['id'];
        $query= mysqli_query($conection,"SELECT nombre, ap_paterno, ap_materno FROM estudiantes WHERE id = $id");
        $result= mysqli_num_rows($query);
        if($result >0){
            while ($data = mysqli_fetch_array($query)){
               
                $nombre=$data['nombre'];
                $ap_paterno=$data['ap_paterno'];
                $ap_materno=$data['ap_materno'];
        
            }
        }else{
            header("location: lista_estudiantes_sistemas.php");
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
    <title>Eliminar Estudiante</title>
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
                
      
             
               
                  
                    <li> <a href="menu_navegacion.php"><span class="icon-home"></span></span>MENU PRINCIPAL</a></li> </div>
               
          </ul>
        </nav>


    </header>
    

    <div class="contenedor1">
            <h2 class="titulo">ELIMINAR ESTUDIANTE </h2>
            
             <div class="eliminar"> 
                <h3> Seguro que desea eliminar el siguiente registro?</h3>
                <div class="alert"><?php  echo isset($alert) ? $alert : '
                '; ?></div>
                <p>ID: <span><?php echo $id; ?></span></p>
                <p>nombre: <span><?php echo $nombre; ?></span></p>
                <p>1ER Apellido: <span><?php echo $ap_paterno; ?></span></p>
                <p>2Do Apellido: <span><?php echo $ap_materno; ?></span></p>
             
                <form method="post" action="">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    
                    <a href="lista_estudiantes_total.php" class="atras">Cancelar</a>
                    <input type="submit"  value="Eliminar" class="boton">
                </form>
             </div>
             
    </div>
               <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/formulario.js"></script>
    
</body>
</html>