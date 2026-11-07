<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    <title>Dev Login</title>
</head>
<body>
    <main class="container">
        <form action="login.php" method="POST">
            <h1>Login Club</h1>

            <div class="input-box">
                <input placeholder="Usuário" type="email" name="email" required>   
                <i class="bx bx-user"></i>     
            </div>
            
            <div class="input-box">
                <input placeholder="Senha" type="password" name="senha" required>        
                <i class="bx bx-lock-alt"></i>
            </div>
                
            <div class="remember-forgot">
                <label>
                    <input type="checkbox"> Lembrar senha
                </label>
                    <a href="#">Esquecei a senha?</a>
            </div>

            <div class="button"> 
                <button type="submit" class="btn">Entrar</button>
            </div>

            <div class="login-register">
                <p>Para se cadastrar, <a href="#">Clique aqui</a></p>
            </div>
        </form>            
    </main>
</body>
</html>