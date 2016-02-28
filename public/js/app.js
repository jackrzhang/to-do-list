
$(document).ready(function() {
    add_task();
    delete_task();
});

function add_task() {
    $('.add-new-task').submit(function() {
        var new_task = $('.add-new-task input[name=new-task]').val();

        if(new_task != ''){
            // reset task input
            $('.new-task-input').val('');

            // AJAX post
            post_dataType_html('../ajax/add-task', { task: new_task },
                function(response) { 
                    $(response).appendTo('.task-list ul').hide().fadeIn();
                    $(".add_new_task").trigger("reset");
                    console.log('Task added.');
                }
            );
        }

        return false; // Ensure that the form does not submit twice
    });
}

function delete_task() {
    $('.task-list').on('click', '.delete-button', function() {
        var current_element = $(this);
        var id = $(this).attr('id');

        post_dataType_html('../ajax/delete-task', { task_id: id },
            function(response) { 
                current_element.parent().fadeOut("fast", function() { $(this).remove(); });
                console.log('Task deleted.');
            }
        );
    });
}

function post_dataType_html(endpoint, data, callback) {
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
                console.log('AJAX success.');
                callback(response);
            } 
        }
    }); 
}