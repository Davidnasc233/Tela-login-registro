<?php

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=login_cadastro', 'root', '');
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $email, $senha]);
        
        header("Location: index.html?cadastro=sucesso");
        exit;
    } catch(PDOException $e) {
        echo"erro ao cadastrar: " . $e->getMessage();
    }


?>