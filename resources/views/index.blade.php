<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>建程科技股份有限公司 Chien Cheng Technology Co., LTD</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top" style="font-weight: bold; font-size: 72px;">建程科技</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" style="font-size: 24px;">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    @foreach($navigation as $nav)
                        @if ($nav->sub_nav)
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #fec503;">{{ $nav->title }} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach($nav->sub_navigation as $sub_nav)
                                        <li><a href="{{ $sub_nav->url }}">{{ $sub_nav->title }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li>
                                <a class="page-scroll" href="{{ $nav->url }}">{{ $nav->title }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading">提供交通管理的解決方案</div>
                <a href="#portfolio" class="page-scroll btn btn-xl" style="color:black; font-size: 24px;">瞭解更多</a>
            </div>
        </div>
    </header>
    
    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray" style="background: url(img/image9.jpg) no-repeat center center fixed; background-size: cover;" style="height:100px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="section-heading" style="font-size: 72px;">經營理念</h1>
                    <marquee style="font-size: 36px;" direction="right" height="50" scrollamount="5" behavior="alternate">打造好安全 好品質 好高效的交通環境</marquee>
                </div>
            </div>
    </section>

    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading" style="font-size: 72px;">產品與服務特色</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-6">
                    <img src="img/image6.jpg" alt="" class="img-circle img-responsive">
                    <h4 class="service-heading" style="font-size: 36px;">客製化提供交通產品 與服務。</h4>
                    <p class="text-muted"></p>
                </div>
                <div class="col-md-6">
                    <img src="img/image7.jpg" alt="" class="img-circle img-responsive">
                    <h4 class="service-heading" style="font-size: 36px;">活化與優化交通資訊</h4>
                    <p class="text-muted"></p>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section -->
    <section style="background-color: rgb(252,220,159);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading" style="font-size: 72px;">聯絡我們</h2>
                    <h3 class="section-subheading text-muted" style="font-size: 36px;">電話：03 555-0105</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3620.9882896107633!2d121.00104131560741!3d24.83007408406829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346836910b78b9c3%3A0x347823d4a9f9c721!2z5bu656iL56eR5oqA6IKh5Lu95pyJ6ZmQ5YWs5Y-4!5e0!3m2!1szh-TW!2stw!4v1464335274369" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; CCT 2016</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">聯絡我們</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

</body>

</html>