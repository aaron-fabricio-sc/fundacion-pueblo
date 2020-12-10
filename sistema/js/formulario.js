$(document).ready(main);
var contador=1;


function main (){
    $('.menu').click(function(){
     if(contador==1){
         $('nav').animate({
            left:'0' 
         });
     contador = 0;
     } else  {
         contador= 1;
         $('nav').animate({
            left:'-100%' 
         });
         
     }  
});
    $('.submenu').click(function(){
       $(this).children('.listado').slideToggle();
    });
   
}

//BUSCADOR
$(buscar_datos());
 function buscar_datos(consulta){
    $.ajax({
        url:'buscador_estudiantes_total.php',
        type:'POST',
        dataType:'html',
        data: {consulta: consulta},

    })
    .done(function(respuesta){
        $("#datos").html(respuesta);
    })
    .fail(function(){
        console.log("error");
    })

}
// EVENTO DE BUSQUEDA
$(document).on('keyup','#busqueda', function(){
    var valor = $(this).val();
    if(valor !=""){
        buscar_datos(valor);
    
    }else{
        buscar_datos();
    }
     
    });  

   /*INGENIERIA EN SISTEMAS */ 
$(buscar_datosSIS());
function buscar_datosSIS(consulta){
    $.ajax({
        url:'buscador_ingenieria_en_sistemas.php',
        type:'POST',
        dataType:'html',
        data: {consulta: consulta},

    })
  .done(function(respuesta){
      $("#datosS").html(respuesta);
    })
    .fail(function(){
        console.log("error");
    })

}
   
// EVENTO DE BUSQUEDA
$(document).on('keyup','#busqueda', function(){
    var valor = $(this).val();
    if(valor !=""){
        buscar_datosSIS(valor);
    
    }else{
        buscar_datosSIS();
    }
     
    }); 

 // CONTADURIA
 $(buscar_datos_conta());
function buscar_datos_conta(consulta){
    $.ajax({
        url:'buscador_conta.php',
        type:'POST',
        dataType:'html',
        data: {consulta: consulta},

    })
  .done(function(respuesta){
      $("#datosConta").html(respuesta);
    })
    .fail(function(){
        console.log("error");
    })

}
   
// EVENTO DE BUSQUEDA
$(document).on('keyup','#busqueda', function(){
    var valor = $(this).val();
    if(valor !=""){
        buscar_datos_conta(valor);
    
    }else{
        buscar_datos_conta();
    }
     
    });  
    // ARQUITECTURA
    $(buscar_datos_arq());
   function buscar_datos_arq(consulta){
       $.ajax({
           url:'buscador_arquitectura.php',
           type:'POST',
           dataType:'html',
           data: {consulta: consulta},
   
       })
     .done(function(respuesta){
         $("#datosARQ").html(respuesta);
       })
       .fail(function(){
           console.log("error");
       })
   
   }
      
   // EVENTO DE BUSQUEDA
   $(document).on('keyup','#busqueda', function(){
       var valor = $(this).val();
       if(valor !=""){
        buscar_datos_arq(valor);
       
       }else{
        buscar_datos_arq();
       }
        
       });





