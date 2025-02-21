@include('layout.nav')
@include('layout.side')
<link href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container" style="margin-top: 80px;">
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="d-flex justify-content-between align-items-center my-4">
        <h1 class="h1 mb-0" style="color: black);"> Book Show</h1>
        <div class="d-flex gap-2">
          <a href="http://127.0.0.1:8000/#" class="btn btn-dark mt-3">Back Home</a>
          <a href="{{ route('books.index') }}" class="btn btn-dark mt-3">Cancel</a>
        </div>
      </div>
<div class="container">
    <div class="card mt-4">
<div class="card-header">
    Book Information
</div>
<div class="card-body">
<h5 class="card-title"><strong> Book Name : </strong> {{ $book->name }}</h5>
<p class="card-text"> <strong> Description: </strong> {{ $book->description }}</p>
<p class="card-text"> <strong> Price: </strong> ${{ $book->price }}</p>
<p class="card-text"><strong>Author:</strong> 
    {{ $book->author ? $book->author->first_name : 'No Author Assigned' }}
</p>

<p class="card-text"><strong>Student:</strong> 
    {{ $book->student ? $book->student->name : 'No Student Assigned' }}
</p>

@if ($book->image)
    <img src="{{ asset('storage/' . $book->image) }}" alt="Book Image" class="img-fluid" style="max-width: 200px;">
@else
    <p>No Image Available</p>
@endif
</div>
</div>
    </div>
</div> 
    </div>
  </div>
</div>
<script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>