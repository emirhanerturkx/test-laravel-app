<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Blog App</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <script src="https://kit.fontawesome.com/243a102842.js" crossorigin="anonymous"></script>
</head>

<body>


    <aside class="sidebar">
        <ul>
            <li><a href="/"><i class="fa-solid fa-magnifying-glass"></i>Explore</a></li>
            <li><a href="/"><i class="fa-solid fa-grip"></i>Feed</a></li>
            <li><a href="/"><i class="fa-regular fa-bookmark"></i>Bookmarks</a></li>
        </ul>
        <span class="sidebar-divider">Portfolio</span>
        <ul>
            <li><a href="/"><i class="fa-solid fa-pencil"></i>Stories</a></li>
            <li><a href="/"><i class="fa-solid fa-stairs"></i>Statistics</a></li>
            <li><a href="/"><i class="fa-regular fa-bell"></i>Notifications</a></li>
        </ul>

        <footer>
            <span>&copy; {{ date('Y') }} Emirhan Ertürk</span>
        </footer>
    </aside>

    <div class="content">
        <div class="user-details">
            <div class="user-img">
                <img src="https://dz9yg0snnohlc.cloudfront.net/18-examples-of-female-body-language-04.jpg"
                    alt="Women Photo">
            </div>
            <div class="user-info">
                <span class="writer">Writer @ Youth Club Magazine <i class="fa-regular fa-circle-check"
                        title="Verified"></i></span>
                <span class="writer-name">Leslie Alexander</span>
                <div class="counter-area">
                    <span>3 publications</span>
                    <span>27 followers</span>
                    <span>Following 53</span>
                </div>
            </div>

        </div>

        <div class="post-area">
            <div class="banner">
                <img src="https://via.placeholder.com/1920x1080" alt="">
                <h1>One Photographer's Incredibly Untimate Portrait Of Her Sister</h1>
            </div>

            <div class="posts">
                @foreach ($data as $item)
                    <div class="item">
                        <img src="{{ asset('/img/') }}/{{ $item->image }}" alt="{{ $item->title }}">
                        <div class="item-details">
                            <span class="title">{{$item->title}}</span>
                            <div class="writer-details">
                                <span class="writer">Youth Club Magazine</span>
                                <span class="date">12 hours ago</span>
                            </div>
                            <span class="category">Life & Culture</span>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>


</body>

</html>
