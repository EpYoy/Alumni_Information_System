<div class="container-fluid px-4">
        <h1 class="mt-4">Alumni Records</h1>
        <!--<form class="form-inline mb-3" wire:submit.prevent="search">
            <div class="form-group mr-2">
                <input type="text" class="form-control" placeholder="Search..." wire:model.debounce.500ms="search">
            </div>
        </form>-->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Table List
            </div>
            <div class="card-body">
                @if ($alumni->isEmpty())
                    <p>No Records Found</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alumni as $alumnus)
                                <tr>
                                    <td>{{ $alumnus->first_name }} {{ $alumnus->middle_name }} {{ $alumnus->last_name }}</td>
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#viewModal{{ $alumnus->id }}">View</button>
                                        <button class="btn btn-danger" wire:click="deleteAlumni({{ $alumnus->id }})">Remove</button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="viewModal{{ $alumnus->id }}" tabindex="-1" role="dialog" aria-labelledby="viewModal{{ $alumnus->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="viewModal{{ $alumnus->id }}Label">Alumni Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Name:</strong> {{ $alumnus->first_name }} {{ $alumnus->middle_name }} {{ $alumnus->last_name }}</p>
                                                <p><strong>Gender:</strong> {{ $alumnus->gender }}</p>
                                                <p><strong>Year Graduated:</strong> {{ $alumnus->year_graduated }}</p>
                                                <p><strong>Home Address:</strong> {{ $alumnus->address }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
