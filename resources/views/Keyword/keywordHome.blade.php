@extends('Keyword.Layout.App')

@section('title','Keyword Page')

@section('content')

    <div class="container pt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Keyword Generator</h1>

                <form action="{{url('keywordHome')}}" method="post" enctype="multipart/form-data" class="form-horizontal" id="form-sample-1" novalidate="novalidate">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label"><span>Your targeted keyword  <strong class="veryImportant">*</strong></span></label>
                        <div class="col-sm-8">
                            <input id="keywordNameInput" class="form-control" type="text" name="keywordName" required>
                        </div>
                        <div class="col-sm-4">
                            <button id="keyWordGenBtn" type="submit" class="btn btn-block btn-success">Click To Find</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <div class="container py-3 mb-5">

        @empty($userKeySearch)
            <h3>My Keyword: None</h3>
        @endempty

        @if (!empty($peopleAlsoAskArr))
                <h3>My Keyword: {{$userKeySearch}}</h3>
        @endif


        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Organic Keywords</h4>

                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                    </tr>
                    </thead>
                    <tbody>

                    @empty($organicArr)
                        <th colspan="3">No Data</th>
                    @endempty

                    @if (!empty($organicArr))

                        @php($j=0)
                        @for($i=0; $i < sizeof($organicArr); $i++)
                            <tr>
                                <th scope="row">{{++$j}}</th>
                                <td>{{$organicArr[$i]['orgTitle']}}</td>
                                <td>{{$organicArr[$i]['orgSnippet']}}</td>
                            </tr>
                        @endfor
                    @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>


    <div class="container py-3 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Related Search Keywords</h4>

                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Keyword</th>
                    </tr>
                    </thead>
                    <tbody>

                    @empty($relatedSearchArr)
                        <th colspan="2">No Data</th>
                    @endempty

                    @if (!empty($relatedSearchArr))
                        @php($j=0)
                        @for($i=0; $i < sizeof($relatedSearchArr); $i++)
                            <tr>
                                <th scope="row">{{++$j}}</th>
                                <td>{{$relatedSearchArr[$i]['query']}}</td>
                            </tr>
                        @endfor
                    @endif

                    </tbody>
                </table>

            </div>
        </div>
    </div>


    <div class="container py-3 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Related Questions Keywords and Description</h4>

                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Question</th>
                        <th scope="col">Description</th>
                    </tr>
                    </thead>
                    <tbody>

                    @empty($peopleAlsoAskArr)
                        <th colspan="4">No Data</th>
                    @endempty

                    @if (!empty($peopleAlsoAskArr))
                        @php($j=0)
                        @for($i=0; $i < sizeof($peopleAlsoAskArr); $i++)
                            <tr>
                                <th scope="row">{{++$j}}</th>
                                <td>{{$peopleAlsoAskArr[$i]['questionTitle']}}</td>
                                <td>{{$peopleAlsoAskArr[$i]['question']}}</td>
                                <td>{{$peopleAlsoAskArr[$i]['questionAns']}}</td>
                            </tr>
                        @endfor
                    @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>




@endsection

@section('script')
    <script>
        $('#keyWordGenBtn').on('click', function(){

           let value = $("#keywordNameInput").val();
            //let value = "best book";


            let data = JSON.stringify({
                "q": value,
                "gl": "us",
                "hl": "en",
                "autocorrect": true
            });

            let config = {
                method: 'post',
                url: 'https://google.serper.dev/search',
                headers: {
                    'X-API-KEY': "",
                    'Content-Type': 'application/json'
                },
                data : data
            };

            axios(config)
            .then((response) => {
                console.log(JSON.parse(response.data));
            })
            .catch((error) => {
                console.log(error);
            });

        })





//         let data = JSON.stringify({
//             "q": "Bangladesh Football",
//             "gl": "us",
//             "hl": "en",
//             "autocorrect": true
//         });
//
//         let config = {
//             method: 'post',
//             url: 'https://google.serper.dev/search',
//             headers: {
//                 'X-API-KEY': '',
//                 'Content-Type': 'application/json'
//             },
//             data : data
//         };
// //46a56a7fac2aa0bba53b9fbf71284b65f919828d  my API
//         axios(config)
//             .then((response) => {
//                 console.log(JSON.stringify(response.data));
//             })
//             .catch((error) => {
//                 console.log(error);
//             });


    </script>
@endsection

















