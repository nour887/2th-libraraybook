@section('layout.nav')
@section('layout.side')

@endsection
<head>
    <title> Create Book </title>
    @include('layout.nav')
</head>
<body>
    @include('layout.side')

    <br><br>
    <!-- العنوان -->
    <h1 class="mt-4 mb-4 text-center" > Create Book</h1>
    <!-- النموذج -->
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="mx-auto mt-4" style="max-width: 500px;">
            @csrf
        <div class="mb-3">
            <label for="name" class="form-label label-color1">Book Name:</label>
            <input type="text" class="form-control form-control-sm" 
            style="border: 2px solid #7e7d80;" id="name" placeholder="Enter book name" name="name" value="{{ old('name') }}">
                   @error('name')
                           <p style="color:red">{{ $message }}</p>
                   @enderror
                </div>
        <div class="mb-3">
            <label for="description" class="form-label label-color1"> Book Description:</label>
            <textarea class="form-control form-control-sm" 
                      style="border: 2px solid  #7e7d80;" 
                      id="description" placeholder="Enter book description" 
                      name="description"  value="{{ old('description') }}" rows="3"></textarea>
                      @error('description')
                      <p style="color:red">{{ $message }}</p>
                  @enderror
             </div>
        <!-- Input 3: Price -->
        <div class="mb-3">
            <label for="price" class="form-label label-color3">Price:</label>
            <input type="number" class="form-control form-control-sm" 
                   style="border: 2px solid  #7e7d80;" 
                   id="price" placeholder="Enter price" name="price" value="{{ old('price') }}">
                   @error('price')
                   <p style="color: red">{{ $message }}</p>
               @enderror
         </div>
         <div class="mb-3">
            <label for="image" class="form-label label-color1">Book Image:</label>
            <input type="file" class="form-control form-control-sm" style="border: 2px solid #7e7d80;"
             id="image" name="image"  value="{{ old('image') }}" accept="image/*">
            @error('image')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="author_id" class="form-label">Select Your Author:</label>
            <select name="author_id" class="form-select" id="author_id">
                @if($authors->isEmpty())
                    <option value="">No Authors available</option>
                @else
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>{{ $author->first_name }}</option>
                    @endforeach
                @endif
            </select>
            @error('author_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>
        <div>
            <label for="student_id" class="form-label">Select Student:</label>
            <select name="student_id" class="form-select" id="student_id">
                @if($students->isEmpty())
                    <option value="">No Authors available</option>
                @else
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>{{ $student->name }}</option>
                    @endforeach
                @endif
            </select>
            @error('student_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <br><br>
        <!-- Submit Button -->
        <div class="text-center">
          <button type="submit" class="btn btn-lg btn-custom">
              Create Book
          </button>
          <a href="/books/index/" class="btn btn-lg btn-custom">Cancel</a>

      </div>
    </form>

    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</div>
