<?php
class Views {
    public function getView($rota, $vista, $data="") {
        if ($rota == 'principal') {
            $vista = 'views/' . $vista . '.php';
        }
        else {
            $vista = 'views/' . $rota . '/' . $vista . '.php';
        }
        require $vista;
    }
}
?>