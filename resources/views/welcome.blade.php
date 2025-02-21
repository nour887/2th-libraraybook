@section('layout.nav')
@section('layout.side')

@endsection
<!DOCTYPE html>
<html lang="ar">
<head>
    <title> Home Bage</title>
    @include('layout.nav') 

    </head>

<body>
    @include('layout.content')
    @include( 'layout.side') 
</body>
</html>
