@include('layout.nav')
@include('layout.side')
<link href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container" style="margin-top: 80px;">
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="my-4 d-flex justify-content-between align-items-center">
        <h1 class="mb-0 h1" style="color: black);">All Student</h1>
        <div class="gap-2 d-flex">
          <a href="http://127.0.0.1:8000/students/create" class="btn btn-dark">Create Student</a>
          <a href="http://127.0.0.1:8000/#" class="btn btn-dark">Back Home</a>
        </div>
      </div>

      <!-- الجدول -->
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead class="table-dark">
            <tr>
              <th scope="col" class="py-2">ID</th>
              <th scope="col" class="py-2"> Name</th>
              <th scope="col" class="py-2">Email</th>
              <th scope="col" class="py-2">Phone</th>
              <th scope="col" class="py-2">Book Name</th>
              <th scope="col" class="py-2">Author Name</th>
              <th scope="col" class="py-2">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($students as $student)
            <tr>
              <td class="py-2">{{ $student->id }}</td>
              <td class="py-2">{{ $student->name }}</td>
              <td class="py-2 ">{{ $student->email }}</td>
              <td class="py-2 ">{{ $student->phone }}</td>
              <td class="py-2">{{ $student->book->name ?? '' }}</td>
              <td class="py-2">{{ $student->author->first_name ?? '' }}</td>
              <td class="py-2">
                <div class="gap-2 d-flex">
                  <a href="/students/update/{{ $student->id }}" class="btn btn-dark">Update</a> 
                  <a href="/students/delete/{{ $student->id }}" class="btn btn-dark">Delete</a>
                  <a href="/students/show/{{ $student->id }}" class="btn btn-dark">view</a>

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