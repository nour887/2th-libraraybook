@include('layout.nav')
@include('layout.side')
<link href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container" style="margin-top: 80px;">
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="my-4 d-flex justify-content-between align-items-center">
        <h1 class="mb-0 h1" style="color: black);">All Authors</h1>
        <div class="gap-2 d-flex">
          <a href="http://127.0.0.1:8000/authors/create" class="btn btn-dark">Create Author</a>
          <a href="{{ url('/') }}" class="btn btn-dark">Back Home</a>
        </div>
      </div>

      <!-- الجدول -->
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead class="table-dark">
            <tr>
              <th scope="col" class="py-2">ID</th>
              <th scope="col" class="py-2">First Name</th>
              <th scope="col" class="py-2">Last Name</th>
              <th scope="col" class="py-2">Email</th>
              <th scope="col" class="py-2">Phone</th>
              <th scope="col" class="py-2">Book Name</th>
              <th scope="col" class="py-2">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($authors as $author)
            <tr>
              <td class="py-2">{{ $author->id }}</td>
              <td class="py-2">{{ $author->first_name }}</td>
              <td class="py-2 ">{{ $author->last_name }}</td>
              <td class="py-2 ">{{ $author->email }}</td>
              <td class="py-2 ">{{ $author->phone }}</td>
              <td class="py-2">{{ $author->book->name ?? 'No Book Assigned' }}</td>
              <td class="py-2">
                <div class="gap-2 d-flex">
                  <a href="/authors/update/{{ $author->id }}" class="btn btn-dark">Update</a> 
                  <a href="/authors/delete/{{ $author->id }}" class="btn btn-dark">Delete</a>
                  <a href="/authors/show/{{ $author->id }}" class="btn btn-dark">view</a>

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