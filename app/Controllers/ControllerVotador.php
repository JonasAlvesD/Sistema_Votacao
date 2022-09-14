<?php

require_once('app/Database/ConexaoDB.php');
require_once('app/Controllers/ControllerVotador.php');

$votadorDao = new ControllerVotador();


class ControllerVotador
{
    public function createVotador(Votador $votador){
        try{
            $insertVotador = "INSERT INTO votadores (nome, cpf, idade, RN) VALUES (:nome, :cpf, :idade, :RN)";
            $stmt = ConexaoDB::getConn()->prepare($insertVotador);
            $stmt->bindValue(':nome', $votador->getNome());
            $stmt->bindValue(':cpf', $votador->getCpf());
            $stmt->bindValue(':idade', $votador->getIdade());
            $stmt->bindValue(':RN', $votador->getRn());
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function readVotador(){
        try{
            $queryVotador = "SELECT * FROM votadores";
            $stmt = ConexaoDB::getConn()->prepare($queryVotador);
            $stmt->execute();

            if($stmt->rowCount()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function updateVotador(Votador $votador){

    }

    public function deleteVotador(int $id){

    }
}

?>