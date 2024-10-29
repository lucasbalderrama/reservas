 <?php
class PrincipalModelo extends Conexion {
    private  $con;
    public function __construct() {
        $this->con = new Conexion();
    }
    public function fazerTeste() {
        $data = $this->con->conectar();
        return $data;
    }
}
 ?>