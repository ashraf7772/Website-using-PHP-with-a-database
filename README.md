# Website-using-PHP-with-a-database
I made a website for a university assignment using PHP code, HTML code, SQL code and a database.
The database was originally on phpMyAdmin with XAMPP on my own PC but I exported the database to 
a Webmin server database provided by my university and configured my code to match with the Webmin 
server which is why I have deleted the database login details from my PHP files.

This website was designed for students to: 
* upload projects they are working on
* view projects
* be able to login user accounts
* be able to logout user accounts by destroying the current session and unsetting the session username
* create user accounts
* search through uploaded projects and have a project name and ID returned,
* have a seperate 'logged in search' for users with accounts who will have the option to logout after finding what they're looking for
* not allow users to add projects unless they give a user ID that is on the database
* not allow users to log in unless username and password match the database
* give a new User Id and Project Id for each new user
* put all project information in my table on my database on a table in one of my webpages
  
I used SQL code on phpMyAdmin to:
• Change table columns to not allow null values
• Delete entries that are no longer needed
• Create entries to test the tables after changing them

I have used HTML code to:
• Show text and change the text to different sizes
• Make links and buttons to navigate through my directory.
• Display images
• Create the forms to log in and register users and add projects and search through projects.

Security Features:
* Authentication using Login.php - done by verifying the password a user has entered matches a
hashed password on the database
* Password hashing using register.php - hashes whatever password a user has entered
* SQL injection prevention using register.php, SearchProjects.php, LoggedInSearch.php, Login.php
and AddProject.php - these files use ‘?’ for values that are waiting to be filled in to prevent
injections

Improvements for next time:
* Make my interface better and less difficult to navigate
* Use more security features
* Improve my coding style by being more modular











