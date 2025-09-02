$(document).ready(function() {

     // Set CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    // Handle city store
    $("#cityForm").submit(function(e){
        e.preventDefault();
        var form = $(this);
        $("button[type=submit]").prop('disabled', true);

        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            dataType: 'json',
            success: function(res){
                $("button[type=submit]").prop('disabled', false);

                if(res.status == true){
                    $("#state_id, #city_name").removeClass('is-invalid');
                    $("#state_id, #city_name").siblings('p').html('');
                    window.location.reload();
                } else {
                    var errors = res.errors;
                    if(errors.state_id){
                        $("#state_id").addClass('is-invalid').siblings('p').html(errors.state_id[0]);
                    } else {
                        $("#state_id").removeClass('is-invalid').siblings('p').html('');
                    }
                    if(errors.name){
                        $("#city_name").addClass('is-invalid').siblings('p').html(errors.name[0]);
                    } else {
                        $("#city_name").removeClass('is-invalid').siblings('p').html('');
                    }
                }
            },
            error: function(err){
                console.log('Something went wrong', err);
            }
        });
    });

});

// Make deleteCity global
window.deleteCity = function(id) {
    if (confirm('Are you sure you want to delete this city?')) {
        $.ajax({
            url: '/cities/' + id, // Destroy route
            type: 'DELETE',
            data: $('#delete-city-form-' + id).serialize(),
            dataType: 'json',
            success: function(response) {
                if(response.status) {
                    // Remove row from table
                    $('#city-' + id).remove();

                    // Show success message
                    $('<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">' +
                        response.message +
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                      '</div>').insertBefore('table');
                }
            },
            error: function(xhr) {
                console.log('Delete failed', xhr);
            }
        });
    }
}
