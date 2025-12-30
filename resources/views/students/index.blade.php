<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-blue-50 min-h-screen p-6">

    <div class="max-w-6xl mx-auto">

        <!-- Page Heading -->
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Student List</h2>

        <!-- Add Student Button -->
        <a href="{{ route('students.create') }}"
           class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition">
           Add Student
        </a>

        <!-- Success Message -->
        @if(session('success'))
        <div class="mb-4 px-4 py-3 rounded bg-green-200 text-green-800">
            {{ session('success') }}
        </div>
        @endif

        <!-- Students Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 shadow-sm rounded">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-700 font-medium border-b">Name</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-medium border-b">Email</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-medium border-b">Course</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-medium border-b">Phone</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-medium border-b">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b">{{ $student->name }}</td>
                        <td class="px-4 py-2 border-b">{{ $student->email }}</td>
                        <td class="px-4 py-2 border-b">{{ $student->course }}</td>
                        <td class="px-4 py-2 border-b">{{ $student->phone }}</td>
                        <td class="px-4 py-2 border-b space-x-2">
                            <a href="{{ route('students.edit',$student->id) }}"
                               class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 transition text-sm">
                               Edit
                            </a>

                            <form action="{{ route('students.destroy',$student->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition text-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>
