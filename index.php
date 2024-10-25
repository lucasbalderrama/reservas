<!-- a -->
<?php
require_once 'config/config.php';
//Verifica se existe a rota admin
$isAdmin = strpos($_SERVER['REQUEST_URI'], '/' . ADMIN) !== false;
//Comprova se existe GET para criar urls fácil de ler e entender
$rota = empty($_GET['url']) ? 'principal/index' : $_GET['url'];
//Criar um array a partir da rota
$array = explode('/', $rota);
//Validar se nós estamos na rota
if ($isAdmin && (count($array) == 1 || (count($array) == 2 && empty($array[1]))) && $array[0] == ADMIN) {
    //Criar controlador
    $controller = 'Admin';
    $metodo = 'login';
} else {
    $indiceUrl = ($isAdmin) ? 1 : 0 ;
    $controller = ucfirst($array[$indiceUrl]);
    $metodo = 'index';
}
//Validar metodos
$parametro = '';
$metodoIndice = ($isAdmin) ? 2 : 1 ;
if (!empty($array[$metodoIndice]) && $array[$metodoIndice] != '') {
    $metodo = $array[$metodoIndice];
}
//Validar metodos
$parametro = '';
$parametroIndice = ($isAdmin) ? 3 : 2 ;
if (!empty($array[$metodoIndice]) && $array[$metodoIndice] != '') {
    for ($i = $parametroIndice; $i < count($array) ; $i++) { 
        $parametro .= $array[$i] . ',';
    }
    $parametro = trim($parametro, ',');
}
//Validar diretório de controllers
$dirControllers = ($isAdmin) ? 'controllers/admin' . $controller . '.php' : 'controllers/principal' . $controller . '.php' ;
if (file_exists($dirControllers)) {
    require_once $dirControllers;
    $controller = new $controller();
    if (method_exists($controller, $metodo)) {
        $controller->$metodo($parametro);
    } else {
        echo 'Método não encontrado';
    }
} else {
    echo 'Controlador não encontrado';
}

