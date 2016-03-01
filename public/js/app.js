
$(document).ready(function() {
    addTask();
    deleteTask();
    checkTask();
});

function addTask() {
    $('.add-new-task').submit(function() {
        var newTask = $('.add-new-task input[name=new-task]').val();

        if(newTask != ''){
            // reset task input
            $('.new-task-input').val('');

            // AJAX post
            post('../ajax/add-task', { task: newTask },
                function(response) { 
                    $(response).appendTo('.task-list ul');
                    //console.log('Task added.');
                }
            );
        }

        return false; // Ensure that the form does not submit twice
    });
}

function deleteTask() {
    $('.task-list').on('click', '.delete-button', function() {
        var selectedTask = $(this).parent();
        var id = selectedTask.attr('id');

        post('../ajax/delete-task', { task_id: id },
            function(response) { 
                selectedTask.hide(function() { $(this).remove(); });
                //console.log('Task deleted.');
            }
        );
    });
}

function checkTask() {
    $('.task-list').on('click', '.check-button', function() {
        var selectedTask = $(this).parent();
        var id = selectedTask.attr('id');

        post('../ajax/check-task', { task_id: id },
            function(response) { 
                selectedTask.find('span.task-text').toggleClass('checked');
                //console.log('Task checked.');
            }
        );
    });
}

function post(endpoint, data, callback) {
    $.ajax({
        type: 'post',
        url: endpoint + '.php',
        data: data,
        dataType: 'html',
        cache: false,
        error: function(a, b) {
            0 === a.status ?        console.log('Not connected.  Verify Network.') 
            : 404 == a.status ?     console.log('Requested page not found.  [404]') 
            : 500 == a.status ?     console.log('Internal Server Error  [500].') 
            : 'parsererror' === b ? console.log('Requested JSON parse failed.') 
            : 'timeout' === b ?     console.log('Time out error.') 
            : 'abort' === b ?       console.log('Ajax request aborted.') 
            :                       console.log('Uncaught Error.  ' + a.responseText);
        },
        success: function(response) {
            if (callback && typeof(callback) === 'function') {
                callback(response);
                //console.log('AJAX success.');
            } 
        }
    }); 
}