<?php
    require_once("SupportRestHandler.php");
    $method = $_SERVER['REQUEST_METHOD'];
    if(isset($_GET["page_key"]))
        $page_key = $_GET["page_key"];
        switch($page_key){
            case "listUs":
                echo 'qwe'.$_GET["id"];
                echo 'QWE'.$_GET["page_key"];
                //Select de todos los usuarios;
            break;
            case "listUsu":
                $supportRestHandler = new SupportRestHandler();
                $result = $supportRestHandler->getUsuarios($_GET["id"]);
            break;
            case "selSolici":
                $supportRestHandler = new SupportRestHandler();
                $result = $supportRestHandler->getSolicitudes($_GET["id"]);
            break;
            case "buscSolici":
                $supportRestHandler = new SupportRestHandler();
                $result = $supportRestHandler->getBuscarSolis($_GET["id"]);
            break;
            case "regSoli":
                $supportRestHandler = new SupportRestHandler();
                $supportRestHandler->createsolis();
            break;
            case "listSiste":
                $supportRestHandler = new SupportRestHandler();
                $supportRestHandler->getSistemas();
            break;
            case "lisClasi":
                $supportRestHandler = new SupportRestHandler();
                $supportRestHandler->getClasifs();
            break;
            case "regAdju":
                $supportRestHandler = new SupportRestHandler();
                $supportRestHandler->createadjus();
            break;
            case "selSoliEdit":
                $supportRestHandler = new SupportRestHandler();
                $supportRestHandler->getselSoliEdits($_GET["id"]);
            break;
            case "editSoli":
                $supportRestHandler = new SupportRestHandler();
                $supportRestHandler->updateSolis($_GET["id"]);
            break;
            case "regAtenc":
                $supportRestHandler = new SupportRestHandler();
                $supportRestHandler->createatens($_GET["id"]);
            break;
        }
?>