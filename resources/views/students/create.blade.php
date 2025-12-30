<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Add Student</h2>

<form method="POST" action="{{ route('students.store') }}">
@csrf

<input class="form-control mb-2" name="name" placeholder="Name">
<input class="form-control mb-2" name="email" placeholder="Email">
<input class="form-control mb-2" name="course" placeholder="Course">
<input class="form-control mb-2" name="phone" placeholder="Phone">

<button class="btn btn-success">Save</button>
<a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
</form>

</body>
</html>
