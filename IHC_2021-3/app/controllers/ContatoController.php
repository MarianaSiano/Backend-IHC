<?php

namespace App\Controllers;

use App\Core\App;
use Exception;
use PHPMailer\PHPMailer\PHPMailer;

class ContatoController
{
    public function contato()
    {
        return view('/site/contato');
    }
    public function enviarEmail()
    {
        $dados = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'assunto' => $_POST['assunto'],
            'mensagem' => $_POST['mensagem'],
            'telefone' => $_POST['telefone']
        ];
        $msg = ['status' => null, 'tipo' => null];
        if (empty($dados["nome"]) || empty($dados["email"]) || empty($dados["assunto"]) || empty($dados["mensagem"]) || empty($dados["telefone"])) {
            $msg['status'] = "Preencha todos os campos";
            $msg['tipo'] = "warning";
        } else {
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'teste@mail.co';
            $mail->Password = '';
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;

            $mail->setFrom("teste@mail.co", $dados["nome"]);
            $mail->addAddress("teste@mail.co");
            $mail->addReplyTo($dados["email"]);
            $mail->isHTML(true);
            $mail->Subject = $dados["assunto"];
            $mail->Body = "Nome: " . $dados["nome"] . "<br><br>"
                . $dados["mensagem"] . "<br><br>"
                . "Telefone: " . $dados["telefone"];
            if ($mail->send()) {
                $msg['status'] = "Email enviado com sucesso!";
                $msg['tipo'] = "success";
            } else {
                $msg['status'] = "Email não enviado! Erro inesperado";
                $msg['tipo'] = "danger";
            }
        }

        echo "<script>
            window.onload = function() {
                const elemento = document.getElementById('status');
                elemento.innerText = '{$msg['status']}';
                elemento.classList.add('text-{$msg['tipo']}', 'lead');
            }
            </script>";
        return view('site/contato');
    }
    public function show()
    {
    }

    public function create()
    {
    }

    public function store()
    {
    }

    public function edit()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}
