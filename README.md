# error_log
Custom error and exception handler and error log data

There is 2 files 
- db_connect.php(you need to define your db connection here)
- error_log.php(custom error and exception handler method is defined here)

You need to include error_log.php in your application. It should log all the errors into db tables mentioned in the db connect file

There is a folder error_dashboard. 
- You just need to update the db connect file 
Then if you go to the directory path it should list out all the errors logged in the application.

