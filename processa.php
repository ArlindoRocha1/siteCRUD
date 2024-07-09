p<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

//echo "Nome: $nome <br>";
//echo "E-mail; $email";

$criar_usuario = "INSERT INTO usuarios (nome, email, created) VALUES ('$nome', '$email', NOW())";
$usuario_criado = mysqli_query($conn, $criar_usuario);

if (mysqli_insert_id($conn)) {
    $_SESSION['msg'] = "<p style=color:green;'>Usuario cadastrado com sucesso</p>";
    header("Location: cadastro.php");
} else {
    header("Location: cadastro.php");
}