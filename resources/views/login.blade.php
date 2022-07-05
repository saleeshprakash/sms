<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="saleeshprakash">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>Student Management System</title>

    <!-- vendor css -->
    <link href="{{asset('/')}}lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{asset('/')}}lib/Ionicons/css/ionicons.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="../css/bracket.css">
</head>

<body>

    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
        <form action="javascript:;" id="form-login">
            <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
                <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> SMS <span class="tx-normal">]</span></div>
                <div class="tx-center mg-b-60">Student Management System</div>

                <div class="form-group">
                    <input id="input-email" type="text" class="form-control" placeholder="Enter your email" name="email">
                </div>
                <div class="form-group">
                    <input id="input-password" type="password" class="form-control" placeholder="Enter your password" name="password">
                </div>
                <button type="submit" class="btn btn-info btn-block">Sign In</button>
                <div class="mt-2" id="panel-message">
                </div>
            </div>
        </form>
    </div>

    <script src="{{asset('/')}}lib/jquery/jquery.js"></script>
    <script src="{{asset('/')}}lib/popper.js/popper.js"></script>
    <script src="{{asset('/')}}lib/bootstrap/bootstrap.js"></script>
    <script src="{{asset('/')}}js/jquery.validate.min.js"></script>

    <script type="text/javascript">
        let validator = $('#form-login').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                    maxlength: 100
                },
                password: {
                    required: true,
                    maxlength: 100
                }
            },
            messages: {
                email: {
                    required: "Email is required",
                    email: "Please enter a valid email",
                    maxlength: "Email maximum length should not exceed 100 characters"
                },
                password: {
                    required: "Password is required",
                    maxlength: "Password maximum length should not exceed 100 characters"
                }
            },
            submitHandler: function(form) {
                let el = this;
                $.ajax({
                    url: `{{route('login.check')}}`,
                    method: 'POST',
                    data: $(form).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.status === false) {
                            $('#panel-message').html(`<div class="alert alert-danger">Invalid login credentials!</div>`).trigger('clearAfterSomeTimes');
                        } else {
                            window.location.href = "{{route('dashboard')}}";
                        }

                    }
                })
            },
            error: function(error) {
                $('#panel-message').html(`<div class="alert alert-danger">Invalid login credentials!</div>`).trigger('clearAfterSomeTimes');
            }
        });

        $('#panel-message').on('clearAfterSomeTimes', (e) => {
            e.preventDefault();
            setTimeout(() => {
                $('#panel-message').html(``);
            }, 6000)
        })
    </script>
</body>

</html>