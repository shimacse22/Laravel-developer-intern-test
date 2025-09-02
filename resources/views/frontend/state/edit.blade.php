@extends('frontend.layouts.app')
@section('content')
    <div class="dashboard__inner">
        <div class="row">
            <div class="col-12">
                <div class="dashboard__card bg__white padding-20 radius-10">
                    <div class="dashboard__card__header">
                        <h4 class="dashboard__card__header__title">Edit State</h4>
                    </div>
                    <div class="dashboard__card__inner mt-4">
                        <form id="stateEditForm" method="POST" action="{{ route('states.update', $state->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                {{-- Country --}}
                                <div class="col-md-6">
                                    <label for="country_id" class="form-label">Country</label>
                                    <select name="country_id" id="country_id" class="form-control" required>
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                @if ($state->country_id == $country->id) selected @endif>
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger"></p>
                                </div>

                                {{-- State Name --}}
                                <div class="col-md-6">
                                    <label for="state_name" class="form-label">State Name</label>
                                    <input type="text" name="name" id="state_name" class="form-control"
                                        value="{{ $state->name }}" required>
                                    <p class="text-danger"></p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update State</button>
                                <a href="{{ route('states.index') }}" class="btn btn-secondary">Cancel</a>
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

        //State Edit Form Submission
        
        $("#stateEditForm").submit(function(e) {
            e.preventDefault();
            var form = $(this);
            $("button[type=submit]").prop('disabled', true);

            $.ajax({
                url: '{{ route('states.update', $state->id) }}',
                type: 'PUT',
                data: form.serialize(),
                dataType: 'json',
                success: function(response) {
                    $("button[type=submit]").prop('disabled', false);
                    if (response.status) {
                        $("#state_name, #country_id").removeClass('is-invalid');
                        $("#state_name, #country_id").siblings('p').html('');
                        window.location.href = "{{ route('states.index') }}";
                    } else {
                        var errors = response.errors;
                        if (errors.name) $("#state_name").addClass('is-invalid').siblings('p').html(
                            errors.name[0]);
                        else $("#state_name").removeClass('is-invalid').siblings('p').html('');
                        if (errors.country_id) $("#country_id").addClass('is-invalid').siblings('p')
                            .html(errors.country_id[0]);
                        else $("#country_id").removeClass('is-invalid').siblings('p').html('');
                    }
                }
            });
        });
    </script>
@endsection
