<div class="container-fluid px-4">
    <h1 class="mt-4">Records</h1>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Table List
        </div>
        <div class="card-body">
        @if ($alumni->isEmpty())
            <div class="d-flex justify-content-center align-items-center" style="min-height: 200px;">
                <p class="text-center">No Records Found</p>
            </div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alumni as $alumnus)
                            <tr>
                                <td>{{ $alumnus->first_name }} {{ $alumnus->middle_name }} {{ $alumnus->last_name }}</td>
                                <td class="text-right">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#viewModal{{ $alumnus->id }}">View</button>
                                    <button class="btn btn-danger" wire:click="deleteAlumni({{ $alumnus->id }})">Remove</button>
                                    <button class="btn btn-success" wire:click="editAlumni({{ $alumnus->id }})" data-toggle="modal" data-target="#editModal">Edit</button>
                                </td>
                            </tr>
                                                    
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
    {{ $alumni->links()}}

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-upload me-1"></i>
            File Upload
        </div>
        <div class="card-body">
            <form wire:submit.prevent="uploadFile" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="file">Choose File</label>
                    <input type="file" class="form-control" wire:model="file">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
                <div wire:loading wire:target="file" class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{ $uploadProgress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $uploadProgress }}%"></div>
                </div>
            </form>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-file-alt me-1"></i>
            Uploaded Files
        </div>
        <div class="card-body">
            @if (empty($files))
                <div class="d-flex justify-content-center align-items-center" style="min-height: 200px;">
                    <p class="text-center">No Files Uploaded</p>
                </div>
            @else
                <ul>
                    @foreach ($files as $file)
                        <li>
                            <a href="{{ asset('storage/' . $file) }}" target="_blank">{{ basename($file) }}</a>
                        </li>
                        <td class="text-right">
                            <button class="btn btn-danger btn-sm" wire:click="removeFile('{{ $file }}')">Remove</button>
                        </td>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    @push('scripts')
        <script>
            Livewire.on('fileUploaded', (uploadedFile) => {
                console.log('File uploaded:', uploadedFile);
                Livewire.emit('refreshFiles');
            });
            Livewire.on('refreshFiles', () => {
                Livewire.reload();
            });
        </script>
    @endpush

