add_task(); // Call the add_task function

function add_task() {
    $('.add-new-task').submit(function() {
        var new_task = $('.add-new-task input[name=new-task]').val();

        if(new_task != ''){
            $.post('includes/add-task.php', { task: new_task }, function( data ) {
                $('.add-new-task input[name=new-task]').val('');
                $(data).appendTo('.task-list ul').hide().fadeIn();
            });
        }
        
        return false; // Ensure that the form does not submit twice
    });
}