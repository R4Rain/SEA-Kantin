## SEA Kantin documentation

## Application description
SEA Kantin or known as "Kantin Kejujuran" is a website for student to sell and buy items. It consists of some items for sale by students and a box to store all the purchased money. Everyone is free to look around, sell, and buy items there. There is no shopkeeper there so everyone is free to add or withdraw the money in the box.

## Application features
- Login / Register / Logout 
- Item list (All)
- User item list
- Create a new item
- Balance box (add & withdraw)
- Searching and sorting items

## Steps to run the application
- Clone the repository on your local storage
```
git clone https://github.com/R4Rain/SEA-Kantin
```
- Change terminal path to the repository directory
```
cd SEA-Kantin
```
- Install dependencies by using composer
```
composer install
```
- Create a new environment variables by copying from the example
```
cp .env.example .env
```
- Create a new database named `seakantin` or use any existing database in your database software.
- Open .env file and config the database variables. Default configuration is shown below:
```
DB_DATABASE=seakantin
DB_USERNAME=root
DB_PASSWORD=
```
- Generating application key set
```
- php artisan key:generate
```
- Migrating and seeding initial data
```
php artisan migrate --seed
```
- Linking local storage
```
php artisan storage:link
```
- Run the application
```
php artisan serve
``` 
- Go to the given local host URL. Default local host URL `http://127.0.0.1:8000/`

# Minimum requirement
- PHP 8.0.2
- Laravel 9
- Composer
- MySQL
- Apache

# Deployment
The application is also deployed in Heroku.
Link: `http://sea-kantin.herokuapp.com/`

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
