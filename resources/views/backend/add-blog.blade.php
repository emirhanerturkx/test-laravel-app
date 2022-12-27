<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>StartUI - Premium Bootstrap 4 Admin Dashboard Template</title>

    <link href="img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="img/favicon.png" rel="icon" type="image/png">
    <link href="img/favicon.ico" rel="shortcut icon">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
 <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->
    <link rel="stylesheet" href="{{ asset('/css/separate/vendor/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/lib/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/separate/vendor/bootstrap-touchspin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/lib/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/lib/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
</head>

<body class="with-side-menu">

    <header class="site-header">
        <div class="container-fluid">
            <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
                <span>toggle menu</span>
            </button>

            <button class="hamburger hamburger--htla">
                <span>toggle menu</span>
            </button>
            <div class="site-header-content">
                <div class="site-header-content-in">
                    <div class="site-header-shown">
                        <div class="dropdown user-menu">
                            <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="img/avatar-2-64.png" alt="">
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                                <a class="dropdown-item" href="logout.php"><span
                                        class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
                            </div>
                        </div>

                        <button type="button" class="burger-right">
                            <i class="font-icon-menu-addl"></i>
                        </button>
                    </div>
                    <!--.site-header-shown-->

                    <div class="mobile-menu-right-overlay"></div>
                </div>
                <!--site-header-content-in-->
            </div>
            <!--.site-header-content-->
        </div>
        <!--.container-fluid-->
    </header>
    <!--.site-header-->
    <div class="mobile-menu-left-overlay"></div>
    <nav class="side-menu">
        <ul class="side-menu-list">
            <li class="grey">
                <a href="/admin">
                    <span class="lbl">Anasayfa</span>
                </a>
            </li>
            <li class="grey">
                <a href="/blog">
                    <span class="lbl">Blog Ekle/Sil</span>
                </a>
            </li>
        </ul>

    </nav>

    <div class="page-content">
        <div class="container-fluid">
            @if (session('status') == 'success')
                <div class="alert alert-success">
                    Post Paylaşılmıştır!
                </div>
            @elseif(session('status') == 'error')
                <div class="alert alert-danger">
                    Hata!
                </div>
            @endif

            <div class="box-typical box-typical-padding">
                <form action="{{ route('add-post') }}" method="post" enctype="multipart/form-data"
                    class="row col-md-12">
                    @csrf
                    <div class="col-lg-6">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="exampleInput">Post Başlığı</label>
                            <input type="text" name="title" class="form-control" id="exampleInput"
                                placeholder="Ex. Lorem Ipsum">
                            <small class="text-muted">Site üzerinde görülecek post ismi.</small>
                        </fieldset>
                    </div>
                    <div class="col-lg-6">

                        <fieldset class="form-group">
                            <label class="form-label semibold" for="exampleInput">Post Görseli</label>
                            <input type="file" name="image" class="form-control" id="exampleInput">
                            <small class="text-muted">Site üzerinde görülecek post görseli.</small>
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="exampleInput">Post İçeriği</label>
                            <textarea name="details" class="form-control" id="" cols="30" rows="10"></textarea>
                            <small class="text-muted">Site üzerinde okunacak post içeriği.</small>
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <button class="btn btn-primary" type="submit">Paylaş</button>
                    </div>
                </form>

            </div>

            <div class="row">
                <div class="col-md-12">
                    @if (session('delete') == 'success')
                        <div class="alert alert-success">
                            Post Silinmiştir!
                        </div>
                    @elseif(session('delete') == 'error')
                        <div class="alert alert-danger">
                            Hata!
                        </div>
                    @endif
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Post Başlığı</td>
                                <td>Post Görseli</td>
                                <td>Post İçeriği</td>
                                <td>İşlemler</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $item)
                                <tr>
                                    <td></td>
                                    <td>{{ $item->title }}</td>
                                    <td><img src="{{ asset('/img/') }}/{{ $item->image }}" width="90"
                                            alt="{{ $item->title }}"></td>
                                    <td class="text-truncate">{{ $item->details }}</td>
                                    <td><a href="/admin/post/{{ $item->id }}/delete" class="btn btn-danger"
                                            onclick="return confirm('Emin misin?')">Sil</a></td>
                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>
            <!--.box-typical-->
        </div>
        <!--.container-fluid-->
    </div>
    <!--.page-content-->

    <script src="{{ asset('/js/lib/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('/js/lib/popper/popper.min.js') }}"></script>
    <script src="{{ asset('/js/lib/tether/tether.min.js') }}"></script>
    <script src="{{ asset('/js/lib/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/plugins.js') }}"></script>

    <script src="{{ asset('/js/lib/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('/js/lib/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("input[name='demo1']").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%'
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[name='demo2']").TouchSpin({
                min: -1000000000,
                max: 1000000000,
                stepinterval: 50,
                maxboostedstep: 10000000,
                prefix: '$'
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[name='demo_vertical']").TouchSpin({
                verticalbuttons: true
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[name='demo_vertical2']").TouchSpin({
                verticalbuttons: true,
                verticalupclass: 'glyphicon glyphicon-plus',
                verticaldownclass: 'glyphicon glyphicon-minus'
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[name='demo3']").TouchSpin();
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[name='demo4']").TouchSpin({
                postfix: "a button",
                postfix_extraclass: "btn btn-default"
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[name='demo4_2']").TouchSpin({
                postfix: "a button",
                postfix_extraclass: "btn btn-default"
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[name='demo6']").TouchSpin({
                buttondown_class: "btn btn-default-outline",
                buttonup_class: "btn btn-default-outline"
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[name='demo5']").TouchSpin({
                prefix: "pre",
                postfix: "post"
            });
        });
    </script>

</body>

</html>
