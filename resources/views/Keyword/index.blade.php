<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<body>

<div class="container mt-5">
    <div class="row  py-5">
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body mx-auto">
                    <img src="{{asset('keyword')}}/img/marketing.png" alt="" width="150px">
                    <h2 class="pt-3"><a href="/metaTagHome" class="btn btn-block btn-success">Keyword Analysis</a></h2>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body mx-auto">
                    <img src="{{asset('keyword')}}/img/briefcase.png" alt="" width="150px">
                    <h2 class="pt-3"><a href="{{ route('user.login') }}" target="_blank" class="btn btn-block btn-success">Web Analysis</a></h2>

                </div>
            </div>
        </div>

    </div>
</div>





<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
