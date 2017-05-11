<?php
    require_once("dbcontroller.php");
    /* 
    A domain Class to demonstrate RESTful web services
    */
    Class Support{
        private $supports = array();
        public function getUsuario(){
            $idUsu = $_GET['id'];
            $query = 'SELECT * FROM usuario WHERE id_usuario = "' .$idUsu. '"';
            $dbcontroller = new DBController();
            $this->supports = $dbcontroller->executeSelectQuery($query);
            return $this->supports;
        }

        public function getSolicitud(){
            $idCli = $_GET['id'];
            $query = 'SELECT * FROM solicitud  WHERE id_cliente = "' .$idCli. '"';
            $dbcontroller = new DBController();
            $this->supports = $dbcontroller->executeSelectQuery($query);
            return $this->supports;
        }

        public function getBuscarSoli(){
            $busca = $_GET['id'];
            $query = 'SELECT * FROM solicitud  WHERE nroTicket LIKE "%' .$busca. '%" OR fecha_hora_solicitud LIKE "%' .$busca. '%" OR descripcion LIKE "%' .$busca. '%"';
            $dbcontroller = new DBController();
            $this->supports = $dbcontroller->executeSelectQuery($query);
            return $this->supports;
        }

        public function createsoli(){
            if(isset($_POST['id_solicitud'])){
                $idSolicitud = $_POST['id_solicitud'];
                $nroTick = '';
                $idcliente = '';
                $fechaHoraSolicitud = '';
                $idSistema  = '';
                $descripcion = '';
                $idClasificacion = '';
                if(isset($_POST['nroTicket'])){
                    $nroTick = $_POST['nroTicket'];
                }
                if(isset($_POST['id_cliente'])){
                    $idcliente = $_POST['id_cliente'];
                }	
                if(isset($_POST['fecha_hora_solicitud'])){
                    $fechaHoraSolicitud = $_POST['fecha_hora_solicitud'];
                }	
                if(isset($_POST['id_sistema'])){
                    $idSistema = $_POST['id_sistema'];
                }	
                if(isset($_POST['descripcion'])){
                    $descripcion = $_POST['descripcion'];
                }	
                if(isset($_POST['id_clasificacion'])){
                    $idClasificacion = $_POST['id_clasificacion'];
                }
                $query = "insert into solicitud (id_solicitud, nroTicket, id_cliente, fecha_hora_solicitud, id_sistema, descripcion, id_clasificacion, atendido) values ('" . $idSolicitud ."','" . $nroTick ."','" . $idcliente ."','" . $fechaHoraSolicitud ."','" . $idSistema ."','" . $descripcion ."','" . $idClasificacion ."',0)";
                $dbcontroller = new DBController();
                $result = $dbcontroller->executeQuery($query);
                if($result != 0){
                    $result = array('success'=>1);
                    return $result;
                }
            }
	    }

        public function getSistema(){
            $query = 'SELECT * FROM sistema ';
            $dbcontroller = new DBController();
            $this->supports = $dbcontroller->executeSelectQuery($query);
            return $this->supports;
        }

        public function getClasif(){
            $query = 'SELECT * FROM clasificacion ';
            $dbcontroller = new DBController();
            $this->supports = $dbcontroller->executeSelectQuery($query);
            return $this->supports;
        }

        public function createadju(){
            if(isset($_POST['id_adjunto'])){
                $idAdjunto = $_POST['id_adjunto'];
                $descripAdj = '';
                $dirAdj = '';
                $idsolicit = '';
                if(isset($_POST['descripcion_adjunto'])){
                    $descripAdj = $_POST['descripcion_adjunto'];
                }
                if(isset($_POST['direccion_adjunto'])){
                    $dirAdj = $_POST['direccion_adjunto'];
                }	
                if(isset($_POST['id_solicitud'])){
                    $idsolicit = $_POST['id_solicitud'];
                }	
                $query = "insert into adjunto (id_adjunto,descripcion_adjunto,direccion_adjunto,id_solicitud) values ('" . $idAdjunto ."','" . $descripAdj ."','" . $dirAdj ."','" . $idsolicit ."')";
                $dbcontroller = new DBController();
                $result = $dbcontroller->executeQuery($query);
                if($result != 0){
                    $result = array('success'=>1);
                    return $result;
                }
            }
	    }

        public function getselSoliEdit(){
            $idSolic = $_GET['id'];
            $query = 'SELECT * FROM solicitud,adjunto WHERE solicitud.id_solicitud = "' .$idSolic. '" AND solicitud.id_solicitud=adjunto.id_solicitud';
            $dbcontroller = new DBController();
            $this->supports = $dbcontroller->executeSelectQuery($query);
            return $this->supports;
        }

        public function updateSoli(){
            if(isset($_POST['id_solicitud']) && isset($_GET['id']) ){
                $idSolicitud = $_POST['id_solicitud'];
                $nroTick = $_POST['nroTicket'];
                $idcliente = $_POST['id_cliente'];
                $fechaHoraSolicitud = $_POST['fecha_hora_solicitud'];
                $idSistema  = $_POST['id_sistema'];
                $descripcion = $_POST['descripcion'];
                $idClasificacion = $_POST['id_clasificacion'];
                $descripAdj=$_POST['descripcion_adjunto'];
                $direccionAdj=$_POST['direccion_adjunto'];
                $query = "update solicitud SET nroTicket='" . $nroTick . "', id_cliente='" . $idcliente ."', fecha_hora_solicitud='" . $fechaHoraSolicitud ."', id_sistema='" . $idSistema ."', descripcion='" . $descripcion ."', id_clasificacion='" . $idClasificacion ."' WHERE id_solicitud ='" . $_GET['id'] ."'";
                $query2 = "update adjunto SET descripcion_adjunto ='" . $descripAdj . "', direccion_adjunto='" . $direccionAdj ."' WHERE id_solicitud ='" . $_GET['id'] ."'";
                $dbcontroller = new DBController();
                $result = $dbcontroller->executeQuery($query);
                $result2 = $dbcontroller->executeQuery($query2);
                if($result != 0){
                    if($result2 != 0){
                    $result = array('success'=>1);
                    return $result;
                    }
                }
            }
	    }

        public function createaten(){
            if(isset($_POST['id_atencion'])){
                $idAtenc = $_POST['id_atencion'];
                $idSolicitud = '';
                $fechaHoraSolicitud = '';
                $observ  = '';
                $idUsuario = '';
                if(isset($_GET['id'])){
                    $idSolicitud = $_GET['id'];
                }	
                if(isset($_POST['fecha_hora_solicitud'])){
                    $fechaHoraSolicitud = $_POST['fecha_hora_solicitud'];
                }	
                if(isset($_POST['observacion'])){
                    $observ = $_POST['observacion'];
                }	
                if(isset($_POST['id_usuario'])){
                    $idUsuario = $_POST['id_usuario'];
                }	
                $query = "insert into atencion (id_atencion, id_solicitud, fecha_hora_atencion, observacion, id_usuario) values ('" . $idAtenc ."','" . $idSolicitud ."','" . $fechaHoraSolicitud ."','" . $observ ."','" . $idUsuario ."')";
                $query2 = "update solicitud SET atendido= 1 WHERE id_solicitud ='" . $_GET['id'] ."'";
                $dbcontroller = new DBController();
                $result = $dbcontroller->executeQuery($query);
                $result2 = $dbcontroller->executeQuery($query2);
                if($result != 0){
                    if($result2 != 0){
                    $result = array('success'=>1);
                    return $result;
                    }
                }
            }
	    }
    }
?>