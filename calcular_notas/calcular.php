<!-- captura de datos y calculo del promedio -->
<?php

if($_POST){
    $cantidad = count($_POST);  /* se obtiene la cantidad de cajas de texto que se an introducido para calcular las notas */
    $j = 1;                     /* para controlar el ciclo */ 
    $sumar = 0;                 /* para sumar las notas */ 

    while($j <= $cantidad){
        $sumar += $_POST['txtNota'.$j];
        $j++;
    }

    $promedio = $sumar/$cantidad;
    $transformar_promedio = number_format($promedio,2,'.',',');
    print "El promedio es: " . $transformar_promedio;
}else{
print "No permitido";
}

?>
<br><br>
<a style="text-decoration: none;
          width:300px;
          height: 100px;
          padding:5px;
          border: 2px solid red;
          border-radius: 5px;
          background: #ff0000;
          color: #ffffff;
          " href="index.php">
    Regresar
</a>