<?php

namespace App\Controllers;

use App\Models\PessoasModel;

use App\Models\CarrossModel;

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
            'pessoas'=>$model->getPessoas(),
            'session' =>\Config\Services::session()
        ];

        if(!$data['session']->get('logado')){
            return redirect("login");
        }

        echo view('template/header');
        echo view('pessoa',$data);
        echo view('template/footer');
    }

    public function cadastro(){

        $data['session'] = \Config\Services::session();

        if(!$data['session']->get('logado')){
            return redirect("login");
        }

        echo view('template/header');
        echo view('cadastro-pessoas');
        echo view('template/footer');
    }

    public function cadastroCarro(){

        $data['session'] = \Config\Services::session();

        if(!$data['session']->get('logado')){
            return redirect("login");
        }

        echo view('template/header');
        echo view('cadastro-carros');
        echo view('template/footer');
    }

    public function gravar(){

        $data['session'] = \Config\Services::session();

        if(!$data['session']->get('logado')){
            return redirect("login");
        }

        $model = new PessoasModel();

        $model->save([
            'id' => $this->request->getVar('id'),
            'nome' => $this->request->getVar('nome'),
            'profissao' => $this->request->getVar('profissao'),
            'idade' => $this->request->getVar('idade'),
            'senha' => MD5($this->request->getVar('senha'))
        ]);

        return redirect('pessoa');
    }

    public function gravarCarro(){

        $data['session'] = \Config\Services::session();

        if(!$data['session']->get('logado')){
            return redirect("login");
        }

        $model = new CarrosModel();

        $model->save([
            'id' => $this->request->getVar('id'),
            'modelo' => $this->request->getVar('modelo'),
            'marca' => $this->request->getVar('marca'),
            'preço' => $this->request->getVar('placa')
        ]);

        return redirect('carro');
    }


    public function excluir($id = null){

        $data['session'] = \Config\Services::session();

        if(!$data['session']->get('logado')){
            return redirect("login");
        }

        $model = new PessoasModel();
        $model->delete($id);
        return redirect("pessoa");
    }

    public function editar($id = null){
        $model = new PessoasModel();

        $data = [
            'pessoa' => $model->getPessoa($id),
            'session' => \Config\Services::session()
        ];

        if(!$data['session']->get('logado')){
            return redirect("login");
        }

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
         $data['session'] = \Config\Services::session();

         if(empty($data['usario'])){
             return redirect("login");
         }else{
             $sessionData = [
                 'usuario' => $nome,
                 'logado' => TRUE
             ];
             $data['session']->set($sessionData);
             return redirect("pessoa");
         }
    }

    public function sair(){
        $data['session'] = \Config\Services::session();
        $data['session']->destroy();
        return redirect("login");
    }
}
