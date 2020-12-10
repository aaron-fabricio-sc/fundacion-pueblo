<?php
    include "privacidad.php";
    include "../conexion.php";
    if(!empty($_POST))
    {
        $alert='';
        if(empty($_POST['cod']) || empty($_POST['nombre']) || empty($_POST['pr_ap']) || empty($_POST['seg_ap']) 
                                    || empty($_POST['ci']) || empty($_POST['especialidad']) ||  empty($_POST['fecha']) 
                                    || empty($_POST['celular']))
        {
            $alert='<p class="msg_error">Todos los campos son obligatorios</p>';
        }else{
            
            $cod=$_POST['cod'];
            $nombre=$_POST['nombre'];
            $ap_paterno=$_POST['pr_ap'];
            $ap_materno=$_POST['seg_ap'];
            $ci=$_POST['ci'];
            $especialidad=$_POST['especialidad'];
            $fecha=$_POST['fecha'];

            $fono=$_POST['celular'];
                        $sql_update = mysqli_query($conection,"UPDATE docente SET nombre='$nombre',primer_apellido='$ap_paterno',segundo_apellido='$ap_materno', ci='$ci', especialidad='$especialidad',fecha_nacimiento=$fecha, celular=$fono WHERE cod= $cod");
                    
                   
                        //$sql_update = mysqli_query($conection,"UPDATE docente SET cod='$cod',nombre='$nombre',pr_ap='$ap_paterno',seg_ap='$ap_materno', ci='$ci', especialidad='$especialidad',fecha_nacimiento='$fecha', celular=$fono WHERE cod= $cod");
                    }
                   
                if($sql_update){
                    $alert='<p class="msg_save">Usuario actualizado correctamente.</p>';

                }else{
                    $alert='<p class="msg_error"> Error al actualizar el usuario.</p>';
                }
            
            



        }
    
    


        /*MOSTRAR DATOS*/

        if(empty($_GET['id']))
        {
            header('location:lista_usuarios.php');
        }  
        $iduser = $_GET['id'];
        $sql = mysqli_query($conection, "SELECT *  FROM  docente WHERE cod= $iduser");
        mysqli_close($conection);
        $result_sql = mysqli_num_rows($sql);
        if($result_sql == 0){
            header('location: lista_docentes.php');
            }else{
            
                while($data =mysqli_fetch_array($sql)){
                    $iduser = $data['cod'];
                    $nombre = $data['nombre'];
                    $apuno = $data['primer_apellido'];
                    $apdos = $data['segundo_apellido'];
                    $ci= $data['ci'];
                    $fecha= $data['fecha_nacimiento'];
                    $especialidad= $data['especialidad'];

                    $celular= $data['celular'];


                   
                }
            }
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/diseñonav.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximun-scale=1.0,minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="iconos/style.css">
    <title>Actualizar docente</title>
</head>
<body>

    <div id="particles-js"></div>
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
            <h2 class="titulo">ACTUALIZAR DOCENTE</h2>
             <form  class="form1"action="" method="post" >
             <div class="alert"><?php  echo isset($alert) ? $alert : ''; ?></div>

                         <input type="hidden"  id="cod" class="input_form1" name="cod" value="<?php echo $iduser; ?>">
                         <BR />
                         <label for="NOMBRES" class="label_for1">NOMBRES :</label>
                         <input type="text"  id="NOMBRE" class="input_form1" name="nombre" value="<?php echo $nombre; ?>">
                         <BR />
                         <label for="AP_PATERNO" class="label_for1">PRIMER APELLIDO :</label>
                         <input type="text"  id="AP_PATERNO" class="input_form1" name="pr_ap" value="<?php echo $apuno; ?>">
                         <BR />
                         <label for="AP_MATERNO" class="label_for1">SEGUNDO APELLIDO:</label>
                         <input type="text" id="AP_MATERNO" class="input_form1" name="seg_ap" value="<?php echo $apdos; ?>"> 
                         <br /> 
                         <label for="CI" class="label_for1">CI</label>
                         <input type="text" id="CI" class="input_form1" name="ci" value="<?php echo $ci; ?>"> 
                         <br />  
                         <label for="ESPECIALIDAD" class="label_for1">ESPECIALIDAD EN:</label>
                         <input type="text" id="ESPECIALIDAD" class="input_form1" name="especialidad" value="<?php echo $especialidad; ?>"> 
                         <br />
                         
                         <label for="FECHA_NACIMIENTO" class="label_for1">FECHA DE NACIMIENTO</label>
                         <input type="date" id="FECHA_NACIMIENTO" class="input_form1" name="fecha" value="<?php echo $fecha; ?>"> 
                         <br />

                         
                         <BR />
                         
                         <label for="CELULAR" class="label_for1">CELULAR :</label>
                         <input type="text"  id="CELULAR" class="input_form1" name="celular" value="<?php echo $celular; ?>">   
                         <BR /> 
                         <input type="submit"  value="ACTUALIZAR" class="boton">
                    
                    </form>
             
               </div>
               <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/formulario.js"></script>
    <script src="js/particles.js"></script>
    <script src="js/app.js"></script>
</body>
</html>