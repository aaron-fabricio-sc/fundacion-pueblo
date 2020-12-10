<?php
    include "privacidad.php";
    if($_SESSION['rol'] ==3){
        header('location: menu_navegacion.php');
    }  
    include "../conexion.php";
    if(!empty($_POST))
    {
        $alert='';
        if(empty($_POST['cod_materia']) || empty($_POST['nombre_materia']) || empty($_POST['gestion']))
        {
            $alert='<p class="msg_error">Todos los campos son obligatorios</p>';
        }else{
            
                $carrera=$_POST['carrera'];
                $nombre=$_POST['cod_materia'];
                $usuario=$_POST['nombre_materia'];

                $tipo=$_POST['gestion'];

                }
                    $query_insert= mysqli_query($conection,"INSERT INTO materias(cod_materia,carrera,materia,gestion) 
                                                            VALUES ('$nombre','$carrera','$usuario','$tipo')");
                if($query_insert){
                    $alert='<p class="msg_save">Materia creado correctamente.</p>';

                }else{
                    $alert='<p class="msg_error"> Error al crear el Materia.</p>';
                }
            
            



        }
    
    
    



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="cssb/bootstrap.min.css">

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximun-scale=1.0,minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="iconos/style.css">
    <title>Registro de materias </title>
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
                
 
                
                    <li> <a href="menu_navegacion.php"><span class="icon-home"></span>ATRAS</a></li> </div>
               
          </ul>
        </nav>


    </header>
    

    <div class="contenedor1">
            <h2 class="titulo">REGISTRO DE MATERIAS </h2>
      
             <form  class="form1"action="" method="post" >
             <div class="alert"><?php  echo isset($alert) ? $alert : ''; ?></div>
                         
                        <?php
                        $sistemas="Ingenieria en sistemas";
                        $conta="Contaduria";
                        $arqui="Arquitectura";
                        ?>
                                  <label for="" class="label_for1">CARRERA</label>
                       <select name="carrera" id="" class="input_form1">
                        <option value="<?php echo $sistemas ;?>"><?php echo $sistemas ;?></option>
                        <option value="<?php echo $conta ;?>"><?php echo $conta;?></option>
                        <option value="<?php echo $arqui ;?>"><?php echo $arqui ;?></option>
                       
                       
                    
                       </select>
                    
                    <br />
                         <label for="USUARIO" class="label_for1">COD MATERIA :</label>
                         <input type="text"name="cod_materia" id="USUARIO" class="input_form1">
                         <BR />
                         <label for="CLAVE" class="label_for1">NOMBRE DE LA MATERIA</label>
                         <input type="text" name="nombre_materia" id="CLAVE" class="input_form1">   
                         <BR /> 
                         
                         <label for="TIPO_USUARIO" for="gestion" class="label_for1">AÑO</label>

                        <select name="gestion" id="gestion" class="input_form1">
                            <option value="1er año">1er año</option>
                            <option value="2do año">2do año</option>
                            <option value="3er año">3er año</option>
                            <option value="4to año">4to año</option>
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