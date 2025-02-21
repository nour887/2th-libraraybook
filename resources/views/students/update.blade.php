@include('layout.nav')
@include('layout.side')

<div class="container">
<head>
    <link href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <br><br><br>
    <h1 class="mt-4 mb-4 text-center" > Update Student</h1>
        <form action="{{ route('students.update', $student->id) }}" method="POST" class="mx-auto mt-4" style="max-width: 500px;">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $student->id }}">
        <!-- Input 1: -->
        <div class="mb-3">
            <label for="name" class="form-label label-color1">Student  Name:</label>
            <input type="text" class="form-control form-control-sm" style="border: 2px solid #7e7d80;" 
            id="name" placeholder="Enter Student Name" name="name" value='{{ $student->name }}'>
        </div>
        <!-- Input 2:  -->
        <div class="mb-3">
            <label for="email" class="form-label label-color2">Student Email:</label>
            <input  type="text" class="form-control form-control-sm"  style="border: 2px solid #7e7d80;" 
             id="email" placeholder="Enter Student Email"  name="email" value='{{ $student->email}}'>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label label-color1">Student Phone:</label>
            <input type="text" name="phone" class="form-control form-control-sm" 
            id="phone" placeholder="Enter Student Phone"  name="phone"
            value="{{ old('phone', $student->phone) }}" style="border: 2px solid #7e7d80;" >

         
        </div>
        <div>
            <label for="book_id" class="form-label">Select Your Book:</label>
            <select name="book_id" class="form-select" id="book_id">
                @if($books->isEmpty())
                    <option value="">No books available</option>
                @else
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}" {{ $student->book_id == $book->id ? 'selected' : '' }}>{{ $book->name }}</option>

                   @endforeach
                @endif
            </select>
            @error('book_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div>
            <label for="author_id" class="form-label">Select Your Author:</label>
            <select name="author_id" class="form-select w-50 mx-auto" id="author_id">
                @if($authors->isEmpty())
                    <option value="">No authors available</option>
                @else
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" {{ $student->author_id == $author->id ? 'selected' : '' }}>
                            {{ $author->first_name }}
                        </option>
                    @endforeach
                @endif
            </select>
            @error('author_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-custom">
                 Update Student
            </button>
            <a href="{{ route('students.index') }}" class="btn btn-lg btn-custom">
                <i class="fas fa-times"></i> Cancel
            </a>
        </div>
    </form>
    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</div>