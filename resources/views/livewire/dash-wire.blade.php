<div class="container-fluid px-4">
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
                            <div class="form-group">
                                <div for="gender" class="form-label">Gender</div>
                                <select class="form-select" wire:model="gender" name="gender" required>
                                    <option value="">-- Select Gender --</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="year_graduated" class="form-label">Year Graduated</label>
                                <select class="form-select" wire:model="year_graduated" name="year_graduated" required>
                                    <option value="">-- Select Year --</option>
                                    @for($year_graduated = 2021; $year_graduated >= 1950; $year_graduated--)
                                        <option value="{{ $year_graduated }}">{{ $year_graduated }}</option>
                                    @endfor
                                </select>
                            </div>
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
                            <form>
                                <button class="btn btn-primary" type="submit" >Save</button>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Saved List
            </div>
            <div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Year Graduated</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alumniList as $alumni)
                <tr>
                    <td>{{ $alumni->first_name }} {{ $alumni->middle_name }} {{ $alumni->last_name }}</td>
                    <td>{{ $alumni->gender }}</td>
                    <td>{{ $alumni->address }}</td>
                    <td>{{ $alumni->year_graduated }}</td>

                    <td>
                        <button class="btn btn-danger" wire:click="deleteAlumni({{ $alumni->id }})">Remove</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>