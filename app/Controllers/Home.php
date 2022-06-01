<?php

namespace App\Controllers;

use App\Models\PessoasModel;

class Home extends BaseController
{
    
    public function index()
    {
        echo view('template/header');
        echo view('home');
        echo view('template/footer');
    }

    public function page($page='home'){
        
        echo view('template/header');
        echo view($page);
        echo view('template/footer');
    }

    public function pessoas(){
        $model = new PessoasModel();

        $data = [
            'title'=>'Pessoas',
            'pessoas'=>$model->getPessoas()
        ];

        echo view('template/header');
        echo view('pessoa',$data);
        echo view('template/footer');
    }

    public function cadastro(){
        echo view('template/header');
        echo view('cadastro-pessoas');
        echo view('template/footer');
    }

    public function gravar(){
        $model = new PessoasModel();

        $model->save([
            'id' => $this->request->getVar('id'),
            'nome' => $this->request->getVar('nome'),
            'profissao' => $this->request->getVar('profissao'),
            'idade' => $this->request->getVar('idade')
        ]);

        return redirect('pessoa');
    }

    public function excluir($id = null){
        $model = new PessoasModel();
        $model->delete($id);
        return redirect("pessoa");
    }

    public function editar($id = null){
        $model = new PessoasModel();

        $data = [
            'pessoa' => $model->getPessoa($id)
        ];

        echo view('template/header');
        echo view('cadastro-pessoas',$data);
        echo view('template/footer');
    }

    public function login(){
        echo view('template/header');
        echo view('login');
        echo view('template/footer');
    }

    Public function logar(){
         $model = new PessoasModel();

         $senha = $this->request->getVar("senha");
         $nome = $this->request->getVar("nome");

         $data['usario'] = $model->userLogin($nome, $senha);

         if(empty($data['usario'])){
             return redirect("login");
         }else{
             return redirect("pessoa");
         }
    }
}
