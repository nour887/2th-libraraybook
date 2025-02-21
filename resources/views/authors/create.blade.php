@section('layout.nav')
@section('layout.side')
@endsection
<head>
    <title> Create Author </title>
    @include('layout.nav')
</head>
<body>
    @include('layout.side')
    <br><br>
    <!-- العنوان -->
    <h1 class="mt-4 mb-4 text-center" > Create Author</h1>
    <!-- النموذج -->

    <form action="{{ route('authors.store') }}" method="POST" class="mx-auto mt-4" style="max-width: 500px;">
        @csrf
        <div class="mb-3">
            <label for="first_name" class="form-label label-color1">Author First Name:</label>
            <input type="text" class="form-control form-control-sm"  style="border: 2px solid #7e7d80;" 
                   id="first_name" placeholder="Enter Author First Name" name="first_name" >
          @error('first_name')
                   <p style="color:red">{{ $message }}</p>
           @enderror
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label label-color1">Author Last Name:</label>
            <input  type="text" class="form-control form-control-sm"  style="border: 2px solid  #7e7d80;" 
                      id="last_name" placeholder="Enter Author Last Name"  name="last_name" >
             @error('last_name')
                      <p style="color:red">{{ $message }}</p>
              @enderror
           </div>
         </div>
        <div class="mb-3">
            <label for="email" class="form-label label-color1">Author  Email:</label>
            <input  type="text" class="form-control form-control-sm"  style="border: 2px solid  #7e7d80;" 
                      id="email" placeholder="Enter Author Email" name="email" >
             @error('email')
                      <p style="color:red">{{ $message }}</p>
              @enderror
            </div>
        <div class="mb-3">
            <label for="phone" class="form-label label-color1">Author  Phone:</label>
            <input type="text" class="form-control form-control-sm"  style="border: 2px solid  #7e7d80;" 
                      id="phone" placeholder="Enter Author Phone" name="phone" >
             @error('phone')
                      <p style="color:red">{{ $message }}</p>
              @enderror
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
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-custom">
                Create Author
            </button>
        </div>
    </form>
    
    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

