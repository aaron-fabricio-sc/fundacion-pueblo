<?php
    include "privacidad.php";
    include "../conexion.php";
  

    if(!empty($_POST))
    {
        $alert='';
        if(empty($_POST['nombre']) || empty($_POST['ap_paterno']) || empty($_POST['ap_materno']) 
                                    ||  empty($_POST['turno']) || empty($_POST['ci'])
                                    || empty($_POST['direccion']) || empty($_POST['fecha_nacimiento']) || empty($_POST['genero'])
                                    || empty($_POST['fono']))
        {
            $alert='<p class="msg_error">Todos los campos son obligatorios</p>';
        }else{
            $id_est=$_POST['id'];
            $nombre=$_POST['nombre'];
            $ap_paterno=$_POST['ap_paterno'];
            $ap_materno=$_POST['ap_materno'];
            
            $turno=$_POST['turno'];
            $ci=$_POST['ci'];
            $direccion=$_POST['direccion'];
            $fecha_nacimiento=$_POST['fecha_nacimiento'];
            $genero=$_POST['genero'];
            $fono=$_POST['fono'];

             $sql_update = mysqli_query($conection,"UPDATE estudiantes 
            SET nombre='$nombre', ap_paterno='$ap_paterno', ap_materno='$ap_materno', turno='$turno',ci='$ci', direccion='$direccion', fecha_nacimiento='$fecha_nacimiento', genero='$genero', telefono_celular=$fono
          WHERE id= $id_est");
                   
                   
                if($sql_update){
                    $alert='<p class="msg_save">Usuario actualizado correctamente.</p>';

                }else{
                    $alert='<p class="msg_error"> Error al actualizar el usuario.</p>';
                }
            
            
            }
            }

        
  /*MOSTRAR DATOS*/

  if(empty($_GET['id']))
  {
      header('location:lista_estudiantes_sistemas.php');
  }  
  $iduser = $_GET['id'];
  $sql = mysqli_query($conection, "SELECT e.nombre,e.ap_paterno,e.ap_materno,e.carrera,e.gestion,e.turno,e.ci,e.direccion,e.fecha_nacimiento,e.genero,e.telefono_celular,c.nombre_carrera,c.cod_carrera
                                    FROM  estudiantes e INNER JOIN carrera c on e.carrera=c.cod_carrera  WHERE id= $iduser");
    mysqli_close($conection);
  $result_sql = mysqli_num_rows($sql);
  if($result_sql == 0){
      header('location: lista_estudiantes_sistemas.php');
      }else{
          $option='';
          while( $data =mysqli_fetch_array($sql)){
              
              $nombre = $data['nombre'];
              $ap_paterno = $data['ap_paterno'];
              $ap_materno = $data['ap_materno'];
            $ci=$data['ci'];
            $direccion=$data['direccion'];
            $fecha=$data['fecha_nacimiento'];
        $car=['carrera'];
            $carrera=$data['nombre_carrera'];
            $codcarrera=$data['cod_carrera'];

            $celular=$data['telefono_celular'];
            
           


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
                
               
          <li> <a href="lista_estudiantes_sistemas.php"><span class="icon-file-text2"></span>LISTA DE ESTUDIANTES</a></li>
                <li> <a href="menu_navegacion.php"><span class="icon-menu2"></span>MENU PRINCIPAL</a></li>
    
               
          </ul>
        </nav>


    </header>
    

    <div class="contenedor1">
            <h2 class="titulo">Actualizar estudiante</h2>
            
             <form  class="form1"action="" method="post" class="form2">
             <div class="alert"><?php  echo isset($alert) ? $alert : ''; ?></div>
             <input type="hidden" name="id" id="idusuario" value="<?php echo $iduser; ?>">
                         <label for="NOMBRES" class="label_for1">NOMBRES :</label>
                         <input type="text"  id="NOMBRE" class="input_form1" name="nombre"  value=<?php echo $nombre;?>>
                         <BR />
                         <label for="AP_PATERNO" class="label_for1">APELLIDO PATERNO :</label>
                         <input type="text"  id="AP_PATERNO" class="input_form1"  name="ap_paterno" value=<?php echo $ap_paterno;?>>
                         <BR />
                         <label for="AP_MATERNO" class="label_for1">APELLIDO MATERNO :</label>
                         <input type="text" id="AP_MATERNO" class="input_form1"  name="ap_materno" value=<?php echo $ap_materno;?>> 
                         <br /> 
                        
                         <label for="TURNO" class="label_for1">TURNO DE:</label>
                         <select class="input_form1"  name="turno">
                             <option value="Mañana">Mañana</option>
                             <option value="Noche">Noche</option>
                             <option value="Sabados">Sabados</option>
                         </select>
                         <BR />
                         <label for="CI" class="label_for1">CI</label>
                         <input type="text" id="CI" class="input_form1" name="ci"  value=<?php echo $ci;?>> 
                         <br />  
                         <label for="ESPECIALIDAD" class="label_for1">DIRECCION</label>
                         <input type="text" id="ESPECIALIDAD" class="input_form1" name="direccion"   value=<?php echo $direccion;?>> 
                         <br />
                         <label for="FECHA_NACIMIENTO" class="label_for1">FECHA DE NACIMIENTO</label>
                         <input type="date" id="FECHA_NACIMIENTO" class="input_form1"  name="fecha_nacimiento"  value=<?php echo $fecha;?>> 
                         <br />
                                
                         <label for="SEXO" class="label_for1">GENERO :</label>
                         <select class="input_form1"  name="genero">
                             <option value="MUJER">MUJER</option>
                             <option value="HOMBRE">HOMBRE</option>
                         </select>                                
                        
                         <BR />
                         <label for="TELEFONOS" class="label_for1">TELEFONOS O CELULAR</label>
                         <input type="text" id="TELEFONOS" class="input_form1" name="fono"   value=<?php echo $celular;?>>
                         <BR />
                          
                         <BR /> 
                         <input type="submit"  value="ACTUALIZAR" class="boton">
                    
                    </form>
             
               </div>
               <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/formulario.js"></script>
   
</body>
</html>