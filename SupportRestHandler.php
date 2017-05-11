<?php
    require_once("SimpleRest.php");
    require_once("Support.php");
    class SupportRestHandler extends SimpleRest{
        function getUsuarios($id){
            $support = new Support();
            $rawData = $support->getUsuario($id);
            echo json_encode($rawData);
            if(empty($rawData)){
                $statusCode = 404;
                $rawData = array('success' => 0);
            }else{
                $statusCode = 200;
            }
            $requestContentType = $_SERVER['HTTP_ACCEPT'];
            $this ->setHttpHeaders($requestContentType, $statusCode);
            $result["output"] = $rawData;

            if(strpos($requestContentType,'application/json') !== false){
                $response = $this->encodeJson($result);
                echo $response;
            }
        }

        function getSolicitudes($id){
            $support = new Support();
            $rawData = $support->getSolicitud($id);
            echo json_encode($rawData);
            if(empty($rawData)){
                $statusCode = 404;
                $rawData = array('success' => 0);
            }else{
                $statusCode = 200;
            }
            $requestContentType = $_SERVER['HTTP_ACCEPT'];
            $this ->setHttpHeaders($requestContentType, $statusCode);
            $result["output"] = $rawData;

            if(strpos($requestContentType,'application/json') !== false){
                $response = $this->encodeJson($result);
                echo $response;
            }
        }

        function getBuscarSolis($id){
            $support = new Support();
            $rawData = $support->getBuscarSoli($id);
            echo json_encode($rawData);
            if(empty($rawData)){
                $statusCode = 404;
                $rawData = array('success' => 0);
            }else{
                $statusCode = 200;
            }
            $requestContentType = $_SERVER['HTTP_ACCEPT'];
            $this ->setHttpHeaders($requestContentType, $statusCode);
            $result["output"] = $rawData;

            if(strpos($requestContentType,'application/json') !== false){
                $response = $this->encodeJson($result);
                echo $response;
            }
        }

        function createsolis() {	
            $support = new support();
            $rawData = $support->createsoli();
            if(empty($rawData)) {
                $statusCode = 404;
                $rawData = array('success' => 0);		
            } else {
                $statusCode = 200;
            }
            
            $requestContentType = $_SERVER['HTTP_ACCEPT'];
            $this ->setHttpHeaders($requestContentType, $statusCode);
            $result = $rawData;
                    
            if(strpos($requestContentType,'application/json') !== false){
                $response = $this->encodeJson($result);
                echo $response;
            }
	    }

        function getSistemas(){
            $support = new Support();
            $rawData = $support->getSistema();
            echo json_encode($rawData);
            if(empty($rawData)){
                $statusCode = 404;
                $rawData = array('success' => 0);
            }else{
                $statusCode = 200;
            }
            $requestContentType = $_SERVER['HTTP_ACCEPT'];
            $this ->setHttpHeaders($requestContentType, $statusCode);
            $result["output"] = $rawData;

            if(strpos($requestContentType,'application/json') !== false){
                $response = $this->encodeJson($result);
                echo $response;
            }
        }

        function getClasifs(){
            $support = new Support();
            $rawData = $support->getClasif();
            echo json_encode($rawData);
            if(empty($rawData)){
                $statusCode = 404;
                $rawData = array('success' => 0);
            }else{
                $statusCode = 200;
            }
            $requestContentType = $_SERVER['HTTP_ACCEPT'];
            $this ->setHttpHeaders($requestContentType, $statusCode);
            $result["output"] = $rawData;

            if(strpos($requestContentType,'application/json') !== false){
                $response = $this->encodeJson($result);
                echo $response;
            }
        }

        function createadjus(){
            $support = new Support();
            $rawData = $support->createadju();
            echo json_encode($rawData);
            if(empty($rawData)){
                $statusCode = 404;
                $rawData = array('success' => 0);
            }else{
                $statusCode = 200;
            }
            $requestContentType = $_SERVER['HTTP_ACCEPT'];
            $this ->setHttpHeaders($requestContentType, $statusCode);
            $result["output"] = $rawData;

            if(strpos($requestContentType,'application/json') !== false){
                $response = $this->encodeJson($result);
                echo $response;
            }
        }

        function getselSoliEdits($id){
            $support = new Support();
            $rawData = $support->getselSoliEdit($id);
            echo json_encode($rawData);
            if(empty($rawData)){
                $statusCode = 404;
                $rawData = array('success' => 0);
            }else{
                $statusCode = 200;
            }
            $requestContentType = $_SERVER['HTTP_ACCEPT'];
            $this ->setHttpHeaders($requestContentType, $statusCode);
            $result["output"] = $rawData;

            if(strpos($requestContentType,'application/json') !== false){
                $response = $this->encodeJson($result);
                echo $response;
            }
        }

        function updateSolis($id){
            $support = new Support();
            $rawData = $support->updateSoli($id);
            echo json_encode($rawData);
            if(empty($rawData)){
                $statusCode = 404;
                $rawData = array('success' => 0);
            }else{
                $statusCode = 200;
            }
            $requestContentType = $_SERVER['HTTP_ACCEPT'];
            $this ->setHttpHeaders($requestContentType, $statusCode);
            $result["output"] = $rawData;

            if(strpos($requestContentType,'application/json') !== false){
                $response = $this->encodeJson($result);
                echo $response;
            }
        }

        function createatens($id){
            $support = new Support();
            $rawData = $support->createaten($id);
            echo json_encode($rawData);
            if(empty($rawData)){
                $statusCode = 404;
                $rawData = array('success' => 0);
            }else{
                $statusCode = 200;
            }
            $requestContentType = $_SERVER['HTTP_ACCEPT'];
            $this ->setHttpHeaders($requestContentType, $statusCode);
            $result["output"] = $rawData;

            if(strpos($requestContentType,'application/json') !== false){
                $response = $this->encodeJson($result);
                echo $response;
            }
        }
    }
?>