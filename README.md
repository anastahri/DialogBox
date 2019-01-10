# DialogBox
Messaging app using Laravel.

Based on packages :
	- appzcoder/laravel-admin
	- cmgmyr/messenger

### Local deployment

- Clone or fork this repository
- Run the following commands :

1. cd "path-to-application"

2. composer install

3. cp .env.example .env

4. php artisan key:generate

5. create a new database with the name: dialogbox

6. configure .env file => MySql database host, name, username and password.

7. Create the necessary MySql tables by running the command:
	
	php artisan migrate

8. You can run the following command to create a user with the admin role:

	php artisan db:seed

9. Serve the app, and log in (user: admin, password: admin). As an admin you can create Users, User groups, Roles and permissions.

### Author

Anas TAHRI