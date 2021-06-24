<?php

use App\Core\Model;

class Produto {

    public $id;
    public $descricao;
    public $peso;
    public $quantidade;
    public $cor;
    public $tamanho;
    public $valor;
    public $desconto;
    public $imagem;

    public function listarTodos(){
        $sql = " SELECT p.*, c.descricao as categoria FROM tbl_produto p
                 INNER JOIN tbl_categoria c ON p.categoria_id = c.id ORDER BY p.id DESC ";

        $stmt = Model::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_OBJ);

            return $resultado;
        }else{
            return [];
        }
    }

    public function buscarPorId($id) {

        $sql = " SELECT * FROM tbl_produto WHERE id = ? ";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        if ($stmt->execute()) {

            $produto = $stmt->fetch(PDO::FETCH_OBJ);
            if (!$produto) {
                return false;
            }

            $this->id = $produto->id;
            $this->descricao = $produto->descricao;
            $this->peso = $produto->peso;
            $this->quantidade = $produto->quantidade;
            $this->cor = $produto->cor;
            $this->tamanho = $produto->tamanho;
            $this->valor = $produto->valor;
            $this->desconto = $produto->desconto;
            $this->imagem = $produto->imagem;
            $this->categoria_id = $produto->categoria_id;
            return $this;

        } else {
            return false;
        }
    }

    public function deletar() {

        $sql = " DELETE FROM tbl_produto WHERE id = ? ";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $this->id);
        return $stmt->execute();
    }

}
