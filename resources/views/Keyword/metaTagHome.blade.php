
@extends('Keyword.Layout.App')

@section('title','Meta Tag Generator')

@section('content')
    <div class="container pt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Meta Tag Generator</h1>

                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" id="form-sample-1" novalidate="novalidate">

                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label"><span>Site Title  <strong class="veryImportant">*</strong></span></label>
                        <div class="col-sm-12">
                            <input id="Title" class="form-control" type="text" name="title" required>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row" >
                                <label class="col-sm-12 col-form-label"><span>Site Sort Description <strong class="veryImportant">*</strong></span></label>
                                <div class="col-sm-12">
                                    <textarea id="SortDescription" rows="3" cols="65"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row" >
                                <label class="col-sm-12 col-form-label"><span>Site Keywords (Separate with commas) <strong class="veryImportant">*</strong></span></label>
                                <div class="col-sm-12">
                                    <textarea id="Keywords" rows="3" cols="65" placeholder="Keyword 1, Keyword 2, Keyword 3, Keyword 4, ...."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row" >
                                <label class="col-sm-12 col-form-label"><span>Allow robots to index your website? <strong class="veryImportant">*</strong></span></label>
                                <div class="col-sm-12">
                                    <select id="AllowRobotsIndex" class="form-control" required>
                                        <option value="" selected disabled>Select Sub Category</option>
                                        <option value="">Yes</option>
                                        <option value="">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row" >
                                <label class="col-sm-12 col-form-label"><span>Allow robots to follow all links? <strong class="veryImportant">*</strong></span></label>
                                <div class="col-sm-12">
                                    <select id="AllowRobotsLink" class="form-control" required>
                                        <option value="" selected disabled>Select Sub Category</option>
                                        <option value="">Yes</option>
                                        <option value="">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row" >
                                <label class="col-sm-12 col-form-label"><span>What type of content will your site display? <strong class="veryImportant">*</strong></span></label>
                                <div class="col-sm-12">
                                    <select id="ContentType" class="form-control" required>
                                        <option value="" selected disabled>Select Sub Category</option>
                                        <option value="">utf-16</option>
                                        <option value="">utf-8</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row" >
                                <label class="col-sm-12 col-form-label"><span>What is your site primary language? <strong class="veryImportant">*</strong></span></label>
                                <div class="col-sm-12">
                                    <select id="primaryLang" class="form-control" required>
                                        <option value="" selected disabled>Select Sub Category</option>
                                        <option value="">English</option>
                                        <option value="">Bengali</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row" >
                                <label class="col-sm-12 col-form-label"><span>Author Name <strong class="veryImportant">*</strong></span></label>
                                <div class="col-sm-12">
                                    <input id="AuthorName" class="form-control" type="text" name="title" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row" >
                                <label class="col-sm-12 col-form-label"><span>Search engines should revisit this page after <strong class="veryImportant">*</strong></span></label>
                                <div class="col-sm-12">
                                    <select id="RankDays" class="form-control" required>
                                        <option value="" selected disabled>Select Days</option>
                                        <option value="5">5 Day</option>
                                        <option value="10">10 Day</option>
                                        <option value="15">15 Day</option>
                                        <option value="20">20 Day</option>
                                        <option value="25">25 Day</option>
                                        <option value="30">30 Day</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button id="metaTagGenerateBtn" onclick="event.preventDefault();" class="btn btn-block btn-info ">Generate</button>


                    <hr>
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label">Your Generated Meta Tags</label>


                        <div class="col-sm-12">
<textarea id="GenarateResultCode" readonly disabled rows="9" cols="135" class="d-none"></textarea>

                            <button id="copyMetaTagBtn" onclick="event.preventDefault();" class="btn btn-success d-none">Copy to Clipboard</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>

        $('#metaTagGenerateBtn').on('click',function (){
            let title = $('#Title').val();
            let SortDescription = $('#SortDescription').val();
            let Keywords = $('#Keywords').val();
            let AllowRobotsIndex = $('#AllowRobotsIndex').val();
            let AllowRobotsLink = $('#AllowRobotsLink').val();
            let ContentType = $('#ContentType').val();
            let primaryLang = $('#primaryLang').val();
            let AuthorName = $('#AuthorName').val();
            let RankDays = $('#RankDays').val();

            let result = "<meta name='title' content='"+title+"'>\n" +
                "<meta name='description' content='"+SortDescription+"'>\n" +
                " <meta name='keywords' content='"+Keywords+"'>\n" +
                "<meta name='robots' content='index, follow'>\n" +
                "<meta http-equiv='Content-Type' content='text/html; charset='"+ContentType+"'>\n" +
                "<meta name='language' content='"+primaryLang+"'>\n" +
                "<meta name='revisit-after' content='"+RankDays+" days'>\n" +
                "<meta name='author' content='"+AuthorName+"'>";

            $('#GenarateResultCode').removeClass('d-none');
            $('#GenarateResultCode').val(result);



        })

    </script>
@endsection
