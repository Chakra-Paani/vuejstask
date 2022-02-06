# A small Quiz Application Developed On VUejs And Php MYSQL
1) This is a simple quiz application Using Core PHP, MYSQL AND VUEJS Frontend Framework.
2) First extract the vendor zip into vendor folder in the application folder ypu want tp place your code.
3) Create A database in the mysql and import the vuejstask sql file in it.
4) Create a Admin folder and place the Addquiztest.php,index.php,quizactions.php in it.
5) place all the remaining php files in your project folder.
6) Change the conn.php file with your database credentials.
7) Open the config.php and set your credentials.



Doucmentation About Application Working:

**User Module 1:**
1) First the Users will be login with their google account by providing the required credentials.
2) After Successfull Login Sessions are created and the user info will be stored in those sessions.
3) Sessions time is set for 30mins in config.php. When the user is actively interacted with the application the session time is updated frequently.
4) After login success the page is redirected to the quiz dashboard page.

**User Module 2**
1) in quiz Dashboard page the user have multiple quiz choices to choose.
2) once he select any one of the quiz category he will redirected to the test page.
3) In that quiz test page he see question about the quiz.
4) He can only see the next question if he select any one of the option and click on next the next question will be visible.
5) After click on submit hhe see the marks he earned.

**Admin Module**
1) Admin url was -> hostname/projectname/Admin.
2) After going through that url admin see a page having list of quiz categories And a add button to add the quiz category.
3) Once he click on add button a form will be open.
4) After entering the quiz name and submit the category will be saved in database.
5) By clicking on Add questions button individual quiz will be opened and there list of questions will be displayed.
6) once click on the add button a form displayed with the quiz question details.
7) After submitting the form with the data of quiz name,quiz level,options and answer for that question the quiz question is stored on database.
