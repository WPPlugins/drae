== drae ==
Autor: Elibeth Castillo
Proyecto: VEREDA - VENEZUELA RED DE ARTE, MERIDA - VENEZUELA
Fecha: Noviembre 2009

== Descripción ==
Formulario que envia una palabra al Diccionario de la Real Academia Espoñala, busca y muestra su contenido.

== Instalación ==
   1. Crear en wp-content/plugins un carpeta con el nombre drae
   2. Copiar en un editor de texto el codigo de drae.php y guardalo con ese nombre dentro de la carpeta wp-content/plugins/drae
   3. Copia la imagen drae.jpg dentro de la carpeta wp-content/plugins/drae Imagen:Drae.jpg
   4. Ir al Administrador de Wordpress y activar el plugin
   5. Hay dos formas de utilizar el plugins
         1. Aparezca de forma automatica en todas las entradas y páginas, asi esta predeterminado y si no quieres que sea asi debes comentar las siguiente línea en el drae.php

            add_action('loop_end', 'drae');

            anteponiendo // al inicio de esta línea, quedaria asi

            //add_action('loop_end', 'drae');

         2. Si comentas la línea anterior debes colocas el siguiente código en las páginas donde quieres que aparezca el drae

            <?php drae(); ?>

Si deseas desactivar y eliminar el plugin
       1. Entrar al administrador y desactivas el plugins.
       2. Eliminar el directorio drae de /wp-content/plugins/ 
