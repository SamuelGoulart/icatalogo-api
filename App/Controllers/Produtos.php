<?php

use App\Core\Controller;

class Produtos extends Controller
{

    // lista todos os produtos
    public function index()
    {
        $produtoModel = $this->model("Produto");

        $produtos = $produtoModel->listarTodos();

        $produtos = array_map(function ($p) {
            $p->categoria = ["id" => $p->categoria_id, "descricao" => $p->categoria];
            unset($p->categoria_id);
            return $p;
        }, $produtos);

        //colocar os produtos no corpo da requisição
        echo json_encode($produtos, JSON_UNESCAPED_UNICODE);
    }

    public function find($id)
    {
        $produtoModel = $this->model("Produto");

        $produtoModel = $produtoModel->buscarPorId($id);

        if ($produtoModel) {
            $produtoModel->categoria = [
                "id" => $produtoModel->categoria_id,
                "descricao" => $produtoModel->categoria
            ];
            unset($produtoModel->categoria_id);

            echo json_encode($produtoModel, JSON_UNESCAPED_UNICODE);
        } else {
            http_response_code(404);
            json_encode(["erro" => "Produto não encontrado"]);
        }
    }

    public function delete($id)
    {
        //instanciamos o model, colocando nele a descricao recebida
        $produtoModel = $this->model("produto");
        $produtoModel = $produtoModel->buscarPorId($id);

        //verificando se o id passado não existe, retornando erro
        if (!$produtoModel) {
            http_response_code(404);
            echo json_encode(["erro" => "produto não encontrada"]);
            exit;
        }

        if ($produtoModel->deletar()) {
            http_response_code(204);
        } else {
            http_response_code(500);
            echo json_encode(["erro" => "Problemas ao excluir a produto"]);
        }
    }
}
