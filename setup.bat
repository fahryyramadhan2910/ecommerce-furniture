@echo off
SETLOCAL
SET PROJECT_DIR=%~dp0

echo.
echo =========================================================
echo   LUXE FURNITURE - Laravel 11 Setup Script
echo =========================================================
echo.
echo [1/7] Installing PHP dependencies via Composer...
call composer install --no-interaction --prefer-dist
if %errorlevel% neq 0 (
    echo ERROR: Composer install failed. Make sure Composer is installed.
    pause
    exit /b 1
)

echo.
echo [2/7] Generating application key...
call php artisan key:generate

echo.
echo [3/7] Installing Node.js dependencies...
call npm install
if %errorlevel% neq 0 (
    echo ERROR: npm install failed. Make sure Node.js is installed.
    pause
    exit /b 1
)

echo.
echo [4/7] Building frontend assets (Vite + Tailwind)...
call npm run build

echo.
echo [5/7] Creating symbolic link for storage...
call php artisan storage:link

echo.
echo [6/7] Running database migrations and seeders...
echo.
echo IMPORTANT: Make sure MySQL is running and the database "laravel_furniture" exists.
echo If it doesn't, create it with: CREATE DATABASE laravel_furniture;
echo.
pause
call php artisan migrate:fresh --seed --force
if %errorlevel% neq 0 (
    echo ERROR: Migration failed. Check your .env database credentials.
    pause
    exit /b 1
)

echo.
echo [7/7] Starting development server...
echo.
echo =========================================================
echo   Setup COMPLETE! Opening: http://127.0.0.1:8000
echo.
echo   Admin Panel : http://127.0.0.1:8000/admin/login
echo   Email       : admin@furniture.com
echo   Password    : password
echo =========================================================
echo.
start http://127.0.0.1:8000
call php artisan serve

ENDLOCAL
