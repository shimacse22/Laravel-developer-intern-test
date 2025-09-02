@extends('frontend.layouts.app')
@section('content')
    <div class="dashboard__inner">
        @include('frontend.message')
        {{-- ======= Row 1: State Form ======= --}}
        <div class="row g-4 mb-4">
            <div class="col-lg-12">
                <div class="dashboard__card bg__white padding-20 radius-10">
                    <div class="dashboard__card__header mb-3">
                        <h4 class="dashboard__card__header__title">Add State</h4>
                    </div>
                    <div class="dashboard__card__inner">
                        <form id="stateForm" method="POST" action="{{ route('states.store') }}">
                            @csrf
                            <div class="row g-3">
                                {{-- Country --}}
                                <div class="col-md-6">
                                    <label for="country_id" class="form-label">Country</label>
                                    <select name="country_id" id="country_id" class="form-control">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    {{-- Blade Validation Error --}}
                                    @error('country_id')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror

                                    {{-- AJAX Validation Error --}}
                                    <p class="text-danger"></p>
                                </div>

                                {{-- State Name --}}
                                <div class="col-md-6">
                                    <label for="state_name" class="form-label">State Name</label>
                                    <input type="text" name="name" id="state_name" class="form-control"
                                        placeholder="Enter state name">
                                    {{-- Blade Validation Error --}}
                                    @error('name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror

                                    {{-- AJAX Validation Error --}}
                                    <p class="text-danger"></p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Save State</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- ======= Row 2: State Table ======= --}}
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="dashboard__card bg__white padding-20 radius-10">
                    <div class="dashboard__card__header mb-3">
                        <h4 class="dashboard__card__header__title">State List</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($states as $state)
                                    <tr id="state-{{ $state->id }}">
                                        <td>{{ $state->id }}</td>
                                        <td>{{ $state->name }}</td>
                                        <td>{{ $state->country->name ?? '' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('states.edit', $state->id) }}"
                                                class="btn btn-sm btn-primary me-2">Edit</a>
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="deleteState({{ $state->id }})">Delete</button>

                                            <form id="delete-state-form-{{ $state->id }}" method="POST"
                                                style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $state->id }}">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- Pagination --}}
                        <div class="mt-3">
                            {{ $states->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customJS')
    <script src="{{ asset('assets/js/states.js') }}"></script>
@endsection
