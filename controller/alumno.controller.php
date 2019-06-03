<?php
require_once 'model/alumno.php';

class AlumnoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Alumno();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/alumno/alumno.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Alumno();
        
        if(isset($_REQUEST['IdUsuario'])){
            $alm = $this->model->Obtener($_REQUEST['IdUsuario']);
        }
        
        require_once 'view/header.php';
        require_once 'view/alumno/alumno-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Alumno();
        
        $alm->id = $_REQUEST['IdUsuario'];
        $alm->Nombre = $_REQUEST['nombre'];
        $alm->contrasena = $_REQUEST['contrasena'];
        $alm->claveApi = $_REQUEST['claveApi'];
        $alm->Correo = $_REQUEST['correo'];

        $alm->id > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['IdUsuario']);
        header('Location: index.php');
    }
}