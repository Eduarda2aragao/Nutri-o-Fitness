<?php
class ClassUsuario
{
    private $id;
    private $nome;
    private $sobrenome;
    private $email;
    private $senha;

    public function __construct($nome, $sobrenome, $email, $senha) {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->email = $email;
        $this->senha = $senha;
    } 
    
    function getId()
    {
        return $this->id;
    }

    function getNome()
    {
        return $this->nome;
    }

    function getSobrenome()
    {
        return $this->sobrenome;
    }

    function getEmail()
    {
        return $this->email;
    }
    function getSenha()
    {
        return $this->senha;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setNome($nome)
    {
        $this->nome = $nome;
    }

    
    function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }
    
    function setSenha($senha)
    {
        $this->senha = $senha;
    }
}
