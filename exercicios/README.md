## 📁 Estrutura do Projeto

```
exercicios/
├── atividade1_colegas.php      # Array com nomes de colegas
├── atividade2_alunos.php       # Matriz associativa de alunos
├── atividade3_matriz.php       # Matriz 3x3 e transposta
├── atividade4_formulario_get.php # Formulário com método GET
├── index.php                   # Calculadora IMC (POST)
├── funcoes.php                 # Funções auxiliares
├── atividade6_checkboxes.php   # Formulário com checkboxes
└── README.md                   # Este arquivo
```

## Como Executar

### Pré-requisitos
- PHP 7.4 ou superior
- Servidor web (Apache, Nginx) ou PHP built-in server

### Execução Local

1. **Clone ou baixe os arquivos**
   ```bash
   cd /caminho/para/seu/projeto
   ```

2. **Inicie o servidor PHP**
   ```bash
   php -S localhost:8000
   ```

3. **Acesse as atividades**
   - Atividade 1: `http://localhost:8000/atividade1_colegas.php`
   - Atividade 2: `http://localhost:8000/atividade2_alunos.php`
   - Atividade 3: `http://localhost:8000/atividade3_matriz.php`
   - Atividade 4: `http://localhost:8000/atividade4_formulario_get.php`
   - Atividade 5: `http://localhost:8000/index.php` (Calculadora IMC)
   - Atividade 6: `http://localhost:8000/atividade6_checkboxes.php`

## ⚡ Justificativa Técnica: `require_once` vs `include_once`

**Por que escolhi `require_once` para o arquivo `funcoes.php`:**

1. **Segurança**: Para execução se o arquivo não existir
2. **Dependência crítica**: As funções são essenciais para a calculadora
3. **Evita duplicação**: O `once` previne inclusões múltiplas
4. **Controle de erro**: Melhor debugging em caso de problemas
