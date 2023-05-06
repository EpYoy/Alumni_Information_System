<div class="panel-header panel-header-sm"></div>
<div class="col-md-12">
            <div class="card card-plain">
              <div class="card-header">
                <h4 class="card-title"> Alumni List</h4>
                <p class="category"> Here is a subtitle for this table</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                        <th >Name</th>
                        <th>Gender</th>
                        <th class="text-center">Home Address</th>
                        <th>Year Graduated</th>
                        <th class="text-right">Action</th>
                    </thead>
                    <tbody>
                    @foreach($alumnis as $alumni)
                      <tr>
                        <td>{{ $alumni->firstName }} {{ $alumni->middle_Name }} {{ $alumni->last_name }}</td>
                        <td class="text-center">{{ $alumni->gender }}</td>
                        <td>{{ $alumni->homeAddress }}</td>
                        <td class="text-center">{{ $alumni->year }}</td>
                        <td class="text-right">
                            <a href="#" class="btn btn-sm btn-primary">Edit</a>
                            <button class="btn btn-sm btn-danger">Remove</button>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                    </table>
                 </div>
              </div>
          </div>
     </div>
</div>

      

