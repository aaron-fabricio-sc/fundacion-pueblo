<?php 
include "privacidad.php";
   
include "../conexion.php";
 
$salida="";
 
$query="SELECT * FROM estudiantes WHERE carrera ='ARQ' AND estatus = 1 ORDER By id";


if(isset($_POST['consulta'])){
    $q=$conection -> real_escape_string($_POST['consulta']);
    $query="SELECT * FROM estudiantes WHERE (nombre LIKE '%".$q."%' OR ap_paterno LIKE '%".$q."%' OR ap_materno LIKE '%".$q."%' ) AND carrera ='ARQ' AND estatus = 1";

}

$resultado=$conection -> query($query);

if( $_SESSION['rol']==3 ){
    if($resultado->num_rows >0 ){

        $salida.="
        <table  class='table-bordered w-100'> 
        <thead>   
        <tr>
        <th>ID</th>
            <th>Nombre</th>
            <th>1er Apellido</th>
            <th>2do Apellido</th>
            
            <th>AÑO</th>    
            <th>TURNO</th>         
          
            <th>ACCIONES</th> 
                      
        </thead>
                ";
        while($fila = $resultado -> fetch_assoc()){
            $salida.="<tr>
                        <td>".$fila['id']."</td> 
                        <td>".$fila['nombre']."</td> 
                        <td>".$fila['ap_paterno']."</td> 
                        <td>".$fila['ap_materno']."</td> 
                        
                        <td>".$fila['gestion']."</td> 
                        <td>".$fila['turno']."</td> 
                        <td> <a  class='link_delete' href='registro_de_notas_arc.php? id= ".$fila ["id"]."'>Agregar notas</a></td>
                       </tr> ";
        }
            $salida.="</table>";
    }else{
        $salida.="<b class='text-info text-center w-100 d-block'> NO HAY DATOS</b>";

    }
    echo $salida;  
}else{
    if($resultado->num_rows >0 ){

        $salida.="
        <table  class='table-bordered w-100'> 
        <thead>   
        <tr>
        <th>ID</th>
            <th>Nombre</th>
            <th>1er Apellido</th>
            <th>2do Apellido</th>
        
            <th>AÑO</th>    
            <th>TURNO</th>         
            <th>Acciones</th>
 
                      
        </thead>
                ";
        while($fila = $resultado -> fetch_assoc()){
            $salida.="<tr>
                        <td>".$fila['id']."</td> 
                        <td>".$fila['nombre']."</td> 
                        <td>".$fila['ap_paterno']."</td> 
                        <td>".$fila['ap_materno']."</td> 
                       
                        <td>".$fila['gestion']."</td> 
                        <td>".$fila['turno']."</td> 
                        <td>
                        <a  class='link_delete' href='registro_de_notas_arc.php? id= ".$fila ["id"]."'>Agregar notas</a>
                        |<a class='link_add' href='editar_estudiante.php? id=".$fila['id']."'>Editar</a> 
                         |<a  class='link_delete' href='eliminar_estudiante.php? id=".$fila['id']."'> Eliminar</a>
                     </td>
                       </tr> ";
        }
            $salida.="</table>";
    }else{
        $salida.="<b class='text-info text-center w-100 d-block'> NO HAY DATOS</b>";

    }
    echo $salida;
    $conection->close();
}

    
      

?>
    
    



    
  
