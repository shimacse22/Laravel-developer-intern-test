@extends('frontend.layouts.app')
@section('content')
    <div class="dashboard__inner">
        @include('frontend.message')

        {{-- ======= Row 1: Country Form ======= --}}
        <div class="row g-4 mb-4">
            <div class="col-lg-12">
                <div class="dashboard__card bg__white padding-20 radius-10">
                    <div class="dashboard__card__header mb-3">
                        <h4 class="dashboard__card__header__title">Add Country</h4>
                    </div>
                    <div class="dashboard__card__inner">
                        <form action="{{ route('countries.store') }}" method="POST" id="countryForm">
                            @csrf
                            <div class="row g-3">
                                {{-- Country Name --}}
                                <div class="col-md-6">
                                    <label for="country_name" class="form-label">Country Name</label>
                                    <input type="text" name="name" id="country_name" class="form-control"
                                        placeholder="Enter country name">
                                    @error('name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                    <p class="text-danger"></p> {{-- for AJAX errors --}}
                                </div>
                                {{-- Validation error --}}

                                {{-- ISO Code --}}
                                <div class="col-md-6">
                                    <label for="country_code" class="form-label">ISO Code</label>
                                    <input type="text" name="iso_code" id="country_code" class="form-control"
                                        placeholder="Enter ISO code">
                                    {{-- Validation error --}}
                                    @error('iso_code')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                    <p class="text-danger"></p> {{-- for AJAX errors --}}
                                </div>

                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Save Country</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- ======= Row 2: Country Table ======= --}}
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="dashboard__card bg__white padding-20 radius-10">
                    <div class="dashboard__card__header mb-3">
                        <h4 class="dashboard__card__header__title">Country List</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Country</th>
                                    <th>ISO Code</th>
                                    <th>States Count</th>
                                    <th>Cities Count</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($countries as $country)
                                    <tr id="country-{{ $country->id }}">
                                        <td>{{ $country->id }}</td>
                                        <td>{{ $country->name }}</td>
                                        <td>{{ $country->iso_code }}</td>

                                        {{-- States Count --}}
                                        <td>{{ $country->states->count() }}</td>

                                        {{-- Cities Count --}}
                                        <td>{{ $country->states->sum(fn($state) => $state->cities->count()) }}</td>

                                        {{-- Actions --}}
                                        <td class="text-center">
                                            <a href="{{ route('countries.edit', $country->id) }}"
                                                class="btn btn-sm btn-primary me-2">
                                                Edit
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="deleteCountry({{ $country->id }})">
                                                Delete
                                            </button>


                                        </td>
                                        {{-- Hidden delete form for CSRF --}}
                                        <form id="delete-country-form-{{ $country->id }}" method="POST"
                                            style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $country->id }}">
                                        </form>


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- Pagination links --}}
                        <div class="mt-3">
                            {{ $countries->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('customJS')
    <script src="{{ asset('assets/js/country.js') }}"></script>
@endsection
