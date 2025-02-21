@include('layout.nav')
@include('layout.side')

<div class="container">
<head>
    <title>Update Author</title>
    <link href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <br><br><br>
    <!-- العنوان -->
    <h1 class="mt-4 mb-4 text-center" > Update Author</h1>

    <!-- النموذج -->
        <form action="{{ route('authors.execute', $author->id) }}" method="POST" class="mx-auto mt-4" style="max-width: 500px;">
        @csrf
        <input type="hidden" name="id" value="{{ $author->id }}">

        <!-- Input 1: -->
        <div class="mb-3">
            <label for="first_name" class="form-label label-color1">Author First Name:</label>
            <input type="text" class="form-control form-control-sm" style="border: 2px solid #7e7d80;" 
            id="first_name" placeholder="Enter Author First Name" name="first_name" 
            value="{{ old('first_name', $author->first_name) }}">      
              @error('first_name')
            <p style="color:red">{{ $message }}</p>
         @enderror
        </div>
        <!-- Input 2:  -->
        <div class="mb-3">
            <label for="last_name" class="form-label label-color2">Author Last Name:</label>
            <input  type="text" class="form-control form-control-sm"  style="border: 2px solid #7e7d80;" 
             id="last_name" placeholder="Enter Author Last Name"  name="last_name" 
             value="{{ old('last_name', $author->last_name) }}">      
             @error('last_name')
             <p style="color:red">{{ $message }}</p>
     @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label label-color2">Author Email:</label>
            <input  type="text" class="form-control form-control-sm"  style="border: 2px solid #7e7d80;" 
             id="email" placeholder="Enter Author Email"  name="email"
             value="{{ old('email', $author->email) }}">      
             @error('email')
             <p style="color:red">{{ $message }}</p>
     @enderror      
          </div>
        <div class="mb-3">
            <label for="phone" class="form-label label-color2">Author Phone:</label>
            <input  type="text" class="form-control form-control-sm"  style="border: 2px solid #7e7d80;" 
             id="phone" placeholder="Enter Author Phone"  name="phone" 
             value="{{ old('phone', $author->phone) }}">      
         @error('phone')
             <p style="color:red">{{ $message }}</p>
     @enderror   
            </div>
            <div class="mb-3">
                <label for="book_id" class="form-label">Book:</label>
                <select name="book_id" class="form-select">
                    @foreach($books as $book)
                        <option value="{{ $book->id }}" {{ $author->book_id == $book->id ? 'selected' : '' }}>
                            {{ $book->name }}
                        </option>
                    @endforeach
                </select>
                @error('book_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
         </div>
        <!-- Submit Button -->
        <div class="text-center">
                <button type="submit" class="btn btn-lg btn-custom">
               Update Author
            </button>

        </div>
    </form>
    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</div>