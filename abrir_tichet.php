<?php
session_start();
// Configurações de conexão
$host = "localhost";
$user = "seu_usuario";
$pass = "sua_senha";
$db   = "monster_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_SESSION['user_id'];
    $mensagem   = $conn->real_escape_string($_POST['mensagem']);
    $assunto    = $conn->real_escape_string($_POST['assunto']);
    
    $sql = "INSERT INTO tickets (user_id, assunto, mensagem, status, data_criacao) 
            VALUES ('$usuario_id', '$assunto', '$mensagem', 'aberto', NOW())";

    if ($conn->query($sql) === TRUE) {
        // Redireciona de volta com sucesso
        header("Location: dashboard.php?sucesso=1");
    } else {
        echo "Erro ao abrir ticket: " . $conn->error;
    }
}
$conn->close();
?>