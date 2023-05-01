<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/userLoginPage.css')}}">

    <title>User Login Page</title>
</head>
<body>

<div class="container text-center">
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-center align-items-center mt-5">
                <div class="card">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item text-center">
                            <a class="nav-link active btl" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Login</a>
                        </li>
                        <li class="nav-item text-center">
                            <a class="nav-link btr" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Signup</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="form px-4 pt-5">
                                <form action="" method="post" class="loginForm">
                                    <input required type="text" value="" name="email" class="form-control" placeholder="Enter Email">
                                    <input required type="password" value="" name="password" class="form-control" placeholder="Password">
                                    <button id="userLoginBtn" type="submit" class=" btn btn-dark btn-block">Login</button>
                                </form>
                                <!--
                                <hr>
                                <p>or, Login With</p>
                                <div class="row">
                                    <div class="col">
                                        <button class="btn btn-block btn-outline-success"><img src="{{asset('front/assets/image/login/google.png')}}" width="20px" alt=""> Google </button>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-block btn btn-outline-info"><img src="{{asset('front/assets/image/login/github.png')}}" width="20px" alt=""> GitHub </button>
                                    </div>
                                </div>
                                -->
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="form px-4">

                                <input required id="name" type="text" name="" class="form-control" placeholder="Name">

                                <input required id="email" type="email" name="" class="form-control" placeholder="Email">

                                <input required id="phone" type="text" name="" class="form-control" placeholder="Phone With Country Code">

                                <input required id="password" type="password" name="" class="form-control" placeholder="Password">

                                <button id="userRegBtn" class="btn btn-dark btn-block">Signup</button>

                                <!--
                                <hr>
                                <p>or, Create With</p>
                                <div class="row">
                                    <div class="col mb-5">
                                        <button class="btn btn-block btn-outline-success"><img src="{{asset('front/assets/image/login/google.png')}}" width="20px" alt=""> Google </button>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-block btn btn-outline-info"><img src="{{asset('front/assets/image/login/github.png')}}" width="20px" alt=""> GitHub </button>
                                    </div>
                                </div>
                                -->
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="{{asset('front/assets/js/bootstrap.bundle.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('front/assets/js/popper.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('front/assets/js/jquery.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('front/assets/js/axios.min.js')}}" ></script>

<script type="text/javascript">
    $('.loginForm').on('submit',function (event){
        event.preventDefault();
        let formData = $(this).serializeArray();
        let email = formData[0]['value'];
        let password = formData[1]['value'];

        let url = "/userLogin";
        axios.post(url, {email:email,password:password } ).then((res)=>{
            if (res.status==200 && res.data == 1) {
                window.location.href = '/dashboard';
            }else {
                $('#userLoginBtn').html("Login Fail");
                toastr.error('Data Insert Fail..');
                setTimeout(function () {
                    $('#userLoginBtn').html("Login");
                },3000);
            }
        }).catch( (err)=>{
            $('#userLoginBtn').html("Something Wrong, Try Again");
            toastr.error('Data Insert Fail..');
            setTimeout(function () {
                $('#userLoginBtn').html("Login");
            },3000);
        })
    })

    // User Registration Button
    $('#userRegBtn').click(function (){
        let name     = $('#name').val();
        let email    = $('#email').val();
        let phone    = $('#phone').val();
        let password = $('#password').val();

        if (name.length==0 || email.length==0 || phone.length==0 || password.length==0){
            alert("File Not Empty")
        }else{
            newUserRegistration(name, email, phone, password);
        }
    })
    // User Registration Function
    function newUserRegistration(name, email, phone, password) {
        $('#userRegBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");

        let url = "/userRegistration";
        axios.post(url, {name:name, email:email, phone:phone,password:password } ).then((res)=>{
            if (res.status==200 && res.data == 1) {
                $('#userRegBtn').html("Account Create Successful");
                $('#name').val('');
                $('#email').val('');
                $('#phone').val('');
                $('#password').val('');
                setTimeout(function () {
                    $('#userRegBtn').html("Sign Up");
                },3000);
            }else if(res.status==200 && res.data == 10){
                $('#userRegBtn').html("Mail Already Exist");
                $('#name').val('');
                $('#email').val('');
                $('#phone').val('');
                $('#password').val('');
                setTimeout(function () {
                    $('#userRegBtn').html("Sign Up");
                },3000);
            }  else {
                $('#userRegBtn').html("Fail Try Again");
                $('#name').val('');
                $('#email').val('');
                $('#phone').val('');
                $('#password').val('');
                setTimeout(function () {
                    $('#userRegBtn').html("Sign Up");
                },3000);
            }
        }).catch( (err)=>{
            $('#userRegBtn').html("Something Wrong, Try Again");
            $('#name').val('');
            $('#email').val('');
            $('#phone').val('');
            $('#password').val('');
            setTimeout(function () {
                $('#userRegBtn').html("Sign Up");
            },3000);
        })
    }
</script>

</body>
</html>
