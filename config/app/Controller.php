<?php

class Controller {
    public function carregarModel() {
        $isAdmin = strpos($_SERVER['REQUEST_URI'], '/' . ADMIN) !== false;
    }
}

?>