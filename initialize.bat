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

call composer Install

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

echo.
echo ================================
echo             APP_KEY
echo ================================

set /P "app_key=APP_KEY: "

call cp ./.env.example .env
call sed -i '0,/APP_KEY=/{s/APP_KEY=/APP_KEY=%app_key%/}' .env

echo.
echo Application key applied.
echo.
echo Application initialized, you can delete ./initialize.bat file.
