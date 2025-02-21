@include('layout.nav')
@include('layout.side')
<link href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container" style="margin-top: 80px;">
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="d-flex justify-content-between align-items-center my-4">
        <h1 class="h1 mb-0" style="color: black);"> student Show</h1>
        <div class="d-flex gap-2">
          <a href="http://127.0.0.1:8000/#" class="btn btn-dark mt-3">Back Home</a>
          <a href="{{ route('students.index') }}" class="btn btn-dark mt-3">Cancel</a>
        </div>
      </div>
<div class="container">
    <div class="card mt-4">
<div class="card-header">
    Student Information
</div>
<div class="card-body">
<h5 class="card-title"><strong> Student Name : </strong> {{ $student->name }}</h5>
<p class="card-text"> <strong> Email: </strong> {{ $student->email }}</p>
<p class="card-text"> <strong> Phone: </strong> {{ $student->phone }}</p>
<p class="card-text"><strong>Book Name:</strong> 
    {{ $student->book ? $student->book->name : 'No Author Assigned' }}
</p>
<p class="card-text"><strong>Author Name:</strong> 
    {{ $student->author ? $student->author->first_name : 'No Student Assigned' }}
</p>

</div>
</div>
    </div>
</div> 
    </div>
  </div>
</div>
<script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>