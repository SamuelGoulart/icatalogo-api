<?php

use App\Core\Controller;

class Produtos extends Controller {

    // lista todos os produtos
    public function index() {
        $produtoModel = $this->model("Produto");

        $dados = $produtoModel->listarTodos();

       //colocar os dados no corpo da requisição
       echo json_encode($dados, JSON_UNESCAPED_UNICODE);
    }

    public function find($id) {
        $produtoModel = $this->model("Produto");
        $produtoModel = $produtoModel->buscarPorId($id);

        if($produtoModel){
           echo json_encode($produtoModel, JSON_UNESCAPED_UNICODE);
        }else{
            //não encontrou a produto id
            http_response_code(404);

            $erro = ["erro" => "Produto não encontrada"];
            
            echo json_encode($erro, JSON_UNESCAPED_UNICODE);
        }
    }

    public function delete($id){
        //instanciamos o model, colocando nele a descricao recebida
        $produtoModel = $this->model("produto");
        $produtoModel = $produtoModel->buscarPorId($id);
  
        //verificando se o id passado não existe, retornando erro
        if(!$produtoModel){
              http_response_code(404);
              echo json_encode(["erro" => "produto não encontrada"]);
              exit;
        }
 
        if($produtoModel->deletar()){
            http_response_code(204);
        }else{
            http_response_code(500);
            echo json_encode(["erro" => "Problemas ao excluir a produto"]);
        }
    }
}
