<!DOCTYPE html>
<html lang="en">
{{--frontViewAssets--}}
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HOME</title>
    <link rel="stylesheet" href="{{asset('frontViewAssets')}}/css/bootstrap.css" />
    <link rel="stylesheet" href="{{asset('frontViewAssets')}}/css/style.css" />
</head>

<body>

    <nav class="navbar navbar-dark bg-dark  navbar-expand-md fixed-top">
        <a href="#" class="navbar-brand">
            <img style="height: 50px; width: 170px; border-radius: 50%;" src="{{asset('front/system/assets')}}/img/logo.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse ml-0" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0 text-white">
                <li class="nav-item px-3">
                    <a class="nav-link" href="/" role="button">Home</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link" href="#body" role="button">Pricing</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link" href="{{url('/user-login')}}" role="button">Login</a>
                </li>
                <li class="nav-item d-flex align-items-center px-3">
                    <a class="btn btn-primary" href="{{url('/user-login')}}" role="button">Sign Up</a>
                </li>
            </ul>
        </div>
    </nav>


    <section class="mainTopSection py-5" style="background-color: rgb(255, 255, 255);">
        <div class="row mt-5">
            <div class="col-12 text-center text-break">
                <h1 class="display-4 mb-0 font-weight-bold">
                    Web analytics Tools
                </h1>

                <h4 class="text-font-bload  my-4 ">
                    Track your visitors in realtime it is one of the Policy.
                </h4>

                <div class="pt-2 d-flex flex-column flex-sm-row justify-content-center">
                    <a href="login.html" class="btn btn-primary btn-lg font-size-lg align-items-center mt-3">Get
                        started</a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" style="background-image: url('assets/img/1.jpg'); height:900px; width:100%">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <img src="{{asset('frontViewAssets')}}/img/1.png" alt="" style="height: 700px ;width: 100%;">
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-3" style="background-color: #f5f5f5;">
        <div class="container">
            <div class="row py-3">
                <div class="col-sm-12">
                    <div class="m-auto text-center">
                        <h1>Analisys</h1>
                        <p class="text-muted font-weight-normal font-size-lg mb-0">
                            Get to know your visitors with our advancedanalytics.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row py-5">
                <div class="col-lg-6 col-md-6 col-sm-6 px-2">
                    <img src="{{asset('frontViewAssets')}}/img/n.png" alt="Live Request Handing Counter" height="300" width="550">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 py-2" style="background-color:#fffefe;">
                    <h3 class="text-center py-2">Live Request Handing</h3>
                    <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus
                        consequatur delectus autem laudantium accusamus dolorum beatae odit, est nam soluta aut magnam
                        praesentium labore voluptatum facilis ipsum ex cum debitis.</p>
                </div>
            </div>
            <div class="row py-5">
                <div class="col-lg-6 col-md-6 col-sm-6 py-2" style="background-color:#fffefe;">
                    <h3 class="text-center py-2">Live Statistics</h3>
                    <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus
                        consequatur delectus autem laudantium accusamus dolorum beatae odit, est nam soluta aut magnam
                        praesentium labore voluptatum facilis ipsum ex cum debitis.</p>
                    <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus
                        praesentium labore voluptatum facilis ipsum ex cum debitis.</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 px-5">
                    <img src="{{asset('frontViewAssets')}}/img/n1.png" alt="Statistics" height="500" width="400">
                </div>

            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="text-center py-2">Visitos Statistics</h3>
                    <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus
                        consequatur delectus autem laudantium accusamus dolorum beatae odit, est nam soluta aut magnam
                        praesentium labore voluptatum facilis ipsum ex cum debitis.</p>
                </div>
            </div>
            <div class="row py-3">
                <div class="col-sm-8">
                    <img class="text-center" src="{{asset('frontViewAssets')}}/img/n2.png" alt="Visitos Statistics" height="600" width="700">
                </div>
                <div class="col-sm-4">
                    <h3 class="text-center py-3">Country Base Visitos</h3>
                    <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus
                        consequatur delectus autem laudantium accusamus dolorum beatae odit, est nam soluta aut magnam
                        praesentium labore voluptatum facilis ipsum ex cum debitis.</p>

                    <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus
                        consequatur delectus autem laudantium accusamus dolorum beatae odit, est nam soluta aut magnam
                        praesentium labore voluptatum facilis ipsum ex cum debitis.</p>
                </div>
            </div>

            <div class="row py-5">
                <div class="col-sm-12 px-2">
                    <h3 class="text-center py-5">Page Loading Time</h3>
                    <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus
                        est nam soluta aut magnamaut magnam
                        praesentium labore.</p>

                    <img src="{{asset('frontViewAssets')}}/img/n3.png" alt="Live Request Handing Counter" height="300" width="950">
                </div>
            </div>

        </div>
    </section>



    <section class="py-5">
        <div class="container py-6">
            <div class="text-center">
                <h3 class="d-inline-block mb-0">Frequently asked questions</h3>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 mt-5 h-100">
                    <div class="h5 font-weight-medium">What payment methods do you accept?</div>
                    <div class="text-muted">We support the following payment methods: PayPal account, Credit card,
                        Cryptocurrency, Bank transfer.</div>
                </div>

                <div class="col-12 col-md-6 mt-5 h-100">
                    <div class="h5 font-weight-medium">Can I change plans?</div>
                    <div class="text-muted">Yes, you can change your plan at any time. Upon switching plans, your
                        current subscription will be cancelled immediately.</div>
                </div>

                <div class="col-12 col-md-6 mt-5 h-100">
                    <div class="h5 font-weight-medium">Can I cancel my subscription?</div>
                    <div class="text-muted">Yes, you can cancel your subscription at any time. You&#039;ll continue to
                        have access to the features you&#039;ve paid for until the end of your billing cycle.</div>
                </div>

                <div class="col-12 col-md-6 mt-5 h-100">
                    <div class="h5 font-weight-medium">What happens when my subscription expires?</div>
                    <div class="text-muted">Once your subscription expires, you&#039;ll lose access to all the
                        subscription features.</div>
                </div>
            </div>
        </div>
    </section>


    <section class="PricingClass" id="body">
        <div class="container">
            <div class="text-center py-5">
                <h2>Our Most Low Cost Pricing</h2>
                <h4>Simple, traffic-based pricing.</h4>
            </div>
            <div class="text-center py-1">
                <h4>Monthly</h4>
                <p>Simple, traffic-based pricing.</p>
            </div>
            <div class="row py-3">
                <div class="col-md-4 col-sm-6">
                    <div id="table">
                        <h3 class="title">Standard</h3>
                        <div class="price">
                            $10.00
                            <span class="month">/Month</span>
                        </div>
                        <ul id="content">
                            <li>50GB Disk Space</li>
                            <li>50GB Disk Space</li>
                            <li>50GB Disk </li>
                            <li>50GB </li>
                            <li>50GB Space</li>
                        </ul>
                        <a class="getstarted" href="login.html">Get Started</a>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div id="table">
                        <h3 class="title">Standard</h3>
                        <div class="price">
                            $10.00
                            <span class="month">/Month</span>
                        </div>
                        <ul id="content">
                            <li>50GB Disk Space</li>
                            <li>50GB Disk Space</li>
                            <li>50GB Disk </li>
                            <li>50GB </li>
                            <li>50GB Space</li>
                        </ul>
                        <a class="getstarted" href="login.html">Get Started</a>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div id="table">
                        <h3 class="title">Standard</h3>
                        <div class="price">
                            $10.00
                            <span class="month">/Month</span>
                        </div>
                        <ul id="content">
                            <li>50GB Disk Space</li>
                            <li>50GB Disk Space</li>
                            <li>50GB Disk </li>
                            <li>50GB </li>
                            <li>50GB Space</li>
                        </ul>
                        <a class="getstarted" href="login.html">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-5" id="body">
        <div class="container">
            <h3 class="text-center">Yearly</h3>
            <h4 class="text-center">Simple, traffic-based pricing.</h4>
            <div class="row py-5">
                <div class="col-md-4 col-sm-6">
                    <div id="table">
                        <h3 class="title">Standard</h3>
                        <div class="price">
                            $10.00
                            <span class="month">/Month</span>
                        </div>
                        <ul id="content">
                            <li>50GB Disk Space</li>
                            <li>50GB Disk Space</li>
                            <li>50GB Disk </li>
                            <li>50GB </li>
                            <li>50GB Space</li>
                        </ul>
                        <a class="getstarted" href="login.html">Get Started</a>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div id="table">
                        <h3 class="title">Standard</h3>
                        <div class="price">
                            $10.00
                            <span class="month">/Month</span>
                        </div>
                        <ul id="content">
                            <li>50GB Disk Space</li>
                            <li>50GB Disk Space</li>
                            <li>50GB Disk </li>
                            <li>50GB </li>
                            <li>50GB Space</li>
                        </ul>
                        <a class="getstarted" href="login.html">Get Started</a>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div id="table">
                        <h3 class="title">Standard</h3>
                        <div class="price">
                            $10.00
                            <span class="month">/Month</span>
                        </div>
                        <ul id="content">
                            <li>50GB Disk Space</li>
                            <li>50GB Disk Space</li>
                            <li>50GB Disk </li>
                            <li>50GB </li>
                            <li>50GB Space</li>
                        </ul>
                        <a class="getstarted" href="{{url('/user-login')}}">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="bg-base-0">
            <div class="container py-6">
                <div class="text-center">
                    <h3 class="d-inline-block mb-0">Privecy and Policy</h3>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6 mt-5 h-100">
                        <div class="h5 font-weight-medium">What payment methods do you accept?</div>
                        <div class="text-muted">We support the following payment methods: PayPal account, Credit card,
                            Cryptocurrency, Bank transfer.</div>
                    </div>

                    <div class="col-12 col-md-6 mt-5 h-100">
                        <div class="h5 font-weight-medium">Can I change plans?</div>
                        <div class="text-muted">Yes, you can change your plan at any time. Upon switching plans, your
                            current subscription will be cancelled immediately.</div>
                    </div>

                    <div class="col-12 col-md-6 mt-5 h-100">
                        <div class="h5 font-weight-medium">Can I cancel my subscription?</div>
                        <div class="text-muted">Yes, you can cancel your subscription at any time. You&#039;ll continue
                            to have access to the features you&#039;ve paid for until the end of your billing cycle.
                        </div>
                    </div>

                    <div class="col-12 col-md-6 mt-5 h-100">
                        <div class="h5 font-weight-medium">What happens when my subscription expires?</div>
                        <div class="text-muted">Once your subscription expires, you&#039;ll lose access to all the
                            subscription features.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-dark text-white py-5">
        <!--Footer Section Start-->

        <footer >

            <div class="bg-dark" >
                <div class="container">
                    <div class="row py-2">
                        <div class="col-md-4">
                            <h4 class="">Extra Service</h4>
                            <ul><a href="#" class=" ">
                                    <p>Online Service</p>
                                </a></ul>
                            <ul><a href="#" class=" ">
                                    <p >Suport Tutorial</p>
                                </a></ul>
                            <ul><a href="#" class=" ">
                                    <p >Online Payment</p>
                                </a></ul>
                            <ul><a href="#" class=" ">
                                    <p>Online Payment</p>
                                </a></ul>

                        </div>

                        <div class="col-md-4">
                            <h4 class="">priveciy & Policy</h4>
                            <ul><a href="#" class=" ">
                                    <p>Terms & Condition</p>
                                </a></ul>
                            <ul><a href="#" class=" ">
                                    <p >User Feadbace</p>
                                </a></ul>
                            <ul><a href="#" class=" ">
                                    <p >Rilayable</p>
                                </a></ul>
                            <ul><a href="#" class=" ">
                                    <p>Very much Athuntic</p>
                                </a></ul>

                        </div>
                        <div class="col-md-4">
                            <h4 class="">Extra Activity</h4>
                            <ul><a href="#" class=" ">
                                    <p>Helps</p>
                                </a></ul>
                            <ul><a href="#" class=" ">
                                    <p>Colaboretion country</p>
                                </a></ul>
                            <ul><a href="#" class="">
                                    <p>Sign Up</p>
                                </a></ul>
                            <ul><a href="#" class="">
                                    <p>Login</p>
                                </a></ul>

                        </div>

                    </div>
                </div>
            </div>


        </footer>
    </section>


    <script src="{{asset('frontViewAssets')}}/js/jquery-3.6.0.min.js"></script>
    <script src="{{asset('frontViewAssets')}}/js/bootstrap.bundle.js"></script>
    <script src="{{asset('frontViewAssets')}}/js/bootstrap.js"></script>

</body>

</html>
