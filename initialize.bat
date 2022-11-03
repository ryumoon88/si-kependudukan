@echo off
setlocal enabledelayedexpansion

echo.
where npm>nul 2>&1 || echo NPM not found, please install Node JS. https://nodejs.org/ && exit
where composer>nul 2>&1 || echo Composer not found, please install composer. https://getcomposer.org/ && exit
where php>nul 2>&1 || echo PHP not found, please install PHP. https://www.php.net/ && exit

echo.
echo ================================
echo Installing composer dependencies
echo ================================
echo.

call composer install

echo.
echo ================================
echo   Installing npm dependencies
echo ================================

call npm install

echo.
echo ================================
echo         Building assets
echo ================================

call npm run build

call cp ./.env.example .env
call php artisan key:generate

echo.
echo Application key generated
