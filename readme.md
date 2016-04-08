# Deployment

Steps to deploy this project.

  - git fetch and merge to the freshly installed Laravel 5.1 directory.
  	. git fetch --all
  	. git reset --hard remote_branch/local_branch

  - Change the Database connection parameters in .env file.
  - Run the migration (php artisan migrate)
  - Seed the Database (php artisan db:seed)
  - Make sure the apache/nginx is configured properly to the public directory of the laravel as the default web root. 
  - Done.
  


