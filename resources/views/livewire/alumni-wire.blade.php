<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Save Alumni</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Input Data
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
                            <select class="form-control" id="gender" wire:model="gender">
                            <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="year_graduated" >Year Graduated</label>
                            <select class="form-control" wire:model="year_graduated" name="year_graduated" required>
                                <option value="">Select Year</option>
                                @for($year_graduated = 2021; $year_graduated >= 1950; $year_graduated--)
                                    <option value="{{ $year_graduated }}">{{ $year_graduated }}</option>
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
                            <form>
                                <button class="btn btn-success" type="submit" >Save</button>
                            </form>
                        </div>
                    </div>
            </div>
        </div>

</div>
</main>


