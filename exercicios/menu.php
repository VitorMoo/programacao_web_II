<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu dos Exercícios PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            min-height: 100vh;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.95);
            color: #333;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 10px;
            font-size: 2.5em;
        }
        .subtitle {
            text-align: center;
            color: #7f8c8d;
            margin-bottom: 40px;
            font-size: 1.1em;
        }
        .exercise-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }
        .exercise-card {
            background: white;
            border: 2px solid #e3f2fd;
            border-radius: 10px;
            padding: 25px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .exercise-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
            border-color: #2196f3;
        }
        .exercise-number {
            background: linear-gradient(45deg, #2196f3, #21cbf3);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2em;
            margin-bottom: 15px;
        }
        .exercise-title {
            font-size: 1.3em;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .exercise-description {
            color: #666;
            margin-bottom: 15px;
            line-height: 1.5;
        }
        .exercise-link {
            display: inline-block;
            background: linear-gradient(45deg, #4caf50, #45a049);
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .exercise-link:hover {
            background: linear-gradient(45deg, #45a049, #4caf50);
            transform: scale(1.05);
        }
        .info-section {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-top: 30px;
            border-left: 5px solid #2196f3;
        }
        .server-status {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
            text-align: center;
        }
        .tech-badge {
            display: inline-block;
            background: #e3f2fd;
            color: #1976d2;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 0.9em;
            margin: 2px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚀 Exercícios PHP</h1>
        <p class="subtitle">Estruturas de Dados e Formulários Web</p>

        <div class="server-status">
            ✅ <strong>Servidor PHP rodando em:</strong> http://localhost:8000
        </div>

        <div class="exercise-grid">
            <div class="exercise-card">
                <div class="exercise-number">1</div>
                <div class="exercise-title">Lista de Colegas</div>
                <div class="exercise-description">
                    Array com 5 nomes de colegas exibidos com foreach em HTML.
                    <br><br>
                    <span class="tech-badge">Array</span>
                    <span class="tech-badge">Foreach</span>
                    <span class="tech-badge">HTML</span>
                </div>
                <a href="atividade1_colegas.php" class="exercise-link">Acessar →</a>
            </div>

            <div class="exercise-card">
                <div class="exercise-number">2</div>
                <div class="exercise-title">Notas dos Alunos</div>
                <div class="exercise-description">
                    Matriz associativa com 3 alunos, cálculo de médias e destaque do melhor aluno.
                    <br><br>
                    <span class="tech-badge">Array Associativo</span>
                    <span class="tech-badge">Tabelas HTML</span>
                </div>
                <a href="atividade2_alunos.php" class="exercise-link">Acessar →</a>
            </div>

            <div class="exercise-card">
                <div class="exercise-number">3</div>
                <div class="exercise-title">Matriz 3×3 e Transposta</div>
                <div class="exercise-description">
                    Array bidimensional 3×3 com exibição da matriz original e transposta.
                    <br><br>
                    <span class="tech-badge">Matriz</span>
                    <span class="tech-badge">Algoritmos</span>
                    <span class="tech-badge">Tabelas</span>
                </div>
                <a href="atividade3_matriz.php" class="exercise-link">Acessar →</a>
            </div>

            <div class="exercise-card">
                <div class="exercise-number">4</div>
                <div class="exercise-title">Formulário GET</div>
                <div class="exercise-description">
                    Formulário HTML que envia nome via GET e exibe mensagem personalizada.
                    <br><br>
                    <span class="tech-badge">Formulário</span>
                    <span class="tech-badge">GET</span>
                    <span class="tech-badge">Validação</span>
                </div>
                <a href="atividade4_formulario_get.php" class="exercise-link">Acessar →</a>
            </div>

            <div class="exercise-card">
                <div class="exercise-number">5</div>
                <div class="exercise-title">Calculadora IMC</div>
                <div class="exercise-description">
                    Sistema completo de cálculo de IMC com formulário POST, funções separadas e classificação por faixas.
                    <br><br>
                    <span class="tech-badge">POST</span>
                    <span class="tech-badge">Funções</span>
                    <span class="tech-badge">Validação</span>
                    <span class="tech-badge">require_once</span>
                </div>
                <a href="index.php" class="exercise-link">Acessar →</a>
            </div>

            <div class="exercise-card">
                <div class="exercise-number">6</div>
                <div class="exercise-title">Seleção de Interesses</div>
                <div class="exercise-description">
                    Formulário com checkboxes para seleção múltipla de linguagens de programação.
                    <br><br>
                    <span class="tech-badge">Checkboxes</span>
                    <span class="tech-badge">Array</span>
                    <span class="tech-badge">GET</span>
                </div>
                <a href="atividade6_checkboxes.php" class="exercise-link">Acessar →</a>
            </div>
        </div>

        <div class="info-section">
            <h3>📋 Informações do Projeto</h3>
            <p><strong>Tecnologias utilizadas:</strong> PHP 8.4, HTML5, CSS3</p>
            <p><strong>Servidor:</strong> PHP Development Server</p>
            <p><strong>Conceitos abordados:</strong> Arrays, Formulários, Validação, Funções, Estruturas de Controle</p>

            <h4>🔧 Comandos úteis:</h4>
            <ul>
                <li><code>php -S localhost:8000</code> - Iniciar servidor</li>
                <li><code>Ctrl+C</code> - Parar servidor</li>
                <li><code>php -v</code> - Ver versão do PHP</li>
            </ul>
        </div>
    </div>
</body>
</html>
