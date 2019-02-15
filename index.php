<?php
require_once "vendor/autoload.php";

use Jaxon\Response\Response;
use Jaxon\Jaxon;

$ajax = jaxon();

class ServidorAjax {

    public function saluda() {
        $respuesta = new Response();
        $respuesta->alert("Hola desde el servidor");
        return $respuesta;
    }

    public function cambiar() {
        $respuesta = new Response();
        $respuesta->append("e1", "innerHTML", "Esto es un nuevo texto del servidor");
        return $respuesta;
    }

}

$c = new ServidorAjax();
$ajax->register(Jaxon::CALLABLE_OBJECT, new ServidorAjax());
$ajax->processRequest();

echo $ajax->getCss();
echo $ajax->getJs();
echo $ajax->getScript();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <script>
        function saluda_c() {
            JaxonServidorAjax.saluda(nombre);
            return false;
        }

        function cambiar_c() {
            JaxonServidorAjax.cambiar();
            return false;
        }
    </script>
    <body>
        <button onclick="cambiar_c()">Click me please to see the magic</button>
        <div id='e1'>

        </div>
    </body>
</html>
