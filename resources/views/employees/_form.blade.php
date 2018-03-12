<div class="row">
    <div class="col-sm-7">
        <div class="form-group">
            <label for="name" class="col-lg-3 control-label">Name</label>
            <div class="col-lg-8">
                <input type="text" id="name" class="form-control" name="name" value="{{ $employee->name or '' }}">
            </div>
        </div>

        <div class="form-group">
            <label for="department" class="col-lg-3 control-label">Department</label>
            <div class="col-lg-8">
                <select class="form-control" id="department" name="department">
                    @if(isset($employee))
                        <option value="{{ $employee->department->id }}">{{ $employee->department->name }}</option>
                    @endif
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="job_title" class="col-md-3 control-label">Job Title</label>
            <div class="col-md-8">
                <input type="text" id="job_title" class="form-control" name="job_title" value="{{ $employee->job_title or '' }}">
            </div>
        </div>

        <div class="form-group">
            <label for="cellphone" class="col-md-3 control-label">CellPhone</label>
            <div class="col-md-8">
                <input type="text" id="cellphone" class="form-control" name="cellphone" value="{{ $employee->cellphone or '' }}">
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="col-md-3 control-label">Email</label>
            <div class="col-md-8">
                <input type="text" id="email" class="form-control" name="email" value="{{ $employee->email or '' }}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary btn-md">
                    <i class="{{ $icon or 'fa fa-plus-circle' }}"></i>
                    &nbsp; {{ $buttonText or 'Add New Employee' }}
                </button>
            </div>
        </div>

    </div>

    <div class="col-sm-5">
        <img src="/{{ $avatar or ($employee->photo != '' ? $employee->photo : 'images/avatar.png')}}" id="avatar" class="img-responsive" alt="Employee Photo">
        <div class="form-group">
            <label for="photo" class="control-label"></label>
            <input type="file" id ="photo" class="form-control" name="photo" onchange="readURL(this);" />
            <script>
                function readURL(input) {
                    if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                    $('#avatar')
                    .attr('src', e.target.result)
                    //                    .width(200)
                    //                    .height(200);
                    };

                    reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>
        </div>
    </div>
</div>