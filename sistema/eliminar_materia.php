<?php
    include "privacidad.php";
    if($_SESSION['rol'] ==3){
        header('location: menu_navegacion.php');
    }  
    include "../conexion.php";

    if(!empty($_POST))
    {
        $alert='';
        $cod= $_POST['id'];
        //$query_delete= mysqli_query($conection,"DELETE FROM usuarios WHERE idusuario =$idusuario");
         $query_delete = mysqli_query($conection,"UPDATE materias SET estatus = 0 WHERE cod_materia ='$cod' ");
        if($query_delete){
            header("location: lista_materias_total.php");
        }else{
            $alert='<p class="msg_error">Sin exito</p>';
        }

    }





    /*verificar*/
    if(empty($_REQUEST['id']))
    {
        header("location: menu_navegacion.php");
    }else{
        
        $cod=$_REQUEST['id'];
        $query= mysqli_query($conection,"SELECT * FROM materias WHERE cod_materia='$cod' ");
        $result= mysqli_num_rows($query);
        if($result >0){
            while ($data = mysqli_fetch_array($query)){
               
                $gestion=$data['gestion'];
                $carrera=$data['carrera'];
                $materia=$data['materia'];
        
            }
        }else{
         echo "error";
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
            <h2 class="titulo">ELIMINAR MATERIA </h2>
            
             <div class="eliminar"> 
             <div class="alert"><?php  echo isset($alert) ? $alert : ''; ?></div>
                <h3> Seguro que desea eliminar el siguiente registro?</h3>
                <p> COD: <span><?php echo $cod; ?></span></p>
                <p>Carrera: <span><?php echo $carrera; ?></span></p>
                <p>Materia: <span><?php echo $materia; ?></span></p>
                <p>Gestion: <span><?php echo $gestion ?></span></p>
             
                <form method="post" action="">
                    <input type="hidden" name="id" value="<?php echo $cod;?>">
                    
                    <a href="lista_materias_total.php" class="btn_cancelar">Cancelar</a>
                    <input type="submit"  value="Eliminar" class="boton">
                </form>
             </div>
             
    </div>
               <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/formulario.js"></script>
</body>
</html>