<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Add Alumni</h5>
              </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Input Alumni Data
            </div>
            <div class="card-body">
            <form wire:submit.prevent="saveAlumni">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-label">First Name</div>
                                <input type="text" class="form-control"  wire:model="firstName" required> 
                            </div>
                            @error('firstName')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-label">Middle Name</div>
                                <input type="text" class="form-control" wire:model="middle_Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-label">Last Name</div>
                                <input type="text" class="form-control" wire:model="last_name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div for="gender" class="form-label">Gender</div>
                                <select class="form-select" wire:model="gender" required>
                                    <option value="">-- Select Gender --</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-label">Year Graduated</div>
                                <select class="form-select"  wire:model="year" required>
                                    <option value="">-- Select Year --</option>
                                    @for($year = 2021; $year >= 1950; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-label">Home Adrress</div>
                                <input type="text" class="form-control"  wire:model="homeAddress" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form>
                                <button  class="btn btn-primary" >Save</button>
                            </form>
                        </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          </div>
         