app.js

/ * modulesJS.load (@ dom-id, @ path-json, @callback (opcional)); * /
 particulasJS . carga ( ' part�culas-js ' , ' activos / part�culas.json ' , funci�n () {
   consola . log ( ' devoluci�n de llamada - part�culas.js config cargada ' );
});
particulas.json

{
   " part�culas " : {
     " n�mero " : {
       " valor " :  80 ,
       " densidad " : {
         " habilitar " :  verdadero ,
         "�rea de valor " :  800
      }
    }
    " color " : {
       " valor " :  " #ffffff "
    }
    " shape " : {
       " type " :  " circle " ,
       " stroke " : {
         " width " :  0 ,
         " color " :  " # 000000 "
      }
      " pol�gono " : {
         " nb_sides " :  5
      }
      " image " : {
         " src " :  " img / github.svg " ,
         " width " :  100 ,
         " height " :  100
      }
    }
    " opacidad " : {
       " valor " :  0.5 ,
       " aleatorio " :  falso ,
       " anim " : {
         " habilitar " :  falso ,
         " velocidad " :  1 ,
         " opacidad_min " :  0.1 ,
         " sincronizaci�n " :  falso
      }
    }
    " size " : {
       " value " :  10 ,
       " random " :  true ,
       " anim " : {
         " enable " :  false ,
         " speed " :  80 ,
         " size_min " :  0.1 ,
         " sync " :  false
      }
    }
    " line_linked " : {
       " enable " :  true ,
       " distance " :  300 ,
       " color " :  " #ffffff " ,
       " opacity " :  0.4 ,
       " width " :  2
    }
    " move " : {
       " enable " :  true ,
       " speed " :  12 ,
       " direction " :  " none " ,
       " random " :  false ,
       " straight " :  false ,
       " out_mode " :  " out " ,
       " bounce " : falsa ,
       "atraer " : {
         " habilitar " :  falso ,
         " rotarX " :  600 ,
         " rotarY " :  1200
      }
    }
  }
  " interactivity " : {
     " detect_on " :  " canvas " ,
     " events " : {
       " onhover " : {
         " enable " :  false ,
         " mode " :  " repulse "
      }
      " onclick " : {
         " enable " :  true ,
         " mode " :  " push "
      }
      " redimensionar " :  verdadero
    }
    " Modos " : {
       " agarrar " : {
         " distancia " :  800 ,
         " line_linked " : {
           " opacidad " :  1
        }
      }
      " burbuja " : {
         " distancia " :  800 ,
         " tama�o " :  80 ,
         " duraci�n " :  2 ,
         " opacidad " :  0.8 ,
         " velocidad " :  3
      }
      " rechazar " : {
         " distancia " :  400 ,
         " duraci�n " :  0.4
      }
      " empujar " : {
         " part�culas_nb " :  4
      }
      " eliminar " : {
         " part�culas_nb " :  2
      }
    }
  }
  " retina_detect " :  true 
}