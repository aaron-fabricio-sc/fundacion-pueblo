<?php
    include "privacidad.php";
    include "../conexion.php";
    if(!empty($_POST))
    {
        $alert='';
        if(empty($_POST['nuevo']) ||empty($_POST['cod']))
        {
            $alert='<p class="msg_error">Todos los campos son obligatorios</p>';
        }else{
            $seg=$_POST['nuevo'];
            if($seg>51){
                $segu="no";
            }else{
                $segu="si";
            }




            $nuevo=$_POST['nuevo'];
           $cod=$_POST['cod'];
          
                        $sql_update = mysqli_query($conection,"UPDATE notas SET promedio='$nuevo',segunda_instancia='$segu' WHERE cod_nota =$cod");
                    
                   
                        //$sql_update = mysqli_query($conection,"UPDATE docente SET cod='$cod',nombre='$nombre',pr_ap='$ap_paterno',seg_ap='$ap_materno', ci='$ci', especialidad='$especialidad',fecha_nacimiento='$fecha', celular=$fono WHERE cod= $cod");
                    }
                   
                if($sql_update){
                    $alert='<p class="msg_save">promedio actualizado correctamente.</p>';

                }else{
                    $alert='<p class="msg_error"> Error al actualizar el promedio.</p>';
                
            
            
            }


        }
    
        /*MOSTRAR DATOS*/

        if(empty($_GET['id']))
        {
            header('location:lista_usuarios.php');
        }  
        $iduser = $_GET['id'];
        $sql = mysqli_query($conection, "SELECT *  FROM notas WHERE cod_nota = $iduser");
        
        $result_sql = mysqli_num_rows($sql);
        if($result_sql == 1 ){

            }
            /*verificar*/
    
            $cod=$_REQUEST['id'];
            $query= mysqli_query($conection,"SELECT e.nombre,e.ap_paterno,e.ap_materno,n.cod_nota,e.id,n.estudiante,n.promedio,n.cod_nota,n.materia FROM estudiantes e INNER JOIN notas n where n.cod_nota=$cod AND e.id=n.estudiante" );
            $result= mysqli_num_rows($query);
            if($result > 0){
   
                while ($data = mysqli_fetch_array($query)){
                    $nombre=$data['nombre'];
                    $ap_paterno=$data['ap_paterno'];
                    $ap_materno=$data['ap_materno'];
                    $prom=$data['promedio'];
                    $materia=$data['materia'];
                  
                    
                }
            }else{
                echo "error";
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
    <title>Actualizar nota</title>
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
                
            
               
        
               <li> <a href="menu_navegacion.php"><span class="icon-undo"></span>ATRAS</a></li> 
              
          </ul>
        </nav>


    </header>
    

    <div class="contenedor1">
            <h2 class="titulo">ACTUALIZAR NOTA</h2>
            <div class="eliminar"> 
            <div class="alert"><?php  echo isset($alert) ? $alert : ''; ?></div>
  
         





                <h3> Seguro que desea actualizar el siguiente promedio?</h3>

                <p>nombre: <span><?php echo $nombre; ?></span></p>
                <p>1ER Apellido: <span><?php echo $ap_paterno; ?></span></p>
                <p>2Do Apellido: <span><?php echo $ap_materno; ?></span></p>
                <p>Materia <span><?php echo $materia; ?></span></p>
                <p>Promedio actual <span><?php echo $prom; ?></span></p>
             
     
               


        </div>
             <form  class="form1"action="" method="post" >
  

                        <input type="hidden" name="cod" value="<?php echo "$iduser"?>">
                    
                         <label for="NOMBRES" class="label_for1">NUEVO PROMEDIO</label>
                         <input type="text"  id="NOMBRE" class="input_form1" name="nuevo">
                         
                         <input type="submit"  value="ACTUALIZAR" class="boton">
                    
                    </form>
             
               </div>
               <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/formulario.js"></script>
    <script src="js/particles.js"></script>
    <script src="js/app.js"></script>
</body>
</html>