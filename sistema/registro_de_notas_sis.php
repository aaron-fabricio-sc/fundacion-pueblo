<?php
    include "privacidad.php";
    include "../conexion.php";
    
    if(!empty($_POST))
    {
        $alert='';
     
        if(   empty($_POST['uno']) || empty($_POST['dos']) 
        || empty($_POST['tres']) || empty($_POST['f']) || empty($_POST['final']))
        {
            $alert='<p class="msg_error">Todos los campos son obligatorios</p>';
  
        }else{
            
            $seg=$_POST['final'];

            
        if($seg >=51){
                $segu="no";

            }else{
                $segu="si";
            }

                $codestu=$_POST['codnotaestu'];
                $carrera=$_POST['carrera'];
                $materias=$_POST['materias'];
                $docente=$_POST['docente'];
                $p1=($_POST['uno']);
                $p2=($_POST['dos']);
                $p3=($_POST['tres']);
                $f=($_POST['f']);
                $final=($_POST['final']);

                    $query_insert= mysqli_query($conection,"INSERT INTO notas(estudiante,carrera,materia,docente,primer_parcial,segundo_parcial,tercer_parcial,examen_final,promedio,segunda_instancia) 
                                                            VALUES ('$codestu','$carrera','$materias','$docente','$p1','$p2','$p3','$f','$final','$segu')");
                if($query_insert){
                    $alert='<p class="msg_save">Notas registradas correctamente.</p>';

                }else{
                    $alert='<p class="msg_error"> Error al registrar notas.</p>';
                }
            
           
        }
           
    }
/*MOSTRAR DATOS*/
if(empty($_GET['id']))
{
    header('location:lista_usuarios.php');
}  
$iduser = $_GET['id'];
$sql = mysqli_query($conection, "SELECT id FROM  estudiantes WHERE id= $iduser");

$result_sql = mysqli_num_rows($sql);
if($result_sql == 0){
    header('location: lista_estudiantes_sistemas.php');
    }else{
        $option='';
        while($data =mysqli_fetch_array($sql)){
            $iduser = $data['id'];
    
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="UTF-8">
    <title>Resgristro de notas sistemas</title>
    <link rel="stylesheet" href="cssb/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
        
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximun-scale=1.0,minimum-scale=1.0">
     <link rel="stylesheet" href="iconos/style.css">
</head>
<body>

    <?php include "header.php"?>
           <div class ="imagen">
            <img src="img/logo.jpg" width="200px">
            </div>
            
        <header>
        <h1 class="titulo">REGISTRO DE NOTAS</h1>
        <div class="menu">
          <a href="#" class="btn"><span class="icon-list"></span>Menu</a>      
        </div>
        <nav>
                <ul>
                    
                <li><a href="lista_estudiantes_sistemas.php" ><span class="icon-undo"></span>ATRAS</a></li>                   
            </ul>
        </nav>
    </header>
            <div class="container">
            
                    <form class="form1 px-1" action="" method="post">
                    <div class="alert"><?php  echo isset($alert) ? $alert : ''; ?></div>
                        <div class="contenedor2">
                        <input type="hidden" name="codnotaestu" value="<?php echo $iduser; ?>">
                         <?php
                          $query_rol = mysqli_query($conection,"SELECT * FROM carrera WHERE nombre_carrera='Ingenieria en Sistemas'");
                          $result_rol = mysqli_num_rows($query_rol);

                      ?>
                 
                      <?php
                              if($result_rol > 0)
                              {
                                  while ($rol = mysqli_fetch_array($query_rol)){
                            ?>
                                   <input name="carrera" type="hidden" value="<?php echo $rol["nombre_carrera"]; ?>">  
                              
                              <?php
                                  }
                              }

                          ?>
                                
                       <div><label for="EST" class="label_for1">MATERIA</label>
                       <?php
                          $query_rol = mysqli_query($conection,"SELECT * FROM materias WHERE carrera='Ingenieria en sistemas'");
                          $result_rol = mysqli_num_rows($query_rol);

                      ?>
                      <select  class="input_form1" name="materias" > 
                      <?php
                              if($result_rol > 0)
                              {
                                  while ($rol = mysqli_fetch_array($query_rol)){
                            ?>
                                   <option value="<?php echo $rol["materia"]; ?>"><?php echo $rol["materia"]?></option>   
                              
                              <?php
                                  }
                              }

                          ?>
                      </select>
                    </div>
                         <div>
                             
                         <label for="EST" class="label_for1">DOCENTE</label>
                            <?php
                          $query_rol = mysqli_query($conection,"SELECT * FROM docente ");
                          $result_rol = mysqli_num_rows($query_rol);

                      ?>
                      <select  class="input_form1" name="docente" > 
                      <?php
                              if($result_rol > 0)
                              {
                                  while ($rol = mysqli_fetch_array($query_rol)){
                            ?>
                                   <option value="<?php echo $rol["primer_apellido"]; ?>"><?php echo $rol["primer_apellido"]?></option>   
                              
                              <?php
                                  }
                              }

                          ?>
                      </select>
                        
                        </div>

                       <div>
                           <label for="PARCIAL1" class="label_for1">1ER PARCIAL:</label>
                           <input type="text" name="uno" id="PARCIAL1" class="input_form1">
                    
                        </div>
                       <div>
                           <label for="PARCIAL2" class="label_for1">2DO PARCIAL: </label>
                           <input type="text" name="dos"  id="PARCIAL2" class="input_form1">
                        </div>
                        <div>
                            <label for="PARCIAL3" class="label_for1">3ER PARCIAL:</label>
                            <input type="text" name="tres"  id="PARCIAL3" class="input_form1">
                        </div>
                        <div>
                            <label for="EXFINAL" class="label_for1">EX FINAL</label>
                            <input type="text" name="f"  id="EXFINAL" class="input_form1">
                        </div>
                         <div>
                             <label for="NOTAFINAL" class="label_for1">NOTA FINAL</label>
                             <input type="text" name="final"  id="NOTAFINAL" class="input_form1" >
                         </div>
                    
                    </div>
                    <input type="submit"  value="REGISTRAR" class="boton mb-3"> 

                    </form>
            </div>

    <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/formulario.js"></script>

</body>
</html>