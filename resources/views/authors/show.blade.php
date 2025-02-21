@include('layout.nav')
@include('layout.side')
<link href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container" style="margin-top: 80px;">
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="d-flex justify-content-between align-items-center my-4">
        <h1 class="h1 mb-0" style="color: black);"> Author Show</h1>
        <div class="d-flex gap-2">
          <a href="http://127.0.0.1:8000/#" class="btn btn-dark mt-3">Back Home</a>
          <a href="{{ route('authors.index') }}" class="btn btn-dark mt-3">Cancel</a>
        </div>
      </div>
<div class="container">
    <div class="card mt-4">
<div class="card-header">
    Author Information
</div>
<div class="card-body">
<h5 class="card-title"><strong> Author First Name : </strong> {{ $author->first_name }}</h5>
<p class="card-text"> <strong> Author Last Name : </strong> {{ $author->last_name }}</p>
<p class="card-text"> <strong>Author Email : </strong> {{ $author->email }}</p>
<p class="card-text"> <strong> Author Phone : </strong> {{ $author->phone }}</p>
<p class="card-text"><strong>Student:</strong> 
    {{ $author->book ? $author->book->name : 'No Student Assigned' }}
</p>
</div>
</div>
    </div>
</div> 
    </div>
  </div>
</div>
<script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>