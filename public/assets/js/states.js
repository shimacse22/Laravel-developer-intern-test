$(document).ready(function() {
    
    // Set CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    // Handle state form submission
    $("#stateForm").submit(function(e){
        e.preventDefault();
        var form = $(this);
        $("button[type=submit]").prop('disabled', true);

        $.ajax({
            url: '/states', // hardcoded store route
            type: 'POST',
            data: form.serialize(),
            dataType: 'json',
            success: function(response){
                $("button[type=submit]").prop('disabled', false);

                if(response.status){
                    // Clear validation errors
                    $("#state_name, #country_id").removeClass('is-invalid');
                    $("#state_name, #country_id").siblings('p').html('');

                    // Reload page to show the new state
                    window.location.reload();
                } else {
                    var errors = response.errors;

                    if(errors.name){
                        $("#state_name").addClass('is-invalid').siblings('p').html(errors.name[0]);
                    } else {
                        $("#state_name").removeClass('is-invalid').siblings('p').html('');
                    }

                    if(errors.country_id){
                        $("#country_id").addClass('is-invalid').siblings('p').html(errors.country_id[0]);
                    } else {
                        $("#country_id").removeClass('is-invalid').siblings('p').html('');
                    }
                }
            },
            error: function(xhr){
                console.log('Something went wrong', xhr);
            }
        });
    });

    // Handle state deletion
    window.deleteState = function(id){
        if(confirm('Are you sure you want to delete this state?')){
            $.ajax({
                url: '/states/' + id, // hardcoded destroy route
                type: 'DELETE',
                data: $('#delete-state-form-' + id).serialize(),
                dataType: 'json',
                success: function(response){
                    if(response.status){
                        // Remove the state row from table
                        $('#state-' + id).remove();

                        // Show success message
                        $('<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">' +
                            response.message +
                            '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' +
                        '</div>').insertBefore('table');
                    }
                },
                error: function(xhr){
                    console.log('Delete failed', xhr);
                }
            });
        }
    }

});
