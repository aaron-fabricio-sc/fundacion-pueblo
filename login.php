
<?php
 $alert ='';
 session_start();
if(!empty($_SESSION['active']))
{
     header('location: sistema/menu_navegacion.php');
}else{

    if(!empty($_POST))
    {
        if(empty($_POST['usuario']) || empty($_POST['clave']))
        {
            $alert = 'Ingrese su usuario y clave';
        }else{
        require_once "conexion.php";
        
        $user = mysqli_real_escape_string($conection,$_POST['usuario']);
        $pass = md5(mysqli_real_escape_string($conection,$_POST['clave']));

        $query = mysqli_query($conection,"SELECT * FROM usuarios WHERE usuario ='$user' AND codigo= '$pass'");
            mysqli_close($conection);
        $result = mysqli_num_rows($query);
        
        if($result >0 )
        {
            $data = mysqli_fetch_array($query);
            
            $_SESSION['active'] = true;
            $_SESSION['iduser'] = $data['idusuario'];
            $_SESSION['nombre'] = $data['nombre'];
            $_SESSION['user'] = $data['usuario'];
            $_SESSION['rol'] = $data['rol'];

            header('location: sistema/menu_navegacion.php');
           
        }else{
            $alert = 'El usuario o la clave son incorrectas';
           session_destroy();


    }
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Universidad Boliviana de Informatica Sub-Sede El Alto Login</title>
      
        <link rel="stylesheet" href="css/diseños.css">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximun-scale=1.0,minimum-scale=1.0">
    </head>
    <body>

        <header>
           <div class ="imagen">
            <img src="sistema/img/logo.jpg" width="200px">
            </div>
        </header>
        
     <div class="contenedor">
    <form action=""  method ="post" class="formulario">
       <div class="cont_titulo"><H1 class="for_titulo">UNIVERSIDAD BOLIVIANA DE INFORMATICA</H1></div> 
       <label for="a" class="for_label">USUARIO</label>
    <input type="text" id="a" class="for_input" name="usuario">
    <label for="b" class="for_label">CONTRASEÑA</label>
    <input type="password"  id="b" class="for_input" name="clave">
    
    <div class="alert"><?php echo isset($alert) ? $alert : '' ?> </div>
    <input type="submit"  value="INGRESAR" class="boton">
    </form>
     </div>
   
      <script src="js/login.js" ></script>
       <script src="js/particles.js"></script>
       <script src="js/app.js"></script>
</body>
</html>