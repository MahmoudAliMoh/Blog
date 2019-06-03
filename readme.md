# Blog

This is a simple blog example with categories.

# Installation

  - Clone this project.
  - Run composer install
```sh
$ composer install
```
  - Add your .env file with DB credentials then Run migrations.
```sh
$ php artisan migrate
```
   - Run seeds to add admin credentials. EMAIL: admin@blog.com, PASSWORD: admin@123
```sh
$ php artisan db:seed
```
  - Run this to link storage images. 
```sh
$ php artisan storage:link
```

Now you're up and running.
