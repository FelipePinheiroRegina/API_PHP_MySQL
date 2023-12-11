<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST API</title>
</head>
<body>
    <pre>
    <?php 
    require_once "../class/database.class.php";
    $con = Database::getConexao();

    $acao = $_REQUEST["acao"];
    $return = array();

    if ($acao === "carregar-minhas-metas"){
        $query = "SELECT * FROM metas"; // Varre as informações do meu BD

        $consulta = $con->prepare($query); // consulta as querys do meu BD
        $consulta->execute(); // executa a consulta

        while ($data = $consulta->fetch(PDO::FETCH_ASSOC)){
            $return[] = array(
                "id" => $data["id_meta"],
                "id_usuario" => $data["id_usuario"],
                "titulo" => $data["titulo"],
                "total" => $data["valor_total"],
                "valor_inicial" => $data["valor_inicial"],
                "data_limite" => $data["data_limite"],
                "data_cadastro" => $data["data_cadastro"],
                
            );
        }

    }

    die(json_encode($return));
    
    
    
    

    ?>
    </pre>
</body>
</html>
