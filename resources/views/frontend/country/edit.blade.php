@extends('frontend.layouts.app')

@section('content')
    <div class="dashboard__inner">
        <div class="row">
            <div class="col-12">
                <div class="dashboard__card bg__white padding-20 radius-10">
                    <div class="dashboard__card__header">
                        <h4 class="dashboard__card__header__title">Edit Country</h4>
                    </div>
                    <div class="dashboard__card__inner mt-4">
                        <form id="countryEditForm" method="POST" action="{{ route('countries.update', $country->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="country_name" class="form-label">Country Name</label>
                                    <input type="text" name="name" id="country_name" class="form-control"
                                        value="{{ $country->name }}" required>
                                    <p class="text-danger"></p>
                                </div>
                                <div class="col-md-6">
                                    <label for="country_code" class="form-label">ISO Code</label>
                                    <input type="text" name="iso_code" id="country_code" class="form-control"
                                        value="{{ $country->iso_code }}" required>
                                    <p class="text-danger"></p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update Country</button>
                                <a href="{{ route('countries.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customJS')
    <script>
        // Set CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //Country Edit Form Submission

        $("#countryEditForm").submit(function(event) {
            event.preventDefault();
            var element = $(this);
            $("button[type=submit]").prop('disabled', true);

            $.ajax({
                url: element.attr('action'),
                type: 'PUT',
                data: element.serializeArray(),
                dataType: 'json',
                success: function(response) {
                    $("button[type=submit]").prop('disabled', false);

                    if (response.status === true) {
                        // Clear validation errors
                        $("#country_name, #country_code").removeClass("is-invalid");
                        $("#country_name, #country_code").siblings("p").html('');
                        // Redirect to index
                        window.location.href = "{{ route('countries.index') }}";
                    } else {
                        var errors = response.errors;

                        if (errors.name) {
                            $("#country_name").addClass('is-invalid').siblings('p').html(errors.name[
                                0]);
                        } else {
                            $("#country_name").removeClass('is-invalid').siblings('p').html('');
                        }

                        if (errors.iso_code) {
                            $("#country_code").addClass('is-invalid').siblings('p').html(errors
                                .iso_code[0]);
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
    </script>
@endsection
