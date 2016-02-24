
function add_task() {
    $('.add-new-task').submit(function() {
        var new_task = $('.add-new-task input[name=new-task]').val();

        if(new_task != ''){
            
            /*
            $.post('includes/add-task.php', { task: new_task }, function( data ) {
                $(data).appendTo('.task-list ul').hide().fadeIn();
            });
            */
        }
        
        return false; // Ensure that the form does not submit twice
    });
}

function post(endpoint, data, success_callback, errors_callback) {
    $.ajax({
        type: 'post',
        url: endpoint + '.php',
        data: data,
        dataType: 'json',
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
            if (response.errors == 0) {
                if (success_callback && typeof(success_callback) === 'function') {
                    success_callback(response);
                } 
            } else {
                if (errors_callback && typeof(errors_callback) === 'function') {
                    errors_callback(response);
                } 
            }
        }
    }); 
}

$(document).ready(function() {
    add_task();
});