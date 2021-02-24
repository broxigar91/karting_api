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

You can take the pilot's id from this list:

- 5fd7dbd8425291733653f7a1
- 5fd7dbd84c10103c125fc1af
- 5fd7dbd852fabb4be13c1eb9
- 5fd7dbd85b2953646a9407e4
- 5fd7dbd89297af55072644c8
- 5fd7dbd89c8a6e77119ce4ed
- 5fd7dbd8a13b7e886de9dcd1
- 5fd7dbd8a26c54361e216d1d
- 5fd7dbd8a6dc0e35c463557a
- 5fd7dbd8ad23cc6d496d1854
- 5fd7dbd8b17082d71119ecad
- 5fd7dbd8bb2380088b237517
- 5fd7dbd8bf06b725b4069c5c
- 5fd7dbd8c8a62e7d8d7611e9
- 5fd7dbd8cd33cbe63f745d6a
- 5fd7dbd8ce3a40582fb9ee6b
- 5fd7dbd8d37bc572f2d66fc3
- 5fd7dbd8d81df480a78a4f0a
- 5fd7dbd8db9765504acbaeae
- 5fd7dbd8de6b99dcec4fe7fd
- 5fd7dbd8e86ba3614527e290
- 5fd7dbd8f7deeaecc2351447


I've deployed the api to a server, and endpoints can be checked through this links (exmplified):  

https://karting-api-devaway2021.herokuapp.com/api/race/1  
https://karting-api-devaway2021.herokuapp.com/api/classification  
https://karting-api-devaway2021.herokuapp.com/api/pilot/5fd7dbd8425291733653f7a1

Also, I've made some tests that can be checked at `src/tests/`. In order to run them you'll need to execute  
`php bin/phpunit`  
*when 1st executed it will install php unit package.*  

PS: Even though the tech test was changed, I had already started it when the change happened, so I decided to finish it aswell.  
You can find the code at `src/Classes/TaskManager.php`.  
Also, I've prepared some test for this second test, you can see the cases prepared for the test in `src/test/Classes/TaskManagerTest.php` run it with 
`php bin/phpunit tests/Classes/TaskManagerTest.php` 
