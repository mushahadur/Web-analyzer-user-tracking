@extends('Layout.app')

@section('title','Add New Site')

@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h5>Add New Site</h5>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Dashboard
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <h4>New</h4><br>
    <div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Domain Name<span class="text-danger font-16">*</span></label>
                    <input type="text" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Domain URL<span class="text-danger font-16">*</span></label>
                    <input type="text" class="form-control" required>
                </div>
            </div>
        </div>
        <hr>
        <p>Privacy</p>
        <div class="col-md-6 col-sm-12">
            <div class="custom-control custom-control-inline custom-radio mb-5">
                <input value="1" type="radio" id="customRadio5" name="customRadio" class="custom-control-input">
                <label class="custom-control-label" for="customRadio5">Privet</label>
            </div>
            <div class="custom-control custom-control-inline custom-radio mb-5">
                <input value="0" type="radio" id="customRadio6" name="customRadio" class="custom-control-input">
                <label class="custom-control-label" for="customRadio6">Public</label>
            </div>
        </div>

        <hr>
        <p>Notifications</p>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="custom-control custom-checkbox mb-5">
                    <input type="checkbox" class="custom-control-input" value="{{ session()->get('userMail') }}" id="customCheck1-1">
                    <label class="custom-control-label" for="customCheck1-1"><strong>Email</strong> <br>Periodic email reports.</label>
                </div>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Exclude IPs</label>
                    <input type="text" class="form-control" >
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Exclude URL query parameters</label>
                    <input type="text" class="form-control" >
                </div>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <button id="CodeCopyBtn" onclick="myFunction()" class="btn btn-sm btn-info">Copy</button>
                    <label>Include this code in the <spam class="text-danger" ><span><</span>head></spam> or <span  class="text-danger"> <span><</span>body></span> section of your website.</label>
                    <textarea readonly type="text" class="form-control" name="" id="contentForCopy" cols="30" rows="5">

                    </textarea>
                </div>
            </div>
        </div>

        <div class="row pb-5">
            <div class="col-md-6 col-sm-6">
                <button href="" class="btn btn-primary btn-block" role="button">Save</button>
            </div>
        </div>

    </div>

    <script>
        function myFunction() {
            // Get the text field
            var copyText = document.getElementById("contentForCopy");
            // Select the text field
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices
            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.value);
            // Alert the copied text
            //alert("Copied the text: " + copyText.value);
        }
    </script>




@endsection
