<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$conexao = new mysqli("127.0.0.1", "root", "root", "meu_projeto", 3306);
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
  <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
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
        echo "<h1>Usuário ou senha não incorretos</h1>
          <a href='index.php' class='back-button'>Voltar</a>";
    }
  } else {
    echo "<h1>Usuário ou senha não incorretos</h1>
      <a href='index.php' class='back-button'>Voltar</a>";
  }
  ?>

</body>
</html>