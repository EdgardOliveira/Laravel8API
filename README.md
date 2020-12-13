# Laravel8API
Aplicação desenvolvida na linguagem PHP v7.4 com Laravel Framework v8.
É um backend responsável por autenticar usuários na API
Uma vez autenticado, o usuários poderá fazer requisições de dados da API.

### Requisitos
1. PHP 7.3
2. MariaDB
3. Composer

Eu uso o xampp ;)

### Procedimento de instação
```bash
composer install -o --no-dev
```
Configurar o .env

```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel8api
DB_USERNAME=laravel8api
DB_PASSWORD=laravel8api
```
É preciso criar o banco de dados no mysql e usuário com privilégios
```bash
CREATE USER 'laravel8api'@'%' IDENTIFIED VIA mysql_native_password USING '***';
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, FILE, INDEX, ALTER, 
CREATE TEMPORARY TABLES, CREATE VIEW, EVENT, TRIGGER, SHOW VIEW, 
CREATE ROUTINE, ALTER ROUTINE, EXECUTE ON *.* TO 'laravel8api'@'%' 
REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 
MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
CREATE DATABASE IF NOT EXISTS `laravel8api`;
GRANT ALL PRIVILEGES ON `laravel8api`.* TO 'laravel8api'@'%';
GRANT ALL PRIVILEGES ON `laravel8api\_%`.* TO 'laravel8api'@'%';
```
Crie o banco de dados
```php
php artisan migrate
```
Popule o banco de dados (opcional)
```php
php artisan db:seed
```
Rode o servidor localmente na porta 9000 para testes
```php
php artisan serve --host 0.0.0.0 --port 9000
```

Rotas

| Domain | Method    | URI                         | Name              | Action                                          | Middleware |
|--------|-----------|-----------------------------|-------------------|-------------------------------------------------|------------|
|        | GET|HEAD  | /                           |                   | Closure                                         | web        |
|        | POST      | api/auth/login              |                   | App\Http\Controllers\AuthController@login       | api        |
|        | POST      | api/auth/logout             |                   | App\Http\Controllers\AuthController@logout      | api        |
|        |           |                             |                   |                                                 | auth:api   |
|        | GET|HEAD  | api/auth/me                 |                   | App\Http\Controllers\AuthController@me          | api        |
|        |           |                             |                   |                                                 | auth:api   |
|        | POST      | api/auth/refresh            |                   | App\Http\Controllers\AuthController@refresh     | api        |
|        |           |                             |                   |                                                 | auth:api   |
|        | POST      | api/auth/register           |                   | App\Http\Controllers\AuthController@register    | api        |
|        | POST      | api/v1/cidades              | cidades.store     | App\Http\Controllers\CidadeController@store     | api        |
|        | GET|HEAD  | api/v1/cidades              | cidades.index     | App\Http\Controllers\CidadeController@index     | api        |
|        | PUT|PATCH | api/v1/cidades/{cidade}     | cidades.update    | App\Http\Controllers\CidadeController@update    | api        |
|        | GET|HEAD  | api/v1/cidades/{cidade}     | cidades.show      | App\Http\Controllers\CidadeController@show      | api        |
|        | DELETE    | api/v1/cidades/{cidade}     | cidades.destroy   | App\Http\Controllers\CidadeController@destroy   | api        |
|        | GET|HEAD  | api/v1/enderecos            | enderecos.index   | App\Http\Controllers\EnderecoController@index   | api        |
|        | POST      | api/v1/enderecos            | enderecos.store   | App\Http\Controllers\EnderecoController@store   | api        |
|        | GET|HEAD  | api/v1/enderecos/{endereco} | enderecos.show    | App\Http\Controllers\EnderecoController@show    | api        |
|        | PUT|PATCH | api/v1/enderecos/{endereco} | enderecos.update  | App\Http\Controllers\EnderecoController@update  | api        |
|        | DELETE    | api/v1/enderecos/{endereco} | enderecos.destroy | App\Http\Controllers\EnderecoController@destroy | api        |
|        | POST      | api/v1/estados              | estados.store     | App\Http\Controllers\EstadoController@store     | api        |
|        | GET|HEAD  | api/v1/estados              | estados.index     | App\Http\Controllers\EstadoController@index     | api        |
|        | GET|HEAD  | api/v1/estados/{estado}     | estados.show      | App\Http\Controllers\EstadoController@show      | api        |
|        | PUT|PATCH | api/v1/estados/{estado}     | estados.update    | App\Http\Controllers\EstadoController@update    | api        |
|        | DELETE    | api/v1/estados/{estado}     | estados.destroy   | App\Http\Controllers\EstadoController@destroy   | api        |
|--------|-----------|-----------------------------|-------------------|-------------------------------------------------|------------|
