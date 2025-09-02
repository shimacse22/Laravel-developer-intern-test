$(document).ready(function() {
    
    // Set CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    // Handle country form submission
    $("#countryForm").submit(function(event) {
        event.preventDefault();
        var element = $(this);

        $("button[type=submit]").prop('disabled', true);

        $.ajax({
            url: '/countries', // store route
            type: 'POST',
            data: element.serializeArray(),
            dataType: 'json',
            success: function(response) {
                $("button[type=submit]").prop('disabled', false);

                if (response.status == true) {
                    $("#country_name, #country_code").removeClass("is-invalid");
                    $("#country_name, #country_code").siblings("p").html('');

                    window.location.reload(); // reload table after insert
                } else {
                    var errors = response.errors;

                    if (errors.name) {
                        $("#country_name").addClass('is-invalid').siblings('p').html(errors.name[0]);
                    } else {
                        $("#country_name").removeClass('is-invalid').siblings('p').html('');
                    }

                    if (errors.iso_code) {
                        $("#country_code").addClass('is-invalid').siblings('p').html(errors.iso_code[0]);
                    } else {
                        $("#country_code").removeClass('is-invalid').siblings('p').html('');
                    }
                }
            },
            error: function(jqXHR, exception) {
                console.log('Something went wrong', exception);
            }
        });
    });

    // Handle country deletion
    window.deleteCountry = function(id) {
        if (confirm('Are you sure you want to delete this country?')) {
            $.ajax({
                url: '/countries/' + id,
                type: 'DELETE',
                data: $('#delete-country-form-' + id).serialize(),
                dataType: 'json',
                success: function(response) {
                    if(response.status) {
                        $('#country-' + id).remove();

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

});
