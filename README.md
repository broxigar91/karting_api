# karting_api
 
This project is an API to deliver some information about some Karting competition.

In order to get this project running you need to execute some commands first:

1. Install composer: `composer install`
2. Create database with: `php bin/console doctrine:database:create`
3. Execute the migrations: `php bin/console doctrine:migrations:migrate`
4. Load data with: `php bin/console doctrine:fixtures:load`
5. Start the server: `symfony server:start`

Current env configuration is prepared to run with MySQL 5.7.

PS: Even though the tech test was changed, I've had already started when the change happened, so I decided to finish it aswell.  
You can find the code at `src/Classes/TaskManager.php`.  
Also, I've prepared some test for this second test, you can see the cases prepared for the test in `src/test/Classes/TaskManagerTest.php` run it with 
`php bin/phpunit tests/Classes/TaskManagerTest.php` 
