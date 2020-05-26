# Synaptik Test

Тестовое задание на должность PHP + Laravel + Vue разработчика

# Установка

Для запуска необходимо, чтобы были предустановлен следующий софт:
* php
* composer
* nodejs
* npm

---
Сначала нужно стянуть проект с репозитория:
```
git clone https://github.com/dnbazh/synaptik-test.git
```

Затем необходимо скопировать файл `.env.example` и вставить корнь проекта с именем `.env`

Затем выполнить команды.
```
composer install

npm install
npm run prod

php artisan key:generate
php artisan serve --port=8000
```
Приложение будет доступно по адресу: http://127.0.0.1:8000
