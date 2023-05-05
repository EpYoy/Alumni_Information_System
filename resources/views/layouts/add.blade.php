@extends('layouts.main')
<title>Table List</title>
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Alumni Table List</h5>
              </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Input Alumni Data
            </div>
            <div class="card-body">
            <form method="POST" action="{{ route('alumni.store') }}">
                @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-label">First Name</div>
                                <input type="text" class="form-control" id="first_name" name="first_name" required> 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-label">Middle Name</div>
                                <input type="text" class="form-control" id="middle_name" name="middle_name" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-label">Last Name</div>
                                <input type="text" class="form-control" id="last_name" name="last_name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div for="gender" class="form-label">Gender</div>
                                <select class="form-select" id="gender" name="gender" required>
                                    <option value="">-- Select Gender --</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-label">Year Graduated</div>
                                <select class="form-select" id="year" name="year" required>
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
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form>
                                <button class="btn btn-primary" >Save</button>
                            </form>
                        </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          </div>
          

@endsection