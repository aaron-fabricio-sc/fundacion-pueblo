<?php
    include "privacidad.php";
    if($_SESSION['rol'] ==3){
        header('location: menu_navegacion.php');
    }  

    
    include "../conexion.php";
    if(!empty($_POST))
    {
        $alert='';
        if(empty($_POST['nombre']) || empty($_POST['ap_paterno']) || empty($_POST['ap_materno']) 
                                    || empty($_POST['carrera']) || empty($_POST['gestion']) || 
                                     empty($_POST['turno']) || 
                                    empty($_POST['ci']) || empty($_POST['depa'])
                                    || empty($_POST['direccion']) || 
                                    empty($_POST['fecha_nacimiento']) || empty($_POST['genero'])
                                    || empty($_POST['fono']))
                                   
        {
            $alert='<p class="msg_error">Todos los campos son obligatorios</p>';
        }else{
            
                $nombre=$_POST['nombre'];
                $ap_paterno=$_POST['ap_paterno'];
                $ap_materno=$_POST['ap_materno'];
                $carrera=$_POST['carrera'];
                $gestion=$_POST['gestion'];
                $turno=$_POST['turno'];
                $ci=$_POST['ci'];
                $depa=$_POST['depa'];
                $direccion=$_POST['direccion'];
                $fecha_nacimiento=$_POST['fecha_nacimiento'];
                $genero=$_POST['genero'];
                $fono=$_POST['fono'];

                    $query_insert= mysqli_query($conection,"INSERT INTO estudiantes(nombre,ap_paterno,ap_materno,
                    carrera, gestion,turno,ci,departamento,direccion,fecha_nacimiento,genero,telefono_celular) 
                     VALUES ('$nombre','$ap_paterno','$ap_materno','$carrera',
                     '$gestion','$turno','$ci','$depa','$direccion','$fecha_nacimiento','$genero','$fono')");
                
                if($query_insert){
                    $alert='<p class="msg_save">Estudiante creado correctamente.</p>';
                

                }else{
                    $alert='<p class="msg_error"> Error al crear el estudiante.</p>';
                    
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
    <title>Registro de alumnos</title>
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
                
               
          <li> <a href="lista_estudiantes_total.php"><span class="icon-file-text2"></span>LISTA DE ESTUDIANTES</a></li>
                <li> <a href="menu_navegacion.php"><span class="icon-menu2"></span>MENU PRINCIPAL</a></li>
    
               
          </ul>
        </nav>


    </header>
    

    <div class="contenedor1">
            <h2 class="titulo">INCRIPCION DE ESTUDIANTE</h2>
            

            
             <form  class="form1"action="" method="post" class="form2">
                <div class="alert"><?php  echo isset($alert) ? $alert : ''; ?></div>
                    <div>
                        <label for="NOMBRES" class="label_for1">NOMBRES :</label>
                        <input type="text"  id="NOMBRE" class="input_form1" name="nombre">
                    </div>
                    <div>
                         <label for="AP_PATERNO" class="label_for1">APELLIDO PATERNO :</label>
                         <input type="text"  id="AP_PATERNO" class="input_form1"  name="ap_paterno">
                    </div>
                    <div>
                        <label for="AP_MATERNO" class="label_for1">APELLIDO MATERNO :</label>
                         <input type="text" id="AP_MATERNO" class="input_form1"  name="ap_materno"> 
                    </div>
                    
                     <div>
                            <label for="CARRERA" class="label_for1">PARA LA CARRERA DE:</label>

                                    <?php
                                    $query_rol = mysqli_query($conection,"SELECT * FROM carrera");
                                    $result_rol = mysqli_num_rows($query_rol);

                                    ?>

                                    <select class="input_form1"  name="carrera">
                                    <?php
                                        if($result_rol > 0)
                                        {
                                            while ($rol = mysqli_fetch_array($query_rol)){
                                    ?>
                                            <option value="<?php echo $rol["cod_carrera"]; ?>"><?php echo $rol["nombre_carrera"]?></option>   
                                        
                                        <?php
                                            }
                                        }

                                    ?>
                                    </select>
                     </div>    
                     <div>
                        <label for="año" class="label_for1">AÑO</label>
                            <select class="input_form1"  name="gestion">
                                <option value="primero">PRIMERO</option>
                                <option value="segundo">SEGUNDO</option>
                                <option value="tercero">TERCERO</option>
                                <option value="cuarto">CUARTO</option>
                            </select>
                     </div>
                         <div>
                            <label for="TURNO" class="label_for1">TURNO DE:</label>
                            <select class="input_form1"  name="turno">
                                <option value="Mañana">Mañana</option>
                                <option value="Noche">Noche</option>
                                <option value="Sabados">Sabados</option>
                            </select>
                        </div>
                      
                         <div>
                            <label for="CI" class="label_for1">CI</label>
                            <input type="text" id="CI" class="input_form1" name="ci"> 

                         </div>
                         <div>
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
                         </div>
                         <div>
                            <label for="ESPECIALIDAD" class="label_for1">DIRECCION</label>
                            <input type="text" id="ESPECIALIDAD" class="input_form1" name="direccion">

                         </div>
                         <div>
                            <label for="FECHA_NACIMIENTO" class="label_for1">FECHA DE NACIMIENTO</label>
                            <input type="date" id="FECHA_NACIMIENTO" class="input_form1"  name="fecha_nacimiento"> 

                         </div>
                        
                         <div>
                            <label for="SEXO" class="label_for1">GENERO :</label>
                            <select class="input_form1"  name="genero">
                                <option value="MUJER">MUJER</option>
                                <option value="HOMBRE">HOMBRE</option>
                            </select>
                         </div>
                         <div>

                                        <label for="TELEFONOS" class="label_for1">TELEFONOS O CELULAR</label>
                                         <input type="text" id="TELEFONOS" class="input_form1" name="fono">
                         </div>
                   
                          
                   
                          
                       

                         
                       
                         
                
                         <input type="submit"  value="REGISTRAR" class="boton">
                    
                    </form>
             
               </div>
               <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/formulario.js"></script>
    <script src="js/particles.js"></script>
    <script src="js/app.js"></script>
</body>
</html>