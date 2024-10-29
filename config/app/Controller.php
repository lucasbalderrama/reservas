<?php
class Controller {
    protected $model, $views;
    public function __construct() {
        $this->modeloCarga();
        $this->views = new Views();
    }

    public function modeloCarga() {
        $isAdmin = strpos($_SERVER['REQUEST_URI'], '/' . ADMIN) !== false;
        $modelNome = get_class($this) . 'Modelo';
        $rota = ($isAdmin) ? 'models/admin/' . $modelNome . '.php' : 'models/principal/'  . $modelNome   ;
        if (file_exists($rota)) {
            require_once($rota);
            $this->model = new $modelNome();
        }
    }                       
}
?>