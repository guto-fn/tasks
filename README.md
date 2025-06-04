# 🛠️ Tasks (Tarefas)

Um sistema simples de gerenciamento de projetos, desenvolvido com Laravel.  
Este projeto foi criado para fins de aprendizado e portfólio, com foco em boas práticas de backend (RESTful) e frontend com Blade + Tailwind CSS.

---

## 📌 Funcionalidades

- ✅ Listagem de projetos
- ✅ Criação de novos projetos
- ✅ Edição de projetos existentes
- ✅ Exclusão de projetos
- ✅ Validação de formulários com `FormRequest`
- ✅ Estrutura MVC clara com controllers, models e views
- ✅ Design responsivo com TailwindCSS

---

## ⚙️ Tecnologias

- [Laravel 10.x](https://laravel.com/)
- Blade (template engine)
- Tailwind CSS
- PostgreSQL
- PHP 8.x

---

## 🚀 Como rodar o projeto localmente

### 1. Clone o repositório

```bash
git clone https://github.com/guto-fn/tasks.git
cd tasks

composer install
npm install && npm run dev

cp .env.example .env

docker compose up -d

php artisan key:generate
php artisan migrate

php artisan serve
```

🖼️ Layout
O frontend foi feito com Blade e estilizado com Tailwind CSS para garantir um layout limpo e responsivo.

Este projeto é apenas para fins de estudo.
