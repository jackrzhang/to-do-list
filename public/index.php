<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Simple to-do list application.">
    <meta name="author" content="jackrzhang">

    <title>To-Do Lists</title>

    <!-- Custom Styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="wrap">
        <div class="task-list">
            <ul>
                <?php 
                require_once('../core/ToDoLists.php');
                require_once('../core/DB.php');
                $tasks = new ToDoLists();
                $tasks->display_all_tasks();
                ?>
            </ul>
        </div>
        <form class="add-new-task" autocomplete="off">
            <input type="text" class="new-task-input" name="new-task" placeholder="Type a new task and press ENTER to add..." />
        </form>
    </div>


    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>

    <!-- Application Javascript -->
    <script src="js/app.js"></script>
</body>

</html>