<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Edit Student</h2>

<form method="POST" action="{{ route('students.update',$student->id) }}">
@csrf
@method('PUT')

<input class="form-control mb-2" name="name" value="{{ $student->name }}">
<input class="form-control mb-2" name="email" value="{{ $student->email }}">
<input class="form-control mb-2" name="course" value="{{ $student->course }}">
<input class="form-control mb-2" name="phone" value="{{ $student->phone }}">

<button class="btn btn-primary">Update</button>
<a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
</form>

</body>
</html>
