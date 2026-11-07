<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$conexao = new mysqli("db", "root", "root", "login_club", 3306);
if ($conexao->connect_error) { die("Erro: ".$conexao->connect_error); }

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

$stmt = $conexao->prepare("SELECT senha FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$res = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
  <title>Login Club</title>
</head>
<body>

<?php
if ($linha = $res->fetch_assoc()) {
    if (password_verify($senha, $linha['senha'])) {
?>
        <div class="bem-vinda">
            <h1>Login realizado com sucesso! Bem-vindo!</h1>
            <div class="back-link">
                <a href="index.php" class="back-button">Voltar</a>
            </div>
        </div>
<?php
    } else {
?>
        <div class="erro">
            <h1>Login inválido e/ou senha incorreta</h1>
            <p>Tente novamente, Maria.</p>
            <div class="back-link">
                <a href="index.php" class="back-button">Voltar</a>
            </div>
        </div>
<?php
    }
} else {
?>
        <div class="erro">
            <h1>Login inválido e/ou senha incorreta</h1>
            <p>Usuário não encontrado. Tente novamente.</p>
            <div class="back-link">
                <a href="index.php" class="back-button">Voltar</a>
            </div>
        </div>
<?php
}
?>

</body>
</html>