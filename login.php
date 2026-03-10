<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>MonsterGraphic | Acesso Restrito</title>
    <style>
        body {
            background: #050507;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Orbitron', sans-serif;
        }

        .login-box {
            background: rgba(20, 20, 25, 0.9);
            padding: 40px;
            border-radius: 15px;
            border: 1px solid #00f2ff;
            box-shadow: 0 0 30px rgba(0, 242, 255, 0.1);
            width: 350px;
            text-align: center;
        }

        .login-box h2 {
            color: #fff;
            letter-spacing: 3px;
            margin-bottom: 30px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            background: #111;
            border: 1px solid #333;
            color: #00f2ff;
            border-radius: 5px;
            outline: none;
        }

        input:focus { border-color: #9d00ff; }

        button {
            width: 100%;
            padding: 15px;
            background: linear-gradient(45deg, #00f2ff, #9d00ff);
            border: none;
            color: white;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
            transition: 0.3s;
        }

        button:hover { transform: scale(1.05); box-shadow: 0 0 20px #9d00ff; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>LOGIN</h2>
        <form action="auth.php" method="POST">
            <input type="email" name="email" placeholder="CÓDIGO DE ACESSO (EMAIL)" required>
            <input type="password" name="senha" placeholder="CHAVE DE SEGURANÇA" required>
            <button type="submit">ENTRAR NO SISTEMA</button>
        </form>
    </div>
</body>
</html>