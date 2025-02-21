@include('layout.nav')
@include('layout.side')
<link href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container" style="margin-top: 80px;">
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="d-flex justify-content-between align-items-center my-4">
        <h1 class="h1 mb-0" style="color: black);">All Books</h1>
        <div class="d-flex gap-2">
          <a href="http://127.0.0.1:8000/books/create" class="btn btn-dark">Create Book</a>
          <a href="http://127.0.0.1:8000/#" class="btn btn-dark">Back Home</a>
        </div>
      </div>

      <!-- الجدول -->
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead class="table-dark">
            <tr>
              <th scope="col" class="py-2">ID</th>
              <th scope="col" class="py-2">Name</th>
              <th scope="col" class="py-2">Description</th>
              <th scope="col" class="py-2">Price</th>
              <th scope="col" class="py-2">Image</th>
              <th scope="col" class="py-2">Author Name</th>
              <th scope="col" class="py-2">Student Name</th>
              <th scope="col" class="py-2">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($books as $book)
            <tr>
              <td class="py-2">{{ $book->id }}</td>
              <td class="py-2">{{ $book->name }}</td>
              <td class="py-2 text-truncate" style="max-width: 200px;">{{ $book->description }}</td>
              <td class="py-2">{{ $book->price }}</td>
              <td class="py-2">
                @if ($book->image)
                    <img src="{{ asset('storage/' . $book->image) }}" 
                         alt="Book Image" 
                         class="img-thumbnail" 
                         style="width: 80px; height: 100px; object-fit: cover;">
                @else
                    <span>No Image</span>
                @endif
            </td>
            <td class="py-2">{{ $book->author->first_name ?? '' }}</td>
            <td class="py-2">{{ $book->student->name ?? '' }}</td>

              <td class="py-2">
                <div class="d-flex gap-2">
                  <a href="/books/update/{{ $book->id }}" class="btn btn-dark">Update</a> 
                  <a href="/books/delete/{{ $book->id }}" class="btn btn-dark">Delete</a>
                  <a href="{{ route('books.show', $book->id) }}" class="btn btn-dark">Show</a>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>