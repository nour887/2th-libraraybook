@include('layout.style')
<title></title>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<link href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Home</title>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
    </button>
    <div class="collapse navbar-collapse" >
        <ul class="mr-auto navbar-nav">
            <li >
                <a class="nav-link" href="http://127.0.0.1:8000/#">Home</a>
            </li>
            <li >
                <a class="nav-link" href="{{route('books.index')}}">Books</a>
            </li>
            <li >
                <a class="nav-link" href="{{route('authors.index')}}">Authors</a>
            </li>
            <li >
                <a class="nav-link" href="{{route('students.index')}}">Students</a>
            </li>
          
            <li >
                <a class="nav-link" href="#">Sign In</a>
            </li>
        </ul>

        <!-- العناصر التي تريد تحريكها إلى اليمين -->
        <div class="d-flex align-items-center">
            <img src="/images/logo.png" alt="Logo" style="height: 40px; margin-right: 10px;">
            <form class="my-2 form-inline my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>