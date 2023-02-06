(1). Simply download or clone the repo


(2) Run composer install to get all the dependencies specified in the composer.lock file

composer install


(3) Run migrations

php artisan migrate

(4) Import database and modify your .env file

(5) Run the database seeder:

php artisan db:seed

(6) Run server 
php artisan serve 
----------------------------------------------------------------------------------------------------------------------------------
This is a project management system where : 

1- Admin/Manager can add projects.
2- Project has many tasks.
3- employees sign up.
4- Admin can make any user as a manager.
5- manager can create tasks.
6- manager can assign tasks and set task due date ( from edit button or while creating it)
7-employee can see tasks assigned to them and start in them.



