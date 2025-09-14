# 📌 Documentação do Projeto - Software Paróquia Santa Rita

Este documento resume o que já foi implementado e o que ainda está pendente no desenvolvimento do sistema da Paróquia Santa Rita, seguindo a estrutura definida em PHP (sem Laravel) + MySQL + Bootstrap.

---

## ✅ O que já foi feito

### Estrutura do Projeto
- Estrutura de pastas organizada em **MVC**:
  - `/app/controllers`
  - `/app/models`
  - `/app/views`
  - `/app/config`
  - `/app/middlewares`
  - `/routes`
  - `/public`

- Roteamento básico funcional sem `.htaccess`, utilizando query string (`index.php?r=rota`).

### Banco de Dados
- Script SQL criado com tabelas principais:
  - `usuarios` + `roles`
  - `avisos`
  - `eventos`
- Inserts iniciais com dados fictícios.
- Adição do campo `usuario_id` em `eventos` para registrar o autor.
- Enum em `avisos.tipo`: `'Padre', 'Comunicado Geral', 'Importante', 'Urgente'`.

### Autenticação e Sessões
- Tela de **Login** integrada com `password_hash` e `password_verify`.
- Tela de **Cadastro de Visitante** (usuários comuns entram como `Visitante`).
- Middleware de autenticação por **papéis** (`Administrador`, `Padre`, `Coordenador`, `Membro`, `Visitante`, `DevAdmin`).
- Flash messages implementadas (mensagens de boas-vindas e sucesso), removendo mensagens da URL.

### Frontend Público
- Página inicial (`Home`) responsiva, com Hero, últimos avisos e próximos eventos.
- Página de notícias (`Notícias`) mostrando avisos e eventos vindos do banco.
- Layout base (`header.php` e `footer.php`) para navegação pública.
- Botões de **Login** e **Cadastro** só aparecem se o usuário não estiver logado.

### Painel Administrativo
- **Dashboard Administrativo** com cards de resumo (avisos, eventos, usuários, acessos).
- Módulo de **Avisos**: CRUD implementado e funcionando, listagem responsiva.
- Módulo de **Eventos**: CRUD implementado, com relação a usuários autores.
- Proteção de rotas por papel de usuário.
- Painel **DevAdmin** criado com acesso exclusivo ao gerenciamento de usuários.

### Usabilidade
- Página de gerenciamento de usuários mostra cadeado e aviso de acesso restrito para perfis que não são **DevAdmin**.
- Melhorias na responsividade com Bootstrap (grid system e `g-4`).

---

## 🔧 O que falta fazer

### Frontend Público
- Criar páginas dedicadas para **Eventos** (listagem detalhada pública).
- Página de **Contato/Informações da paróquia**.

### Painel Administrativo
- Completar CRUD de **Usuários** (DevAdmin):
  - Criar, editar e excluir usuários.
  - Vincular papéis (roles) de forma dinâmica e validada.
- Módulo de **Relatórios** (estatísticas de avisos, eventos e acessos).
- Módulo de **Segurança e Backup** (somente planejamento no momento).

### Funcionalidades Técnicas
- Implementar **logs de auditoria** (quem criou/editou/deletou avisos e eventos).
- Melhorar sistema de permissões, talvez com tabela `permissoes` além de `roles`.
- Criar sistema de notificações (email/push) para avisos e eventos importantes.
- Preparar mecanismo de **backup automático** do banco.

### Melhorias Gerais
- Refatorar exibição de mensagens flash para `header.php` global.
- Criar testes manuais (checklist de QA).
- Planejar integração futura com aplicativo mobile (está no escopo do diagrama).

---

## 🚀 Próximos Passos Imediatos
1. Finalizar CRUD de usuários no painel DevAdmin.  
2. Criar listagem pública dedicada de eventos.  
3. Adicionar relatórios no painel administrativo.  
4. Configurar sistema de auditoria (logs).  

---

📄 **Documento gerado automaticamente** como acompanhamento do desenvolvimento.

Responsavel: José Tayllan Pinto Almeida. ThayDion.ia
