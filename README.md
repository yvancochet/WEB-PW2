<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Project informations
### Description
This project is being carried out as part of a laboratory for the HEIG-VD Web course.<br/>
The concept is a simple contact web app database that implements CRUDS operations. The aim of this project is to learn how to use the following tools: PHP, MVC pattern, framework, etc. in a portable development environment.
### Technical informations
- Framework : Laravel
- Database : MySQL
- ORM : Eloquent
- Library manager : Composer
- Linter : Pint

## Installation instructions
### Prequisits
- Windows Subsystem for Linux (WSL 2.0) if running on a Windows OS
- Git
- Docker Desktop
- Visual Studio code

### Instructions
The steps to run this project on a dev-container hosted on your computer are as follow :
/!\ For Windows users, all the following commands are to run on WSL 2.0 /!\
1) Clone the project
```
git clone https://github.com/yvancochet/WEB-PW2.git
```
2) Go to the cloned project root folder
```
cd WEB-PW2
```
3) Launch Visual Studio Code
```
code .
```
4) When Visual studio code opens, click "reopen in container" on the popup banner on the bottom right of the screen
5) You can check that all required services are running within docker
<img width="1013" alt="image" src="https://github.com/yvancochet/WEB-PW2/assets/71433754/0ab8a922-1821-4772-bc33-5b51e85a34f5">
6) The project is now running, you can access the website via http://localhost

## Database instructions
To populate database with clean random data, use the following instruction. These instructions are to run in Visual Studio terminal :
```
php artisan db:seed --class=ContactSeeder
php artisan migrate:fresh --seed --seeder=ContactSeeder
```
To recreate the whole database, in case of corruption or issues, use the following commands :
```
php artisan migrate:install
php artisan schema:dump
php artisan db:seed --class=ContactSeeder
php artisan migrate:fresh --seed --seeder=ContactSeeder
```
To get the content of the Contact database, use the following commands :
```
php artisan tinker
App\Models\Contact::all()
```

## Run linter
To run Pint linter on the project, open a vscode terminal and type the following command :
```
./vendor/bin/pint
```

## Install this devcontainer from scratch 
```
curl -s "https://laravel.build/WEB-PW2?with=mysql,redis&devcontainer" | bash
```

## Sources used
- Page style (CSS, Bootstrap) : https://www.bootdey.com
- Laravel documentation : https://laravel.com/docs
- Architecture and MVC logic : https://chat.openai.com/
- Container creation : https://www.youtube.com/watch?v=ojWxCP1lT-Y
