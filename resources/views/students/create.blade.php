@section('layout.nav')
@section('layout.side')
@endsection
<head>
    <title> Create Student </title>
    @include('layout.nav')
</head>
<body>
    @include('layout.side')
    <br><br>
    <!-- العنوان -->
    <h1 class="mt-4 mb-4 text-center" > Create Student</h1>
    <!-- النموذج -->
    <form action="{{ route( 'students.store') }}"  method="post" class="mx-auto mt-4" style="max-width: 500px;">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label label-color1">Student Name:</label>
            <input type="text" class="form-control form-control-sm"  style="border: 2px solid #7e7d80;" 
                   id="name" placeholder="Enter Student Name" name="name" >
        </div>
        <div class="mb-3">
            <label for="email" class="form-label label-color1">Student Email:</label>
            <input  type="text" class="form-control form-control-sm"  style="border: 2px solid  #7e7d80;" 
                      id="email" placeholder="Enter Student Email" name="email" >
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label label-color1">Student Phone:</label>
            <input type="text" class="form-control form-control-sm"  style="border: 2px solid  #7e7d80;" 
                      id="phone" placeholder="Enter Student Phone" name="phone" >
        </div>
        <div>
            <label for="book_id" class="form-label">Select Your Book:</label>
            <select name="book_id" class="form-select" id="book_id">
                @if($books->isEmpty())
                    <option value="">No books available</option>
                @else
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : 'No Book' }}>{{ $book->name }}</option>
                    @endforeach
                @endif
            </select>
            @error('book_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div>
            <label for="author_id" class="form-label">Select Your Author:</label>
            <select name="author_id" class="form-select" id="author_id">
                @if($authors->isEmpty())
                    <option value="">No Authors available</option>
                @else
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : 'No Author' }}>{{ $author->first_name }}</option>
                    @endforeach
                @endif
            </select>
            @error('author_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-custom">
                Create Student
            </button>
        </div>
    </form>
    
    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

