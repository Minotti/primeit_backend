# README #

### Setup do projeto ###

* Clone o projeto
* composer install
* cp .env.example .env
* ./vendor/bin/sail up -d
* ./vendor/bin/sail artisan key:generate
* ./vendor/bin/sail artisan migrate && sail artisan db:seed

### Certifique que o container esteja exposto na porta 3008 para que o front funcione corretamente ###

---

### Credenciais ###

Se tudo ocorreu como previsto esses são os dados para login:

Utente
- Email: attendant@teste.com
- Password: 123123

Rececionista
- Email: receptionist@teste.com
- Password: 123123

Doctor (Primeiro)
- Email: doctor@teste.com
- Password: 123123

Doctor (Segundo)
- Email: doctor2@teste.com
- Password: 123123
