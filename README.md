# karting_api
 
This project is an API to deliver some information about some Karting competition.

In order to get this project running you need to execute some commands first:

1. Install composer: `composer install`
2. Create database with: `php bin/console doctrine:database:create`
3. Execute the migrations: `php bin/console doctrine:migrations:migrate`
4. Load data with: `php bin/console doctrine:fixtures:load`
5. Start the server: `symfony server:start`

Current env configuration is prepared to run with MySQL 5.7.

The enpoints are the following:
- `api/race/{id}` to check the classification to this race in particular, with id being a value from 1 to 10.  
- `api/pilot/{id}` to check the information about the pilot in particular, with id being a value equal to the field `_id` in the json file provided.  
- `api/classification` to check the general classification.  

I've deployed the api to a server, and endpoints can be checked though:  

https://karting-api-devaway2021.herokuapp.com/api/race/1  
https://karting-api-devaway2021.herokuapp.com/api/classification  
https://karting-api-devaway2021.herokuapp.com/api/pilot/5fd7dbd8425291733653f7a1

PS: Even though the tech test was changed, I had already started it when the change happened, so I decided to finish it aswell.  
You can find the code at `src/Classes/TaskManager.php`.  
Also, I've prepared some test for this second test, you can see the cases prepared for the test in `src/test/Classes/TaskManagerTest.php` run it with 
`php bin/phpunit tests/Classes/TaskManagerTest.php` 
