@extends('Layout.app')

@section('title','Dashboard')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <div class="card text-white" style="width: 18rem;">
                    <div class="card-body bg-info">
                        <span><h3 class="card-title font-weight-bold">Total Visitor  <i class="fas fa-users pl-5"></i></h3></span>
                        <h5 class="pl-3 d-inline"><i class="fas fa-chart-bar"></i> {{$totalVisitorPercent}}%</h5>
                        <h5 class="float-right pr-3">{{$totalVisitor}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white" style="width: 18rem;">
                    <div class="card-body bg-success">
                        <span><h3 class="card-title font-weight-bold">Real Visitor   <i class="fas fa-user-check pl-5"></i></h3></span>
                        @if($realVisitorPercent > $FakeVisitorPercent)
                            <h5 class="pl-3 d-inline"><i class="fas fa-chart-bar"></i> <i class="fas fa-arrow-circle-up "></i>  {{$realVisitorPercent}}%</h5>
                        @elseif($realVisitorPercent == $FakeVisitorPercent)
                            <h5 class="pl-3 d-inline"><i class="fas fa-chart-bar"></i> <i class="fas fa-arrows-alt-h"></i>  {{$realVisitorPercent}}%</h5>
                        @else
                            <h5 class="pl-3 d-inline"><i class="fas fa-chart-bar"></i> <i class="fas fa-arrow-circle-down "></i>  {{$realVisitorPercent}}%</h5>
                        @endif
                        <h5 class="float-right pr-3">{{$realVisitor}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white" style="width: 18rem;">
                    <div class="card-body bg-danger">
                        <span><h3 class="card-title font-weight-bold">Fake Visitor  <i class="fas fa-users-slash pl-5"></i></h3></span>
                        @if($realVisitorPercent < $FakeVisitorPercent)
                            <h5 class="pl-3 d-inline"><i class="fas fa-chart-bar"></i> <i class="fas fa-arrow-circle-up "></i>  {{$FakeVisitorPercent}}%</h5>
                        @elseif($realVisitorPercent == $FakeVisitorPercent)
                            <h5 class="pl-3 d-inline"><i class="fas fa-chart-bar"></i> <i class="fas fa-arrows-alt-h"></i>  {{$FakeVisitorPercent}}%</h5>
                        @else
                            <h5 class="pl-3 d-inline"><i class="fas fa-chart-bar"></i> <i class="fas fa-arrow-circle-down "></i>  {{$FakeVisitorPercent}}%</h5>
                        @endif
                        <h5 class="float-right pr-3">{{$totalFakeVisitor}}</h5>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-9 page-header">
                <div class="page-pretitle">Overview</div>
                <h2 class="page-title">Dashboard</h2>
                <p id="uniqueUserID">User ID: {{ session()->get('userid') }}</p>
                <p id="uniqueUserIDforCode" class="d-none">{{ session()->get('userid') }}</p>
            </div>
            <div class="col-md-3 pt-5">
                <button class="btn btn-info btn-block" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Site</button>
            </div>
        </div>
        <hr>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div id="siteUrlListTable" class="card d-none">
                    <div class="card-header">My Site's</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Domain Name</th>
                                    <th>Domain URL</th>
                                    <th>Visitors</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>

                                <tbody id="siteUrlListTableDB">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- This Modal For Update-->
    <div class="modal fade" id="updateDataModal" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Edit Site</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <p id="modalEditDataID"></p>
                <div class="modal-body">
                    <div>
                        <input id="userIDForUpdateSite" class="d-none" type="text" value="{{ session()->get('userid') }}">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Domain URL<span class="text-danger font-16">*</span></label>
                                    <input id="domainURLForUpdateSite" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Domain Name<span class="text-danger font-16">*</span></label>
                                    <input id="domainNameForUpdateSite" type="text" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <p>Notifications</p>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" for="inlineCheckbox1">Email</label>
                                    <input class="form-control" type="text" id="userEmailForUpdateSite" value="{{session()->get('userMail')}}">
                                    <p>Periodic email reports</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <button id="CodeCopyBtn" onclick="myFunction()" class="btn btn-sm btn-info">Copy</button>
                                    <label>Include this code in the <spam class="text-danger" ><span><</span>head></spam> or <span  class="text-danger"> <span><</span>body></span> section of your website.</label>
                                    <textarea readonly type="text" class="form-control" name="" id="contentCodeForUpdateSite" cols="30" rows="5">Code Not Create</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="updateNewSiteBtn" type="button" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>


    <!-- This Modal For Add New-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Site</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <input id="userIDForAddSite" class="d-none" type="text" value="{{ session()->get('userid') }}">

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Domain URL<span class="text-danger font-16">*</span></label>
                                    <input id="domainURLForAddSite" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Domain Name<span class="text-danger font-16">*</span></label>
                                    <input id="domainNameForAddSite" type="text" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <hr>


                        <p>Notifications</p>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input ml-1" type="checkbox" id="userEmailForAddSite" value="{{session()->get('userMail')}}">
                                    <label class="form-check-label" for="inlineCheckbox1">Email</label>
                                    <p>Periodic email reports</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <button id="CodeCopyBtn" onclick="myFunction()" class="btn btn-sm btn-info">Copy</button>
                                    <label>Include this code in the <spam class="text-danger" ><span><</span>head></spam> or <span  class="text-danger"> <span><</span>body></span> section of your website.</label>
                                    <textarea readonly type="text" class="form-control" name="" id="contentCodeForAddSite" cols="30" rows="5">Code Not Create</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="addNewSiteBtn" type="button" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Data Delete Modal Div -->
    <!-- Central Modal Small -->
    <div class="modal fade" id="deleteSiteDataModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <!-- Change class .modal-sm to change the size of the modal -->
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center p-3 mt-2" >Do you want to delete  ?</h4>
                    <h4 id="modalSiteDeleteDataID" class="text-center d-none" ></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button id="siteDataDeleteConfirmBtn" type="button" class="btn btn-danger">Yes</button>
                </div>

            </div>
        </div>
    </div>
    <!-- Central Delete Modal Small -->


    <!-- Wrong Div -->
    <div id="editWrongDiv" class="container d-none">
        <div class="row">
            <div class="col-md-12 text-center p-5">
                <h1>Somthing went wrong............</h1>
            </div>
        </div>
    </div>






@endsection

@section('script')
    <script type="text/javascript">
        function myFunction() {
            // Get the text field
            var copyText = document.getElementById("contentCodeForAddSite");
            // Select the text field
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices
            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.value);
            // Alert the copied text
            //alert("Copied the text: " + copyText.value);

        }


        $('#domainURLForAddSite').on('change',function (){
            const url = $('#domainURLForAddSite').val();
            let domain = new URL(url);
            domain = domain.hostname.replace('www.','');
            $('#domainNameForAddSite').val(domain);

            var value = $('#uniqueUserIDforCode').html();
            // let axiosCDN = "<script src='https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js' "+" ></"+"script>"+" ";
            // let MyCore = "<script id='myusersiteid' data-host='https://analysis.hinirob.com' usersite='"+domain+"' data-dnt='false' src='https://analysis.hinirob.com/js/vascript.min.js' data-id='"+value+"' async defer></"+"script>";

            let axiosCDN = "<script src='https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js' "+" ></"+"script>"+" ";
            let MyCore = "<script id='myusersiteid' data-host='http://127.0.0.1:8000' usersite='"+domain+"' data-dnt='false' src='http://127.0.0.1:8000/js/vascript.min.js' data-id='"+value+"' async defer></"+"script>";

            let codeMy = axiosCDN + MyCore;

            let codeRId = document.getElementById('contentCodeForAddSite');
            codeRId.innerHTML = codeMy;



    })

        // Call For Data Select
        getAllUserSiteList();

        function getAllUserSiteList() {
            axios.get('/getUserSiteList').then( function(res){
                if (res.status == 200) {
                    $('#siteUrlListTable').removeClass('d-none');
                    $('#siteUrlListTableDB').empty();
                    var jsonData = res.data;
                    console.log(jsonData)
                    $.each(jsonData, function(i){
                        $('<tr>').html("<th scope='row'>"+(i+1)+"</th>"+
                            "<td> <a href='/trackingBySite/"+jsonData[i].id +"'> "+jsonData[i].domain_name+"</a></td>"+
                            "<td> <a href='/trackingBySite/"+jsonData[i].id +"'> "+jsonData[i].root_site_url+"</a></td>"+
                            "<td>"+10+"</td>"+
                            "<td class='th-sm'><a class='siteEditBtn' data-id="+jsonData[i].id +"><i class='fas fa-edit'></i></a></td>"+
                            "<td class='th-sm'><a class='siteDeleteBtn' data-id="+jsonData[i].id +"><i class='fas fa-trash-alt'></i></a></td>"
                        ).appendTo('#siteUrlListTableDB');
                    });
                    // Project Edit
                    $('.siteEditBtn').on('click',function(){
                        let id = $(this).data('id');
                        getUserSiteByID(id);
                        $('#modalEditDataID').html(id);
                        $('#updateDataModal').modal('show');
                    })
                    // Project Delete
                    $('.siteDeleteBtn').on('click',function(){
                        let id = $(this).data('id');
                        $('#modalSiteDeleteDataID').html(id);
                        $('#deleteSiteDataModal').modal('show');
                    })


                } else {
                    $('#loadingDiv').addClass('d-none');
                    $('#editWrongDiv').removeClass('d-none');
                }

            }).catch(function (error){
                $('#loadingDiv').addClass('d-none');
                $('#editWrongDiv').removeClass('d-none');
            })

        }


        // Data Delete Function
        $('#siteDataDeleteConfirmBtn').on('click',function(){
            $('#deleteSiteDataModal').modal('hide');
            let id = $('#modalSiteDeleteDataID').html();
            userSiteDelete(id);
        })
        function userSiteDelete(deleteID) {
            $('#siteDataDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div> Deleting...");

            axios.post('/userSiteDelete', {id:deleteID})
                .then((res)=>{
                    if (res.status==200 && res.data == 1) {
                        getAllUserSiteList();
                        $('#siteDataDeleteConfirmBtn').html("Yes");
                        toastr.success('Delete Success..');
                    } else {
                        $('#siteDataDeleteConfirmBtn').html("Yes");
                        toastr.error('Delete Fail..');
                    }

                }).catch((err) => {
                $('#siteDataDeleteConfirmBtn').html("Yes");
                toastr.error('Somthing went wrong..');
            })


        }


        // Site Update Button
        $('#updateNewSiteBtn').on('click',function () {
            let suerSiteId = $('#modalEditDataID').html();
            let domainURL = $('#domainURLForUpdateSite').val();
            let domainName = $('#domainNameForUpdateSite').val();
            let userEmail = $('#userEmailForUpdateSite').val();
            let code = $('#contentCodeForUpdateSite').val();

            updateUserSite(suerSiteId, domainName, domainURL, userEmail, code);
            $('#updateDataModal').modal('hide');
        })
        // Update user Data
        function updateUserSite(suerSiteId, domainName, domainURL, userEmail, code) {
            $('#updateNewSiteBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div> Loading...");
            let url = "/updateNewUserSite";
            axios.post(url, {suerSiteId:suerSiteId, domainName:domainName,  domainURL:domainURL, userEmail:userEmail, code:code} ).then((res)=>{
                if (res.status==200 && res.data == 1) {
                    $('#updateNewSiteBtn').html("Site Update Successful");

                    $('#domainURLForUpdateSite').val('');
                    $('#domainNameForUpdateSite').val('');
                    $('#userEmailForUpdateSite').val('');
                    $('#contentCodeForUpdateSite').val('');
                    getAllUserSiteList()
                    setTimeout(function () {
                        $('#updateNewSiteBtn').html("Update");
                    },3000);
                } else {
                    $('#updateNewSiteBtn').html("Site Update Fail");
                    $('#domainURLForUpdateSite').val('');
                    $('#domainNameForUpdateSite').val('');
                    $('#userEmailForUpdateSite').val('');
                    $('#contentCodeForUpdateSite').val('');
                    setTimeout(function () {
                        $('#addNewSiteBtn').html("Add");
                    },3000);
                }
            }).catch( (err)=>{
                $('#updateNewSiteBtn').html("Something Wrong, Try Again");
                $('#domainURLForUpdateSite').val('');
                $('#domainNameForUpdateSite').val('');
                $('#userEmailForUpdateSite').val('');
                $('#contentCodeForUpdateSite').val('');
                setTimeout(function () {
                    $('#updateNewSiteBtn').html("Update");
                },3000);
            })
        }




        // User Site List Select By ID
        function getUserSiteByID(userSiteID){
            axios.post('/userSiteSelectByID',{id:userSiteID})
                .then((res)=>{
                    if (res.status == 200) {
                        var jsonData = res.data;
                        $('#domainURLForUpdateSite').val(jsonData[0].root_site_url);
                        $('#domainNameForUpdateSite').val(jsonData[0].domain_name);
                        $('#userEmailForUpdateSite').val(jsonData[0].notify_mail);
                        $('#contentCodeForUpdateSite').val(jsonData[0].tract_code);

                    } else {

                    }

                }).catch((err) => {

            })

        }


        // Add New Site Btn
        $('#addNewSiteBtn').on('click',function () {
            let suerId = $('#userIDForAddSite').val();
            let domainURL = $('#domainURLForAddSite').val();
            let domainName = $('#domainNameForAddSite').val();
            let userEmail = $('#userEmailForAddSite').val();
            let code = $('#contentCodeForAddSite').val();

            //alert(suerId+" "+domainName+" "+domainURL+" "+userEmail+" "+code)
            addNewSite(suerId, domainName, domainURL, userEmail, code);
            //sitePageUrlAndLoadingTime(suerId, domainName, domainURL);
            $('#exampleModal').modal('hide');
        })

        // Add New Site Function
        function addNewSite(suerId, domainName, domainURL, userEmail, code) {
            $('#addNewSiteBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div> Loading...");
            let url = "/addNewUserSite";
            axios.post(url, {suerId:suerId, domainName:domainName,  domainURL:domainURL, userEmail:userEmail, code:code} ).then((res)=>{
                if (res.status==200 && res.data == 1) {
                    $('#addNewSiteBtn').html("Site Create Successful");

                    $('#domainURLForAddSite').val('');
                    $('#domainNameForAddSite').val('');
                    $('#userEmailForAddSite').val('');
                    $('#contentCodeForAddSite').val('');
                    getAllUserSiteList()
                    setTimeout(function () {
                        $('#addNewSiteBtn').html("Add");
                    },3000);
                } else {
                    $('#addNewSiteBtn').html("Site Create Fail");

                    $('#domainURLForAddSite').val('');
                    $('#domainNameForAddSite').val('');
                    $('#userEmailForAddSite').val('');
                    $('#contentCodeForAddSite').val('');
                    setTimeout(function () {
                        $('#addNewSiteBtn').html("Add");
                    },3000);
                }
            }).catch( (err)=>{
                $('#addNewSiteBtn').html("Something Wrong, Try Again");

                $('#domainURLForAddSite').val('');
                $('#domainNameForAddSite').val('');
                $('#userEmailForAddSite').val('');
                $('#contentCodeForAddSite').val('');
                setTimeout(function () {
                    $('#addNewSiteBtn').html("Add");
                },3000);
            })
        }


        function sitePageUrlAndLoadingTime(suerId, domainName, domainURL){
            let url = "/sitePageUrlAndLoadingTime";
            axios.post(url, {suerId:suerId, domainName:domainName,  domainURL:domainURL}).then((res)=>{
                if (res.status==200) {
                    console.log("ok");
                }else {
                    console.log("Fail");
                }
            }).catch( (err)=>{
                console.log("Wrong")
            })
        }




    </script>
@endsection

