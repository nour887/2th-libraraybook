@include('layout.nav')
@include('layout.side')

<div class="container">
<head>
    <title>Update Book</title>
    <link href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <br><br><br>
    <h1 class="mt-4 mb-4 text-center">Update Book</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="mt-4 mx-auto" style="max-width: 500px;">
        @csrf
      
        <!-- Input 1: Book Name -->
        <div class="mb-3">
            <label for="name" class="form-label label-color1">Book Name:</label>
            <input type="text" class="form-control form-control-sm" 
                   id="name" name="name" 
                   value="{{ old('name', $book->name) }}">
            @error('name')
            <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <!-- Input 2: Book Description -->
        <div class="mb-3">
            <label for="description" class="form-label label-color1">Description:</label>
            <textarea class="form-control form-control-sm" 
                      id="description" 
                      name="description" 
                      rows="3">{{ old('description', $book->description) }}</textarea>
            @error('description')
            <p style="color:red">{{ $message }}</p>@enderror
        </div>

        <!-- Input 3: Price -->
        <div class="mb-3">
            <label for="price" class="form-label label-color1">Price:</label>
            <input type="number" class="form-control form-control-sm" 
                   id="price" name="price" 
                   value="{{ old('price', $book->price) }}">
            @error('price')
            <p style="color:red">{{ $message }}</p>@enderror
        </div>

        <!-- Input 4: Image -->
        <div class="mb-3">
            <label for="image" class="form-label label-color1">New Image:</label>
            <input type="file" class="form-control form-control-sm" 
                   id="image" name="image">
            @error('image')
            <p style="color:red">{{ $message }}</p>@enderror
        </div>

        <!-- Current Image -->
        @if($book->image)
        <div class="mb-3 text-center">
            <p>Current Image:</p>
            <img src="{{ asset('storage/' . $book->image) }}" 
    alt="Current Book Cover" class="img-thumbnail" style="max-width: 200px;">
        </div>
        @endif
    </div>
    <div class="text-center">
        <label for="author_id" class="form-label">Select Your Author:</label>
        <select name="author_id" class="form-select w-50 mx-auto" id="author_id" style="max-width: 200px;">
            @if($authors->isEmpty())
                <option value="">No Authors available</option>
            @else
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}" {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>{{ $author->first_name }}</option>
                @endforeach
            @endif
        </select>
        @error('author_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="text-center mt-3">
        <label for="student_id" class="form-label custom-label">Select Student:</label>
        <select name="student_id" class="form-select w-50 mx-auto" id="student_id" style="max-width: 200px;">
            @if($students->isEmpty())
                <option value="">No Students available</option>
            @else
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" {{ old('student_id', $book->student_id) == $student->id ? 'selected' : '' }}>{{ $student->name }}</option>
                @endforeach
            @endif
        </select>
        @error('student_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-custom">
                <i class="fas fa-save"></i> Update Book
            </button>
            
            <a href="{{ route('books.index') }}" class="btn btn-lg btn-custom">
                <i class="fas fa-times"></i> Cancel
            </a>
        </div>
    </form>

    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</div>