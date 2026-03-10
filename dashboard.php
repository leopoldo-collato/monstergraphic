<?php
session_start();
// Simulação de conexão e segurança (Substitua pelos seus dados reais)
// if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

$user_type = $_SESSION['tipo'] ?? 'cliente'; // Pode ser 'cliente' ou 'admin'
$user_nome = "Usuário Monster"; 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>MonsterGraphic | Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --bg: #050507;
            --card-bg: rgba(20, 20, 25, 0.8);
            --neon-cyan: #00f2ff;
            --neon-purple: #9d00ff;
            --danger: #ff0055;
            --success: #00ff88;
        }

        body {
            background: var(--bg);
            color: #fff;
            font-family: 'Inter', sans-serif;
            margin: 0;
            display: flex;
        }

        /* Sidebar Futurista */
        .sidebar {
            width: 250px;
            height: 100vh;
            background: rgba(10, 10, 15, 0.95);
            border-right: 1px solid var(--neon-purple);
            padding: 20px;
            position: fixed;
        }

        .main-content {
            margin-left: 280px;
            padding: 40px;
            width: 100%;
        }

        /* Cards Dinâmicos */
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .card {
            background: var(--card-bg);
            border-radius: 15px;
            padding: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            transition: 0.3s;
        }

        .card:hover {
            border-color: var(--neon-cyan);
            box-shadow: 0 0 15px rgba(0, 242, 255, 0.2);
        }

        h2 { color: var(--neon-cyan); font-size: 1.2rem; margin-bottom: 20px; }

        /* Estilo para Boletos e Tickets */
        .status-badge {
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: bold;
        }

        .vencido { background: var(--danger); color: white; }
        .pago { background: var(--success); color: black; }
        .pendente { background: #ffaa00; color: black; }

        /* Barra de Progresso de Projetos */
        .progress-bar {
            background: #333;
            border-radius: 10px;
            height: 10px;
            margin: 10px 0;
        }

        .progress-fill {
            background: linear-gradient(90deg, var(--neon-purple), var(--neon-cyan));
            height: 100%;
            border-radius: 10px;
            width: 65%; /* Valor dinâmico do banco */
        }

        .btn-ticket {
            background: var(--neon-purple);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h1 style="color: var(--neon-cyan); font-size: 1.5rem;">MONSTER<br>GRAPHIC</h1>
    <hr style="border: 0.5px solid #333;">
    <p><i class="fas fa-user"></i> Olá, <?php echo $user_nome; ?></p>
    <nav>
        <p><i class="fas fa-home"></i> Início</p>
        <p><i class="fas fa-file-invoice"></i> Financeiro</p>
        <p><i class="fas fa-code"></i> Projetos</p>
        <a href="logout.php" style="color: var(--danger); text-decoration: none;">Sair</a>
    </nav>
</div>

<div class="main-content">
    
    <?php if($user_type == 'cliente'): ?>
        <div class="grid-container">
            <div class="card">
                <h2><i class="fas fa-wallet"></i> Meus Boletos</h2>
                <p>Boleto #1024 - <span class="status-badge pago">PAGO</span></p>
                <p>Boleto #1055 - <span class="status-badge pendente">A VENCER</span></p>
                <p>Boleto #0998 - <span class="status-badge vencido">VENCIDO</span></p>
            </div>

            <div class="card">
                <h2><i class="fas fa-tasks"></i> Andamento do Sistema</h2>
                <p>Desenvolvimento Backend (API)</p>
                <div class="progress-bar"><div class="progress-fill" style="width: 75%;"></div></div>
                <p>Interface do Usuário (UI/UX)</p>
                <div class="progress-bar"><div class="progress-fill" style="width: 40%;"></div></div>
            </div>

            <div class="card">
                <h2><i class="fas fa-headset"></i> Suporte</h2>
                <form action="abrir_ticket.php" method="POST">
                    <textarea placeholder="Descreva o problema..." style="width:100%; background:#111; color:white; border:1px solid #333; margin-bottom:10px;"></textarea>
                    <button class="btn-ticket">Abrir Novo Chamado</button>
                </form>
            </div>
        </div>

    <?php else: ?>
        <h2>Painel de Gestão Monster (ADM)</h2>
        <div class="card">
            <h3>Tickets em Aberto</h3>
            <table style="width:100%; text-align:left;">
                <tr style="border-bottom: 1px solid #333;">
                    <th>Cliente</th>
                    <th>Assunto</th>
                    <th>Ações</th>
                </tr>
                <tr>
                    <td>João Silva</td>
                    <td>Erro no login</td>
                    <td><button style="color:cyan; background:none; border:1px solid cyan;">EDITAR</button></td>
                </tr>
            </table>
        </div>
    <?php endif; ?>
</div>

</body>
</html>