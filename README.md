# ⛪ Sistema de Gestão - Paróquia Santa Rita

Este é um sistema web desenvolvido em **PHP puro (sem Laravel)** com **MySQL** e **Bootstrap**, voltado para a gestão de informações da Paróquia Santa Rita.  
O projeto segue o padrão **MVC** (Model-View-Controller), com foco em organização, segurança e facilidade de manutenção.

---

## 📑 Sumário

1. [Visão Geral](#-visão-geral)
2. [Tecnologias Utilizadas](#-tecnologias-utilizadas)
3. [Arquitetura e Estrutura de Pastas](#-arquitetura-e-estrutura-de-pastas)
4. [Funcionalidades](#-funcionalidades)
5. [Banco de Dados](#-banco-de-dados)
6. [Autenticação e Permissões](#-autenticação-e-permissões)
7. [Instalação e Configuração](#-instalação-e-configuração)
8. [Roadmap](#-roadmap)
9. [Contribuição](#-contribuição)
10. [Licença](#-licença)

---

## 🌍 Visão Geral

O sistema tem como objetivo facilitar a comunicação da paróquia com seus membros e visitantes, centralizando informações como **avisos**, **eventos**, **notícias** e **usuários**.  
O projeto possui dois ambientes principais:

- **Público:** exibição de notícias, avisos e eventos.  
- **Administrativo:** painel protegido com permissões de acesso para gestão de conteúdo.  

Um terceiro nível especial (**DevAdmin**) existe para manutenção e gerenciamento dos usuários do sistema.

---

## 🛠 Tecnologias Utilizadas

- **Linguagem:** PHP 8+  
- **Banco de Dados:** MySQL 8+  
- **Frontend:** Bootstrap 5 + FontAwesome  
- **Arquitetura:** MVC (Model-View-Controller)  
- **Servidor local:** WAMP (Windows) ou XAMPP  
- **Controle de versão:** Git + GitHub  

---

## 🗂 Arquitetura e Estrutura de Pastas

```
/app
 ├── /config        → Arquivos de configuração (ex: conexão com banco)
 ├── /controllers   → Controladores (lógica das rotas)
 ├── /middlewares   → Middlewares (ex: autenticação/permissões)
 ├── /models        → Classes que acessam o banco de dados
 ├── /views         → Arquivos de visualização (páginas HTML/PHP)
 │    ├── /layouts  → Layouts reutilizáveis (header/footer)
 │    ├── /auth     → Telas de login/cadastro
 │    ├── /avisos   → CRUD de avisos
 │    ├── /eventos  → CRUD de eventos
 │    └── /usuarios → CRUD de usuários (restrito DevAdmin)
/public
 ├── index.php      → Front controller e roteador
 ├── /assets        → Arquivos estáticos (css/js/img)
/routes
 └── web.php        → Definição das rotas
```

---

## ⚡ Funcionalidades

### Público
- ✅ Página inicial com hero, últimos avisos e próximos eventos.  
- ✅ Página de notícias (avisos + eventos).  
- ✅ Página de login e cadastro de visitantes.  
- ✅ Responsividade com Bootstrap.  

### Administrativo
- ✅ Painel administrativo com dashboard de resumos.  
- ✅ CRUD de avisos (com tipos: Padre, Comunicado Geral, Importante, Urgente).  
- ✅ CRUD de eventos (com autor vinculado ao usuário criador).  
- ✅ Listagem de usuários cadastrados (apenas visual para admins comuns).  

### DevAdmin
- ✅ Painel exclusivo para engenheiros do sistema.  
- ✅ CRUD completo de usuários (criar, editar, excluir, trocar senha, atribuir papel).  
- ✅ Restrição total para não-DevAdmins (avisos de acesso restrito com ícone de cadeado).  

---

## 🗄 Banco de Dados

### Tabelas principais
- `usuarios (id, nome, email, senha, role_id, criado_em)`  
- `roles (id, nome)`  
- `avisos (id, titulo, conteudo, tipo, usuario_id, criado_em)`  
- `eventos (id, titulo, descricao, data_inicio, local, usuario_id, criado_em)`  

### Exemplo de roles inseridas

```sql
INSERT INTO roles (nome) VALUES
('DevAdmin'), ('Administrador'), ('Padre'), ('Coordenador'), ('Membro'), ('Visitante');
```

### Senhas
- Armazenadas com `password_hash(PASSWORD_DEFAULT)`  
- Verificadas com `password_verify()` no login.  

---

## 🔐 Autenticação e Permissões

- **Middleware de autenticação:** garante que apenas usuários logados acessem o painel.  
- **Middleware de permissões:** permite ou bloqueia acesso baseado no papel (`role`).  

### Papéis
- **DevAdmin:** engenheiros do software (controle total, inclusive usuários).  
- **Administrador:** gerencia avisos e eventos.  
- **Padre:** cria e edita avisos/eventos pastorais.  
- **Coordenador:** pode publicar avisos limitados.  
- **Membro:** apenas leitura (futuro).  
- **Visitante:** apenas público (pode se cadastrar).  

---

## ⚙️ Instalação e Configuração

1. Clone o repositório:  
   ```bash
   git clone https://github.com/seu-usuario/santarita.git
   ```

2. Configure o servidor local (WAMP/XAMPP) apontando para `/public`.  

3. Crie o banco de dados e rode os scripts SQL disponíveis em `/database`.  

4. Configure conexão em:  
   ```php
   /app/config/db.php
   ```

   ```php
   <?php
   $conn = new PDO("mysql:host=localhost;dbname=santarita;charset=utf8", "root", "");
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   ?>
   ```

5. Acesse no navegador:  
   ```
   http://localhost/santarita/public
   ```

---

## 📌 Roadmap

- [x] Estrutura MVC inicial  
- [x] Banco de dados (usuarios, roles, avisos, eventos)  
- [x] Login e cadastro de visitantes com password_hash  
- [x] Painel administrativo (avisos + eventos)  
- [x] Painel DevAdmin com CRUD de usuários  
- [ ] Página pública de eventos detalhada  
- [ ] Módulo de relatórios  
- [ ] Sistema de auditoria (logs de ações)  
- [ ] Integração com notificações (e-mail ou push)  
- [ ] Backup automático do banco  

---

## 🤝 Contribuição

1. Faça um fork do projeto.  
2. Crie uma branch para sua feature: `git checkout -b minha-feature`.  
3. Commit suas alterações: `git commit -m "feat: minha nova feature"`.  
4. Push para a branch: `git push origin minha-feature`.  
5. Abra um Pull Request.  

---

## 📜 Licença

Este projeto é de uso comunitário da **Paróquia Santa Rita**.  
Pode ser reutilizado em outras paróquias mediante autorização.  
Distribuição livre sob licença **MIT**.  

---

✍️ **Equipe de Desenvolvimento**  
- ThayDion.IA.
- Desemvolvedores: José Tayllan Pinto Almeida é Diogo Alves Nogueira.
