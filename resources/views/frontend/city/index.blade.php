@extends('frontend.layouts.app')
@section('content')
    <div class="dashboard__inner">
        @include('frontend.message')
        {{-- Add City Form --}}
        <div class="row g-4 mb-4">
            <div class="col-lg-12">
                <div class="dashboard__card bg__white padding-20 radius-10">
                    <div class="dashboard__card__header mb-3">
                        <h4 class="dashboard__card__header__title">Add City</h4>
                    </div>
                    <div class="dashboard__card__inner">
                        <form id="cityForm" method="POST" action="{{ route('cities.store') }}">
                            @csrf
                            <div class="row g-3">
                                {{-- State --}}
                                <div class="col-md-6">
                                    <label for="state_id" class="form-label">State</label>
                                    <select name="state_id" id="state_id" class="form-control">
                                        <option value="">Select State</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}
                                                ({{ $state->country->name }})</option>
                                        @endforeach
                                    </select>
                                    @error('state_id')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                    <p class="text-danger"></p> {{-- AJAX errors --}}
                                </div>

                                {{-- City Name --}}
                                <div class="col-md-6">
                                    <label for="city_name" class="form-label">City Name</label>
                                    <input type="text" name="name" id="city_name" class="form-control"
                                        placeholder="Enter city name">
                                    @error('name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                    <p class="text-danger"></p> {{-- AJAX errors --}}
                                </div>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Save City</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- City List --}}
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="dashboard__card bg__white padding-20 radius-10">
                    <div class="dashboard__card__header mb-3">
                        <h4 class="dashboard__card__header__title">City List</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cities as $city)
                                    <tr id="city-{{ $city->id }}">
                                        <td>{{ $city->id }}</td>
                                        <td>{{ $city->name }}</td>
                                        <td>{{ $city->state->name }}</td>
                                        <td>{{ $city->state->country->name }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('cities.edit', $city->id) }}"
                                                class="btn btn-sm btn-primary me-2">Edit</a>

                                            <!-- Delete button -->
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="deleteCity({{ $city->id }})">
                                                Delete
                                            </button>

                                            {{-- Hidden delete form for CSRF --}}
                                            <form id="delete-city-form-{{ $city->id }}" method="POST"
                                                action="{{ route('cities.destroy', $city->id) }}" style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $city->id }}">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $cities->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('customJS')
    <script src="{{ asset('assets/js/city.js') }}"></script>
@endsection
