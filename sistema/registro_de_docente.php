<?php
include "privacidad.php";

  if($_SESSION['rol'] ==3){
    header('location: menu_navegacion.php');
}  


include "../conexion.php";

    if(!empty($_POST))
    {
      
        $alert='';
        if(empty($_POST['nombre']) || empty($_POST['pr_ap']) || empty($_POST['seg_ap']) 
                                    || empty($_POST['ci']) ||  empty($_POST['depa']) || empty($_POST['especialidad']) ||  empty($_POST['fecha']) || empty($_POST['genero'])
                                    || empty($_POST['celular']))
                                    
                                   
        {
        
            $alert='<p class="msg_error">Todos los campos son obligatorios</p>';
        }else{
            

                $nombre=$_POST['nombre'];
                $ap_paterno=$_POST['pr_ap'];
                $ap_materno=$_POST['seg_ap'];
                $ci=$_POST['ci'];
                $depa=$_POST['depa'];
                $especialidad=$_POST['especialidad'];
                $fecha=$_POST['fecha'];
                $genero=$_POST['genero'];
                $fono=$_POST['celular'];
                
                

           
                    $query_insert= mysqli_query($conection,"INSERT INTO docente(nombre,primer_apellido,segundo_apellido,ci,departamento,especialidad,fecha_nacimiento,genero,celular) 
                                                            VALUES ('$nombre','$ap_paterno','$ap_materno','$ci','$depa','$especialidad','$fecha','$genero','$fono' )");
                
                if($query_insert){
                    $alert='<p class="msg_save">Docente creado correctamente.</p>';
                

                }else{
                    $alert='<p class="msg_error"> Error al crear el Docente.</p>';
                    
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
    <title>Registro de docente</title>
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
                
               
             <li> <a href="lista_docentes.php"><span class="icon-file-text2"></span>LISTA DE DOCENTES</a></li> 
            
           <li> <a href="menu_navegacion.php"><span class="icon-menu2"></span>MENU PRINCIPAL</a></li> 
        
          </ul>
        </nav>


    </header>
    

    <div class="contenedor1">
            <h2 class="titulo">REGISTRO DOCENTE</h2>
             <form  class="form1"action="" method="post" >
             <div class="alert"><?php  echo isset($alert) ? $alert : ''; ?></div>
             
                         <label for="NOMBRES" class="label_for1">NOMBRES :</label>
                         <input type="text"  id="NOMBRE" class="input_form1" name="nombre">
                         <BR />
                         <label for="AP_PATERNO" class="label_for1">PRIMER APELLIDO :</label>
                         <input type="text"  id="AP_PATERNO" class="input_form1" name="pr_ap">
                         <BR />
                         <label for="AP_MATERNO" class="label_for1">SEGUNDO APELLIDO:</label>
                         <input type="text" id="AP_MATERNO" class="input_form1" name="seg_ap"> 
                         <br /> 
                         <label for="CI" class="label_for1">CI</label>
                         <input type="text" id="CI" class="input_form1" name="ci"> 
                         <br /> 
                         <label for="de" class="label_for1">DEPARTAMENTO</label>
                         <?php
                            $query_rol = mysqli_query($conection,"SELECT * FROM extencion");
                            $result_rol = mysqli_num_rows($query_rol);

                        ?>
                         <select class="input_form1"  name="depa">
                         <?php
                                if($result_rol > 0)
                                {
                                    while ($rol = mysqli_fetch_array($query_rol)){
                              ?>
                                     <option value="<?php echo $rol["cod_extencion"]; ?>"><?php echo $rol["departamento"]?></option>   
                                
                                <?php
                                    }
                                }

                            ?>
                         </select>
                         <br /> 
                         <label for="ESPECIALIDAD" class="label_for1">ESPECIALIDAD EN:</label>
                         <input type="text" id="ESPECIALIDAD" class="input_form1" name="especialidad"> 
                         <br />
                         
                         <label for="FECHA_NACIMIENTO" class="label_for1">FECHA DE NACIMIENTO</label>
                         <input type="date" id="FECHA_NACIMIENTO" class="input_form1" name="fecha"> 
                         <br />

                         <label for="GENERO" class="label_for1">GENERO :</label>
                         <select class="input_form1" name="genero">
                             <option value="MUJER">MUJER</option>
                             <option value="HOMBRE">HOMBRE</option>
                         </select>
                         <BR />
                         
                         <label for="CELULAR" class="label_for1">CELULAR :</label>
                         <input type="text"  id="CELULAR" class="input_form1" name="celular">   
                         <BR /> 
                         <input type="submit"  value="REGISTRAR" class="boton">
                    
                    </form>
             
               </div>
     <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/formulario.js"></script>
</body>
</html>