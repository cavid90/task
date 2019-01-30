<div class="container">
    <div class="starter-template">
        <a href="/?route=task1/index" class="btn btn-info">Task 1 - Name</a>
        <a href="/?route=task2/index" class="btn btn-info">Task 2 - Calculator</a>
        <a href="/?route=task3/index" class="btn btn-info">Task 1 - Store Employee Data</a>
    </div>
    <hr>
    <h3>Insly Developer task</h3>
    <h4>Installation</h4>

    <ul>
        <li>1. Open config/database.php file and replace database credentials with yours</li>
        <li>2. Start install.php file (Example: http://yoursite.com/install.php) or <a href="install.php">Click Here</a></li>
        <li>3. For replacing default credentials you can open config/app.php file and edit them</li>
    </ul>

    <h4>What and Where</h4>
    <ul>
        <li>Routes are placed in routes folder file by file in related folder: index, task1, task2, task3</li>
        <li>Javascript is written in assets/js/custom.js</li>
        <li>There are bin2text and config functions which are written in functions.php file</li>
        <li>Composer works, can add packages. But there was no need.</li>
        <li>
            For adding new route-view: create a folder or file inside routes folder.
            <br/>
            The the url will be, for example: /route=folderName/fileName.php
        </li>
    </ul>
</div><!-- /.container -->