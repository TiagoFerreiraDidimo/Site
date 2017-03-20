
<?php

// Create Tiago Ferreira
//INICIAR CONEXAO COM BANCO DE DADOS
include '../../_admin/conection_data_base.php';
//INICIAR MODEL DE INSTITUICAO PARA CRIAR UM OBJETO
include '../model/Instituicao.php';

//CRIANDO UM OBJETO
$instituicao = new Instituicao();

//ATRIBUINDO VALORES
$instituicao->setId($_POST['id']);
$instituicao->setEmail($_POST['email']);
$instituicao->setNome($_POST['nome']);
$instituicao->setSenha($_POST['senha']);
$instituicao->setCI($_POST['ci']);
$instituicao->setDescricao($_POST['descricao']);
$instituicao->setCategoria($_POST['categoria']);
$instituicao->setCidade($_POST['cidade']);
$instituicao->setBairro($_POST['bairro']);
$instituicao->setRua($_POST['rua']);
$instituicao->setNumero($_POST['numero']);
$instituicao->setTelefone($_POST['telefone']);

//CADASTRO DA INSTITUIÇAO QUE SÓ PODE SER FEITO POR UM ADMINISTRADOR\
if (isset($_POST['cadastro_inst'])) {
    echo 'cadastro!';
    $cadastro = $pdo->query("INSERT INTO easy_instituicao(inst_id, inst_email, inst_nome, inst_password, inst_CI, inst_descricao, inst_categoria, inst_rua, inst_numero, inst_cidade, inst_bairro, inst_telefone) VALUES "
            . "(" . $instituicao->getId() . ""
            . ",'" . $instituicao->getEmail() . "',"
            . ",'" . $instituicao->getNome() . "',"
            . ",'" . $instituicao->getSenha() . "',"
            . ",'" . $instituicao->getCI() . "',"
            . ",'" . $instituicao->getDescricao() . "',"
            . ",'" . $instituicao->getCategoria() . "',"
            . ",'" . $instituicao->getRua() . "',"
             . ",'" . $instituicao->getNumero() . "',"
            . ",'" . $instituicao->getCidade() . "',"
            . ",'" . $instituicao->getBairro(). "',"
            . ", '" . $instituicao->getTelefone() . "')");
}
//ATUALIZAR AS INFORMAÇÕES DA INSTITUICAO
elseif (isset($_POST['atualizar_inst'])) {

    $update = $pdo->prepare("UPDATE usuario SET nome=:nome, email=:email, senha=:senha, telefone=:telefone, endereco=:endereco WHERE cpf=:cpf");
    $update->bindValue(":cpf", $usuario->cpf__get());
    $update->bindValue(":email", $usuario->email__get());
    $update->bindValue(":senha", $usuario->senha__get());
    $update->bindValue(":telefone", $usuario->telefone__get());
    $update->bindValue(":endereco", $usuario->endereco__get());
    $update->bindValue(":nome", $usuario->name__get());
    $update->execute();
    if ($update->rowCount() > 0):

        echo 'USUARIO ATUALIZADO COM SUCESSO!';
    else:
        echo 'DESCULPE, O USUARIO NAO FOI ATUALIZADO';
    endif;
}
//Deletar usuarios
elseif (isset($_POST['del'])) {

    $update = $pdo->prepare("DROP FROM usuario WHERE cpf=:cpf");
    $update->bindValue(":cpf", $usuario->cpf__get());
    $update->execute();
    if ($update->rowCount() > 0):

        echo 'DELETADO COM SUCESSO!';
    else:
        echo 'DESCULPE, O USUARIO NAO FOI DELETADO';
    endif;
}
//Listar usuarios





?>
