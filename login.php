<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$conexao = new mysqli("db", "root", "root", "meu_projeto", 3306);
if ($conexao->connect_error) { die("Erro: ".$conexao->connect_error); }

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

if (empty($email) || empty($senha)) {
    header("Location: index.php");
    exit;
}

$stmt = $conexao->prepare("SELECT senha FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$res = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
</head>
<body>

<?php
if ($linha = $res->fetch_assoc()) {
    if (password_verify($senha, $linha['senha'])) {
?>
        <div class="bem-vinda">
            <h1>Login realizado com sucesso! Bem-vindo!</h1>
            <a href="index.php" class="back-button">Voltar</a>
        </div>
<?php
    } else {
?>
        <div class="bem-vinda">
            <h1>Usuário ou senha incorretos</h1>
            <a href="index.php" class="back-button">Voltar</a>
        </div>
<?php
    }
} else {
?>
        <div class="bem-vinda">
            <h1>Usuário ou senha incorretos</h1>
            <a href="index.php" class="back-button">Voltar</a>
        </div>
<?php
}
?>

</body>
</html>