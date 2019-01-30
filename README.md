# Insly Developer task

#### Installation
1. Open config/database.php file and replace database credentials with yours
2. Start install.php file (Example: http://yoursite.com/install.php)
3. For replacing default credentials you can open config/app.php file and edit them

#### What and Where
1. Routes are placed in routes folder file by file: index, task1, task2, task2post (post request), task3
2. Javascript is written in assets/js/custom.js
3. There is 1 bin2text function which is written in functions.php file
4. Composer works, can add packages. But there was no need.
5. For adding new route-view: create a folder or file inside routes folder. 
The the url will be, for example: /?route=folderName/fileName.php
6. Database sql file is in database folder