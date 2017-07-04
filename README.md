# spidertask2

online notice board

used XAMPP.
Can be downloaded from - https://www.apachefriends.org/download.html
language used for backend -PHP.

servername = "localhost";
username = "ananya";
password = "1234";
datasasename = "projectdb";

how to login for the first time-
email-ag9111998@gmail.com
password-ananyagupta
access level is set to prof.

Build in instructions-
First of all, set your own server by using XAMPP.
Create new database and create new tables in it.
then choose tempales online and use them in ur pages.
details of different pages to be creeated are as follows-

(1)config- this page contains all the backend code for making a connection to our server.

(2)registration- when ever a new user enters, he/she is redirected to this page. Using this page, he/she can create new account and register themself on this website. it cantains a form which contains various input boxes and a submit button.

(3)Login- it matches the entered email and password with all the registrations. if a entry matches, this page will direct you to the dashboard according to the access level, otherwise you will be directed to registration page. 

(4)loginc- it contains all the backend codes of login page. it uses select query to select users from database. it sets session variables which will be used throught out the session on different pages until user logs out.

(5)prof Dashboard- when a user logs in with access level = prof, it is directed to this page. it contain a bar which have button to access both to users and new posts page and also have a button to log out. only on this page, eack post will contain a delete button, which can be used to delete posts. uses SELECT query to display the posts.

(6)cr Dashboard- when a user logs in with access level = cr, it is directed to this page. it contain a bar which have button to access to new posts page only and also have a button to log out. uses SELECT query to display the posts.

(7)student Dashboard- when a user logs in with access level = student, it is directed to this page. it contain a bar which have button  to log out only. uses SELECT query to display the posts.

(8)new post- it contains a form which contains various input boxes and a submit button. this will create new post by making entry in posts table. it uses INSERT query.

(9)delete post- it contains all the backend codes to delete post and is used when an admin wants to delete a post created. it uses UPDATE query and get method to get id of the delete button in order to get info about which post to delete.

(10)users- it displays all the registered users. It uses SQL select query to select data from database.

(11)change access- when a admin clicks on "change" on previous page, he/she is redirected to this page from where the access level can be changed. it displays only the selected user and all its details .it uses SQL select query to select data from database.

(12)change accessc- it contains the backend code of changing accesslevel. it uses SQL update query to update the accesslevel.

(13)logout- this page contains backend codes to log out by destroying session.

table used for storing all the registration = "registration"
![registrationtable](/screenshots/registrationtable.jpg?raw=true "registrationtable")

table used for storing all the posts = "posts"
![poststable](/screenshots/poststable.jpg?raw=true "poststable")

used bootstrap template for styling of the pages.

![registration](/screenshots/registration.jpg?raw=true "registration")
The above is the screenshot of the "registration" page.
when ever a new user enters, he/she is redirected to this page. Using this page, he/she can create new account and register themself on this website.
link to access thi page-http://localhost/spidertask/registration.php

![login](/screenshots/login.jpg?raw=true "login")
The above is the screenshot of "login" page.
after creating account, user can use this page to log in to the web site.
After logging in, user will be directed to dashboard, according to his/her access level.
link to access thi page-http://localhost/spidertask/login.php

![studentdashboard](/screenshots/studentdashboard.jpg?raw=true "studentdashboard")
The above is the screenshot of student dashboard.
this page is accessable to all the students.
link to access thi page-http://localhost/spidertask/studentdashboard.php

![crdashboard](/screenshots/crdashboard.jpg?raw=true "crdashboard")
The above is the screenshot of CR dashboard.
this page is accessable to the class representatives
link to access thi page-http://localhost/spidertask/crdashboard.php

![profdashboard](/screenshots/profdashboard.jpg?raw=true "profdashboard")
The above is the screenshot of professor dashboard.
this page is accessable to the admin
link to access thi page-http://localhost/spidertask/profdashboard.php

![newpost](/screenshots/newpost.jpg?raw=true "newpost")
The above is the screenshot of the page "new post".
this page is accessable only to admin and CR.
Using this page, they can create new post.
link to access thi page-http://localhost/spidertask/newpost.php

![users](/screenshots/users.jpg?raw=true "users")
The above is the screenshot of the page"usres". this page is accessable only to the admin i.e. porf. 
On this page admin gets information about all the registered users and can change the access of the usres by clicking "change".
Initial access level will be "student".
link to access thi page-http://localhost/spidertask/users.php

![changeaccess](/screenshots/changeaccess.jpg?raw=true "changeaccess")
The above is the screenshot of the page "change access". 
when a admin clicks on "change" on previous page, he/she is redirected to this page from where the access level can be changed.
link to access thi page-http://localhost/spidertask/changeaccess.php

