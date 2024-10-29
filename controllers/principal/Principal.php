<?php
class Principal extends Controller {
    public  function __construct() { 
        parent::__construct();
    }
    public function index() {
        $data = $this->model->fazerTeste();
        print_r($data);
        $this->views->getView('principal', 'index', $data);
    }
}
?>