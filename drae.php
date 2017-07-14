<?php
/*
Plugin Name: Drae
Plugin URI: 
Description: Formulario que envia una palabra al Diccionario de la Real Academia Espoñala, busca y muestra su contenido. 
Version: 09.11
Author: Elibeth Castillo
Author URI: 
Proyecto: VEREDA - VENEZUELA RED DE ARTE, MERIDA - VENEZUELA
Fecha: Noviembre 2009
*/

define('DRAE_VERSION', '09.11');
function drae(){
?>
<form method ="POST"  action="" name="draebuscador">
<div>Palabra:
<input type="text" name="draePalabra" size="20"/>
<img src="wp-content/plugins/drae/drae.jpg" style="margin: 5px 5px -6px -3px" /><input type="submit" value="Buscar" name="draeBuscar"/></div>
</form>
<?php
if ((isset($_POST['draeBuscar']))and (isset($_POST['draePalabra']))) {
       $draeBusqueda=$_POST['draePalabra'];
       $draeBusqueda=strtolower( $draeBusqueda ); //strtolower pasa la palabra enviada a minusculas ya que DRAE no busca palabras en mayusculas
       $draeUrl_web = fopen ("http://buscon.rae.es/draeI/SrvltGUIBusUsual?&LEMA=$draeBusqueda", "r");
        if (!$draeUrl_web) { echo "<p>Error obteniendo codigo fuente de la web.\n"; exit; }
        while (!feof ($draeUrl_web))
        {
     $draeContenido = fgets ($draeUrl_web);
     $draeContenido=str_replace("Ver conjugación","",$draeContenido);
     $draeContenido=str_replace("Ver artículo enmendado","",$draeContenido);
     $draeContenido=str_replace("Real Academia Espa&#x00F1;ola. Diccionario Usual.","",$draeContenido);
     $draeContenido=str_replace("DICCIONARIO DE LA LENGUA ESPA&Ntilde;OLA - Vig&eacute;sima segunda edici&oacute;n","",$draeContenido);
     $draeContenido=str_replace("á","&aacute;",$draeContenido);
     $draeContenido=strip_tags($draeContenido,'<p>');
     echo "$draeContenido";
      }
      fclose($draeUrl_web);
}
return $output;
  
}
/*Con este add_action hace que la funcion del Drae aparezca en todos las entradas y paginas y no quiere que sea asi debe comentar la linae de add_action anteponiendo  // al inicio y para hacer la llamada del drae en la entrada o paginas que desee debe escribir lo siguiente donde quiere que aparezca el drae:
<?php
drae();
?>
*/
add_action('loop_end', 'drae');

?>
