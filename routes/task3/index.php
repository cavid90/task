<div class="container">
    <div class="starter-template">
        <h1>Task 3 - Store Employee data</h1>
        <?php if(is_file('database/test.sql')): ?>
        <h4>Test.sql file exists. Click button to import it to mysql if you haven't done it yet</h4>
        <a href="install.php" class="btn btn-success">Import sql to database</a>
        <?php else: ?>
        <h4 class="text-danger">Test.sql file does not exist</h4>
        <?php endif; ?>
        <hr>
        <?php
        $sql            = "SELECT e_i.*, e.name FROM `employee_information` as e_i LEFT JOIN `employee` as e ON e.id = e_i.employee_id WHERE e.id = 1";
        $employee_data  = \Classes\Db::getInstance()->raw($sql)
            ->fetchAll();
        ?>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Employee Id</th>
                        <th>Name</th>
                        <th>Information</th>
                        <th>Experience</th>
                        <th>Education</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employee_data as $result): ?>
                    <tr>
                        <td><?=$result['id']?></td>
                        <td><?=$result['employee_id']?></td>
                        <td><?=$result['name']?></td>
                        <td><?=$result['introduction']?></td>
                        <td><?=$result['experience']?></td>
                        <td><?=$result['education']?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <br>
        <strong>Code for getting 1-person data in all languages:</strong>
        <pre>
            <code>
                <?=$sql?>
            </code>
        </pre>
    </div>

</div><!-- /.container -->