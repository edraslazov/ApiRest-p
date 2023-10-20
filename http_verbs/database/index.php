<?php require_once "render/BaseLayout.php";
require_once "config/configControllers.php";
BaseLayout::renderHead();

/**************** CONTROLADOR FRONTAL *********************/

// Definimos un ontrolador por defecto
$controller = DEFAULT_CONTROLLER;

// Tomamos el controlador requerido por el usuario
// en caso de no especificarse seleccionamos el controlador por defecto.
if(!empty($_GET['controller']))
{
    $controller = $_GET['controller'];
}

// Definimos una acción por defecto
$action = DEFAULT_ACTION;

// Tomamos la accion requerida por el usuario
// en caso de no especificarse seleccionamos la acción por defecto.
if(!empty($_GET['action']))
{
    $action = $_GET['action'];
}

$subaction = false;

if(!empty($_GET['subaction']))
{
    $subaction = $_GET['subaction'];
}

// Ya tenemos el controlador y la accion
// Formamos el nombre del fichero que contiene nuestro controlador
$fullController = CONTROLLERS_DIR . ucfirst($controller) . "Controller.php";

$controller = $controller . "Controller";

// Si la variable ($controller) es un fichero lo requerimos
if(is_file($fullController))
{
    require_once ($fullController);
    $printController = new $controller();
}
else
{
    die("<h1>Controlador no localizado - 404 Not Found</h1>");
}

// Si la variable $action es una función la ejecutamos o detenemos el script
/*if(method_exists($printController, $action))
{
    $printController->$action();
}*/
if(method_exists($printController, $action)) {

    $printController->$action();
}
else if(is_int((int) $action) && !$subaction)
{   
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $printController->show((int) $action);
    }
    else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_method']) && $_POST['_method'] === 'PUT') {

        $printController->update((int) $action);
    }
    else if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

        $printController->delete((int) $action);
    }
}
else if(is_int((int) $action) && $subaction)
{   
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        
        $printController->$subaction($action);
    }
}
else
{
    die("<h1>Metodo no definido - 404 Not Found</h1>");
}

BaseLayout::renderFoot();