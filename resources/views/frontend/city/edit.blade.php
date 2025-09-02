@extends('frontend.layouts.app')
@section('content')
    <div class="dashboard__inner">
        <div class="row">
            <div class="col-12">
                <div class="dashboard__card bg__white padding-20 radius-10">
                    <div class="dashboard__card__header">
                        <h4 class="dashboard__card__header__title">Edit City</h4>
                    </div>
                    <div class="dashboard__card__inner mt-4">
                        <form id="cityEditForm" method="POST" action="{{ route('cities.update', $city->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                {{-- State --}}
                                <div class="col-md-6">
                                    <label for="state_id" class="form-label">State</label>
                                    <select name="state_id" id="state_id" class="form-control">
                                        <option value="">Select State</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}"
                                                @if (old('state_id', $city->state_id) == $state->id) selected @endif>
                                                {{ $state->name }} ({{ $state->country->name }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('state_id')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                    <p class="text-danger"></p>
                                </div>

                                {{-- City Name --}}
                                <div class="col-md-6">
                                    <label for="city_name" class="form-label">City Name</label>
                                    <input type="text" name="name" id="city_name" class="form-control"
                                        value="{{ old('name', $city->name) }}">
                                    @error('name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                    <p class="text-danger"></p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update City</button>
                                <a href="{{ route('cities.index') }}" class="btn btn-secondary">Cancel</a>
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
        // City Form Submission
        $("#cityEditForm").submit(function(e) {
            e.preventDefault();
            var form = $(this);
            $("button[type=submit]").prop('disabled', true);

            $.ajax({
                url: form.attr('action'),
                type: 'PUT',
                data: form.serialize(),
                dataType: 'json',
                success: function(res) {
                    $("button[type=submit]").prop('disabled', false);
                    if (res.status == true) {
                        $("#state_id, #city_name").removeClass('is-invalid');
                        $("#state_id, #city_name").siblings('p').html('');
                        window.location.href = "{{ route('cities.index') }}";
                    } else {
                        var errors = res.errors;
                        if (errors.state_id) {
                            $("#state_id").addClass('is-invalid').siblings('p').html(errors.state_id[
                                0]);
                        } else {
                            $("#state_id").removeClass('is-invalid').siblings('p').html('');
                        }
                        if (errors.name) {
                            $("#city_name").addClass('is-invalid').siblings('p').html(errors.name[0]);
                        } else {
                            $("#city_name").removeClass('is-invalid').siblings('p').html('');
                        }
                    }
                },
                error: function(err) {
                    console.log('Something went wrong', err);
                }
            });
        });
    </script>
@endsection
