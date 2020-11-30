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
            
            $cod=$_POST['cod_materia'];
            $carrera=$_POST['carrera'];
            $materia=$_POST['nombre_materia'];
            $gestion=$_POST['gestion'];
            
                        $sql_update = mysqli_query($conection,"UPDATE materias SET cod_materia='$cod',carrera='$carrera',materia='$materia', gestion='$gestion' WHERE cod_materia= '$cod'");
                    
                   
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
        $sql = mysqli_query($conection, "SELECT *  FROM  materias WHERE cod_materia= '$iduser'");
        
        $result_sql = mysqli_num_rows($sql);
        if($result_sql == 0){
            header('location: lista_docentes.php');
            }else{
                $option='';
                while($data =mysqli_fetch_array($sql)){
                    $cod = $data['cod_materia'];
                   
                  
                    $materia = $data['materia'];
                    $gestion = $data['gestion'];

                  
                    


                   
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
    <title>Actualizar materia</title>
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
                
            
                <li> <a href="lista_materias_total.php"><span class="icon-file-text2"></span>LISTA DE MATERIAS</a></li> 
            
               <li> <a href="menu_navegacion.php"><span class="icon-menu2"></span>MENU PRINCIPAL</a></li> 
              
          </ul>
        </nav>


    </header>
    

    < <div class="contenedor1">
            <h2 class="titulo">REGISTRO DE MATERIAS </h2>
      
             <form  class="form1"action="" method="post" >
             <div class="alert"><?php  echo isset($alert) ? $alert : ''; ?></div>
             <label for="rol" class="label_for1">CARRERA :</label>       
             <?php
                            $query_rol = mysqli_query($conection,"SELECT * FROM carrera");
                            $result_rol = mysqli_num_rows($query_rol);

                        ?>

                         <select class="input_form1"  id="rol" name="carrera">
                             <?php
                                if($result_rol > 0)
                                {
                                    while ($rol = mysqli_fetch_array($query_rol)){
                              ?>
                                     <option value="<?php echo $rol["nombre_carrera"]; ?>"><?php echo $rol["nombre_carrera"]?></option>   
                                
                                <?php
                                    }
                                }

                            ?>
                     </select>
                    <br />
                    
                         <input type="hidden"name="cod_materia" id="USUARIO" class="input_form1" value="<?php echo $iduser ;?>">
                         <BR />
                         <label for="CLAVE" class="label_for1">NOMBRE DE LA MATERIA<label>
                         <input type="text" name="nombre_materia" id="CLAVE" class="input_form1" value="<?php echo $materia ;?>">    
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
    
</body>
</html>