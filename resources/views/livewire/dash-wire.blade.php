<div class="container-fluid px-4">
    <section class="section">
        <h1 class="section-header"></h1>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card card-sm-3">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Saved Alumni</h4>
                        </div>
                        <div class="card-body">
                            {{ count($alumniList) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card card-sm-3">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Removed Alumni</h4>
                        </div>
                        <div class="card-body">
                            {{ $removedAlumniCount }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card card-sm-3">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Updated Alumni</h4>
                        </div>
                        <div class="card-body">
                        {{ $updatedAlumniCount }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card card-sm-3">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Input</h4>
                        </div>
                        <div class="card-body">
                        {{ count($alumniAll ?? []) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <h1 class="mt-4"></h1>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Add Alumni
        </div>
        <div class="card-body">
            <form wire:submit.prevent="saveAlumni">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-label">First Name</div>
                            <input type="text" class="form-control" wire:model="first_name" name="first_name" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-label">Middle Name</div>
                            <input type="text" class="form-control" wire:model="middle_name" name="middle_name" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-label">Last Name</div>
                            <input type="text" class="form-control" wire:model="last_name" name="last_name" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" wire:model="gender" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="year_graduated">Year Graduated</label>
                        <select class="form-control" wire:model="year_graduated" name="year_graduated" required>
                            <option value="">Select Year</option>
                            @for($year = date('Y'); $year >= 1950; $year--)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="address" class="form-label">Home Address</label>
                            <textarea class="form-control" wire:model="address" name="address" rows="3" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-success" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-table me-1"></i>
                    Saved List
                </div>
                <div>
                    <input type="text" wire:model="searchTerm" placeholder="Search..." class="form-control">
                </div>
            </div>
        </div>
        <div class="card-body">
        @if ($alumniList->isEmpty())
            <div class="d-flex justify-content-center align-items-center" style="min-height: 200px;">
                <p class="text-center">No Records Found</p>
            </div>
            @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Year Graduated</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($alumniList as $alumni)
                    <tr>
                        <td>{{ $alumni->first_name }} {{ $alumni->middle_name }} {{ $alumni->last_name }}</td>
                        <td>{{ $alumni->gender }}</td>
                        <td>{{ $alumni->address }}</td>
                        <td>{{ $alumni->year_graduated }}</td>
                        <td class="text-right">
                            <button class="btn btn-success" wire:click="editAlumni({{ $alumni->id }})" data-toggle="modal" data-target="#editModal">Edit</button>
                            <button class="btn btn-danger" wire:click="deleteAlumni({{ $alumni->id }})">Remove</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        @endif

            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Alumni</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form wire:submit.prevent="updateAlumni">
                                <input type="hidden" wire:model="alumniId">
                                <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" wire:model="first_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="middle_name">Middle Name</label>
                                        <input type="text" class="form-control" wire:model="middle_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control"  wire:model="last_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select class="form-control"  wire:model="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="year_graduated">Year Graduated</label>
                                        <select class="form-control" wire:model="year_graduated" required>
                                            <option value="">Select Year</option>
                                            @for($year = date('Y'); $year >= 1950; $year--)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Home Address</label>
                                        <textarea class="form-control" rows="3" wire:model="address"></textarea>
                                    </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

