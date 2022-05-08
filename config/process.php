<?php

session_start();

include_once("connection.php");
include_once("url.php");

$data = $_POST;

//modificações no banco
if(!empty($data)){

//crinado dados

    if($data['type'] == "create") {

       $name = $data['name'];
       $phone = $data['phone'];
       $observation = $data['observation'];

       $query = "INSERT INTO contacts (name, phone, observation) VALUES (:name, :phone, :observation)";

       $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":observation", $observation);

        try{

            $stmt->execute();
            $_SESSION['msg'] = "Contato criado com sucesso!";

            }catch(PDOException $e){
                //erro na conexão
                $erro-> $e->getMessage();
                echo "Erro : " . $erro;
            }

    }elseif($data['type'] == "edit"){

        $name = $data['name'];
        $phone = $data['phone'];
        $observation = $data['observation'];
        $id = $data['id'];

        $query="UPDATE contacts
                SET name = :name, phone = :phone, observation = :observation 
                WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":observation", $observation);
        $stmt->bindParam(":id", $id);

        try{

            $stmt->execute();
            $_SESSION['msg'] = "Contato editado com sucesso!";

            }catch(PDOException $e){
                //erro na conexão
                $erro-> $e->getMessage();
                echo "Erro : " . $erro;
            }

    } elseif($data['type'] == 'delete'){

        $id = $data['id'];

        $query = "DELETE FROM contacts WHERE id = :id";
        $stmt = $conn->prepare($query);
 
        $stmt->bindParam(":id", $id);

        try{

            $stmt->execute();
            $_SESSION['msg'] = "Contato deletado com sucesso!";

            }catch(PDOException $e){
                //erro na conexão
                $erro-> $e->getMessage();
                echo "Erro : " . $erro;
            }

    }

    //redirect Home

    header("Location:" . $BASE_URL ."../index.php");

//seleção de dados
}else{
    $id;

    if(!empty($_GET)){
    $id = $_GET['id'];
    }

    //retorna o dado de um contato


    if(!empty($id)){
    //retorna os contatos
    $query = "SELECT * FROM contacts WHERE id = :id";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(":id", $id);

    $stmt->execute();

    $contact = $stmt->fetch();

    }else{
    //Retorna todos os contatos

    $contacts = [];

    $query = "SELECT * FROM contacts";

    $stmt = $conn->prepare($query);

    $stmt->execute();

    $contacts = $stmt->fetchAll();
    }

}

//Fechar conexão

$conn = null;