<?php
class ClassUsuarioDAO
{
  public function cadastrar(ClassUsuario $cadastrodousuario)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO Cadastro (Nome, Sobrenome, Email,Senha) values (?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrodousuario->getNome());
            $stmt->bindValue(2, $cadastrodousuario->getSobrenome());
            $stmt->bindValue(3, $cadastrodousuario->getEmail());
            $stmt->bindValue(4, $cadastrodousuario->getSenha());
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
} 
public function login(ClassUsuarioDAO $loginUsuario) {
    try {
        $pdo = Conexao::getInstance();
        $sql = "SELECT * FROM Cadastro WHERE Email=:email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':email', $loginUsuario->getEmail());

        $stmt->execute();
        return $stmt->fetch();
    } catch (PDOException $ex) {
        return $ex->getMessage();
    }
}
public function alterarUsuario(ClassUsuario $alterarUsuario)
{
    try {
        $pdo = Conexao::getInstance();
        $sql = "UPDATE Cadastro SET email=?, senha=? WHERE email=?, senha=?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(2, $alterarUsuario->getEmail());
        $stmt->bindValue(3, $alterarUsuario->getSenha());
        $stmt->execute();
        return $stmt->rowCount();
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}
}
?>