@extends('layouts.default')
@section('main-content')
<div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('dashboard')}}">SMS</a>
            <span class="breadcrumb-item active">Students</span>
        </nav>
    </div>
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5 row">
            <div class="col-sm-10">&nbsp;</div>
            <div class="col-sm-2">
                <button class="btn btn-block btn-primary" id="btn-addstudent"> Add New</button>
            </div>
        </h4>
    </div>
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="bd bd-gray-300 rounded table-responsive">
                <div class="p-2" id="panel-message">
                    @if( Session::has("success") )
                    <div class="alert alert-success">
                        <button class="close" data-dismiss="alert"></button>
                        {{ Session::get("success") }}
                    </div>
                    @endif
                </div>
                <table class="table mg-b-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Class</th>
                            <th>Gender</th>
                            <th>Reporting Teacher</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            <th scope="row">{{$student->id}}</th>
                            <td>{{$student->name}}</td>
                            <td>{{$student->age}}</td>
                            <td>{{$student->class->name}}</td>
                            <td>{{$student->gender}}</td>
                            <td>{{$student->teacher->name}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" title="Edit" class="btn btn-warning btn-edit" data-id="{{$student->id}}"><i class="fa fa-edit"></i></button>
                                    <button type="button" title="Delete" class="btn btn-danger btn-delete" data-id="{{$student->id}}"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- modal student registration form  -->
    <div id="modal-studentregistration" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Student Registration</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-5">
                    <form class="form-layout form-layout-4" id="form-student">
                        <div class="row">
                            <label class="col-sm-4 form-control-label">Name:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" placeholder="Enter Name" name="name">
                            </div>
                        </div>
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Age:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" placeholder="Enter Age" name="age">
                            </div>
                        </div>
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Gender:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <select class="form-control" name="gender">
                                    <option value="">--Select Gender--</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Class:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <select class="form-control" name="class">
                                    <option value="">--Select Class--</option>
                                    @foreach($classes as $class)
                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Reporting Teacher:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <select class="form-control" name="reporting_teacher">
                                    <option value="">--Select Teacher--</option>
                                    @foreach($teachers as $teacher)
                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div><!-- modal-body -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary tx-size-xs" form="form-student">Register</button>
                    <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end student registration form  -->

    <!-- modal student edit form  -->
    <div id="modal-studentedit" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Student Edit</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-5">
                    <form class="form-layout form-layout-4" id="form-studentedit">
                        <div class="row">
                            <label class="col-sm-4 form-control-label">Name:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" placeholder="Enter Name" name="name">
                                <input type="hidden" name="id">
                            </div>
                        </div>
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Age:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" placeholder="Enter Age" name="age">
                            </div>
                        </div>
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Gender:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <select class="form-control" name="gender">
                                    <option value="">--Select Gender--</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Class:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <select class="form-control" name="class">
                                    <option value="">--Select Class--</option>
                                    @foreach($classes as $class)
                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Reporting Teacher:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <select class="form-control" name="reporting_teacher">
                                    <option value="">--Select Teacher--</option>
                                    @foreach($teachers as $teacher)
                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div><!-- modal-body -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary tx-size-xs" form="form-studentedit">Update</button>
                    <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end student edit form  -->
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    let new_student_btn = document.getElementById('btn-addstudent');
    let new_student_modal = document.getElementById('modal-studentregistration');
    let studet_form = document.getElementById('form-student');
    let studentedit_modal = document.getElementById('modal-studentedit');
    let studentedit_form = document.getElementById('form-studentedit');

    new_student_btn.addEventListener('click', () => {
        $(new_student_modal).modal({
            show: true
        });
        validator.resetForm();
        studet_form.reset();
    })

    let validator = $(studet_form).validate({
        rules: {
            name: {
                required: true,
                maxlength: 80
            },
            age: {
                required: true,
                max: 18,
                min: 5
            },
            gender: {
                required: true,
            },
            class: {
                required: true,
            },
            reporting_teacher: {
                required: true,
            }
        },
        messages: {
            name: {
                required: "Student name is required",
                maxlength: "Student name length should not exceed 80 characters"
            },
            age: {
                required: "Age is required",
                max: "Maximum age limit is 18",
                min: "Minimum age limit is 5"
            },
            gender: {
                required: "Gender is required",
            },
            class: {
                required: "Class is required",
            },
            reporting_teacher: {
                required: "Reporting teacher is required",
            }
        },
        submitHandler: function(form) {
            let el = this;
            $.ajax({
                url: `{{route('student.register')}}`,
                method: 'POST',
                data: $(form).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                success: function(data) {
                    if (data.status === true) {
                        window.location.reload();
                    } else {
                        $('#panel-message').html(`<div class="alert alert-danger">${data.message}</div>`).trigger('clearAfterSomeTimes');
                    }
                }
            })
        },
        error: function(error) {
            $('#panel-message').html(`<div class="alert alert-danger">Could not add student details</div>`).trigger('clearAfterSomeTimes');
        }
    });


    let validator2 = $(studentedit_form).validate({
        rules: {
            name: {
                required: true,
                maxlength: 80
            },
            age: {
                required: true,
                max: 18,
                min: 5
            },
            gender: {
                required: true,
            },
            class: {
                required: true,
            },
            reporting_teacher: {
                required: true,
            }
        },
        messages: {
            name: {
                required: "Student name is required",
                maxlength: "Student name length should not exceed 80 characters"
            },
            age: {
                required: "Age is required",
                max: "Maximum age limit is 18",
                min: "Minimum age limit is 5"
            },
            gender: {
                required: "Gender is required",
            },
            class: {
                required: "Class is required",
            },
            reporting_teacher: {
                required: "Reporting teacher is required",
            }
        },
        submitHandler: function(form) {
            let el = this;
            $.ajax({
                url: `{{route('student.update')}}`,
                method: 'POST',
                data: $(form).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                success: function(data) {
                    if (data.status === true) {
                        window.location.reload();
                    } else {
                        $('#panel-message').html(`<div class="alert alert-danger">${data.message}</div>`).trigger('clearAfterSomeTimes');
                    }
                }
            })
        },
        error: function(error) {
            $('#panel-message').html(`<div class="alert alert-danger">Could not add student details</div>`).trigger('clearAfterSomeTimes');
        }
    });

    $('#panel-message').on('clearAfterSomeTimes', (e) => {
        e.preventDefault();
        setTimeout(() => {
            $('#panel-message').html(``);
        }, 6000)
    });

    $('.btn-delete').on('click', function() {
        let id = $(this).data('id');
        if (confirm(`Do you really want to delete this student from the list?`)) {
            $.ajax({
                url: `{{route('student.delete')}}`,
                method: 'POST',
                data: {
                    id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                success: function(data) {
                    if (data.status === true) {
                        window.location.reload();
                    } else {
                        $('#panel-message').html(`<div class="alert alert-danger">${data.message}</div>`).trigger('clearAfterSomeTimes');
                    }
                }
            })
        }
    });

    $('.btn-edit').on('click', function() {
        let id = $(this).data('id');

        $.ajax({
            url: `{{route('student.details')}}`,
            method: 'GET',
            data: {
                id
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            success: function(data) {
                if (data.status === true) {
                    let {
                        id,
                        name,
                        age,
                        gender,
                        reporting_teacher_id,
                        class_id
                    } = data.data;

                    validator2.resetForm();
                    studentedit_form.reset();

                    $(studentedit_form).find('[name="id"]').val(id);
                    $(studentedit_form).find('[name="name"]').val(name);
                    $(studentedit_form).find('[name="age"]').val(age);
                    $(studentedit_form).find('[name="gender"]').val(gender);
                    $(studentedit_form).find('[name="reporting_teacher"]').val(reporting_teacher_id);
                    $(studentedit_form).find('[name="class"]').val(class_id);


                    $(studentedit_modal).modal({
                        show: true
                    });

                }
            }
        })
    });
</script>
@endsection