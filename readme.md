### AngularJS Laravel Doctrine

#### Application
Simple demo application showing vacancies of a fictive **Job Search service**. You can search by title, category, location and dates.

#### Requirements
**php 7.2**, composer, npm

#### Installation
Run the following commands:
```bash
git clone https://github.com/cernei/angularjs-laravel-doctrine.git
cd angularjs-laravel-doctrine
composer install
```
Setup your database connection in ```.env``` file
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel-doctrine
DB_USERNAME=root
DB_PASSWORD=
```
Then run 
```
php artisan doctrine:migrations:migrate
php artisan db:seed
```
Create symlink to make entry point for your backend:
```bash
ln -s /home/cernei/projects/angularjs-laravel-doctrine/public /var/www/html/angularjs-laravel-doctrine-backend
```
**This is an example!**
Modify your project path according to the real path on your machine. Use ```pwd``` command for help.

Now you can use your api:
 ```bash
http://localhost/angularjs-laravel-doctrine-backend/api/categories
http://localhost/angularjs-laravel-doctrine-backend/api/categories/1
 ```
##### Frontend installation
Add ```API_URL``` a url base for your api
```bash
API_URL=http://localhost/angularjs-laravel-doctrine-backend/api
```

Then install 
```bash
npm install
```

Development server and build commands 
```bash
npm run dev
npm run build
```
