# BloodBankSystem
## Steps for setup
Install Xampp

1. Open Xampp Control Centre and start Apache and MySQL

2. Download this file in C:\xampp\htdocs folder and "extract here"

3. goto localhost\bloodbanksystem-master to open the php files

4. goto localhost\phpmyadmin to import sql file
  -  on the left side there is list of database select "New"
  -  name the database "users" and scroll down and click "go" (creates a database named users)  
  -  seltec your database from the list.  
  -  on the navigation bar above find "Import"
  -  locate your database (for me its C:\xampp\htdocs\bloodbank-master\users.sql) and execute.  
  -  now your database is linked


5. goto localhost\bloodbanksystem-master to access the site


6. to host the site on cloud follow the links below

### 

Steps for [Cloud Hosting](https://scotch.io/@phalconVee/deploying-a-php-and-mysql-web-app-with-heroku).
```
$ cd htdocs/Projects/bloodbanksystem-master
$ heroku login
$ git init
$ git add .
$ git commit -am"first commit"
$ heroku create
$ git push heroku master
$ heroku addons:add cleardb:ignite
$ mysql -u b8cc36236ace06 -h us-cdbr-iron-east-01.cleardb.net -p heroku_923e2c6e4de1689 < users.sql
Enter password: ********
$ composer update
$ git add .
$ git commit -am "sql commit"
$ git push heroku master
```
### Steps for [finding clearDB host, password, user and DBname](https://scotch.io/@phalconVee/using-mysql-on-heroku).
### Working app can be found at [BloodBankSystem](https://bloodbanksystemddmo.herokuapp.com).
