# Aula 01 · Formulário ligado ao banco de dados

Mini-projeto de estudo (trilha full-stack) em que um formulário web grava dados
reais em um banco PostgreSQL, passando pelas 5 camadas:

HTML → CSS → JavaScript → PHP (PDO) → PostgreSQL

## O que foi construído

- **Formulário** em HTML, estilizado com CSS e controlado com JavaScript
  (envio com `fetch()`, sem recarregar a página)
- **Backend em PHP** que recebe os dados e responde em JSON
- **Conexão com PostgreSQL** via PDO, usando *prepared statements*
  (proteção contra SQL injection)
- **Versionamento** com Git e publicação no GitHub

## Tecnologias

| Camada | Tecnologia |
|---|---|
| Interface | HTML5, CSS3 |
| Comportamento | JavaScript (DOM, fetch, async/await) |
| Servidor | PHP 8.5 (servidor embutido) |
| Banco de dados | PostgreSQL 18 |
| Versionamento | Git e GitHub |

## Estrutura do projeto

```
frontEnd01_noteBook/
├── index.html        # formulário
├── style.css         # estilos
├── script.js         # envio com fetch
├── conexao.php       # conexão PDO com o banco
├── salvar.php        # recebe o formulário e grava no banco
├── config.php        # credenciais (NÃO vai para o Git)
└── README.md
```

> Ajuste os nomes acima para os arquivos reais do seu projeto.

## Como rodar

1. Garanta que o PostgreSQL está ativo na porta 5432.
2. Crie o banco `mcell_db` e a tabela:

   ```sql
   CREATE TABLE usuarios (
       id SERIAL PRIMARY KEY,
       nome VARCHAR(100) NOT NULL
   );
   ```

3. Crie o arquivo `config.php` com os dados do seu banco
   (ele está no `.gitignore` e nunca é enviado ao GitHub).
4. Na pasta do projeto, inicie o servidor:

   ```powershell
   php -S localhost:8000
   ```

5. Abra `http://localhost:8000` no navegador e envie o formulário.
6. Confira o dado gravado:

   ```powershell
   psql -U postgres -d mcell_db -c "SELECT * FROM usuarios;"
   ```

## O que aprendi

- Diagnosticar erro de conexão (`SQLSTATE[08006]`): checar serviço, porta e senha
- Usar `127.0.0.1` em vez de `localhost` no Windows para forçar IPv4
- Manter o PHP que responde JSON **sem nenhum `echo` extra**
- Usar *prepared statements* em vez de montar SQL com texto do usuário
- Depurar com F12 (aba Network) e com o terminal
- Organizar o Git: um repositório por pasta de projeto, `.gitignore` para segredos

## Próximos passos

- Listar os registros na tela (`SELECT`)
- Validação no front e no back
- Aplicar o mesmo modelo à tabela de produtos da mcell
