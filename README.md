1. TERMINAL -> docker compose up -d nginx php mysql phpmyadmin
2. TERMINAL -> docker compose run --rm -it composer install
3. TERMINAL -> docker exec -it php-container php artisan migrate --seed

4. MYSQL:
   - user: root
   - password: root
   - database: todos
   - port: 3306
5. PHPMYADMIN:
   - localhost:8080
