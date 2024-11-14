<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Student Information</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('student.index') }}">Students</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>List of Students</h1>
            <!-- Add New Student Button -->
            <button class="btn btn-primary" onclick="window.location.href='{{ route('student.create') }}'">
                Add Student Data
            </button>
        </div>

        <!-- Success/Error Messages -->
        @if (session('success'))
            <div class="alert alert-success" id="alert-message">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger" id="alert-message">
                {{ session('error') }}
            </div>
        @endif

        <script>
            // Automatically fade out the alert message after 5 seconds
            document.addEventListener('DOMContentLoaded', function () {
                const alertMessage = document.getElementById('alert-message');
                if (alertMessage) {
                    setTimeout(() => {
                        alertMessage.style.transition = 'opacity 0.5s';
                        alertMessage.style.opacity = '0';
                        setTimeout(() => alertMessage.remove(), 500); // Fully remove it after fading out
                    }, 5000);
                }
            });
        </script>

        <!-- Students Table -->
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Contact Number</th>
                    <th>Email Address</th>
                    <th>Semester 1 GPA</th>
                    <th>Semester 2 GPA</th>
                    <th>Semester 3 GPA</th>
                    <th>Semester 4 GPA</th>
                    <th>Final CGPA</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($std as $student)
                    <tr>
                        <td> </td>
                        <td>{{ $student->StudentID }}</td>
                        <td> <a href="{{ route('student.edit', $student->StudentID) }}">{{ $student->Name }}</a></td>
                        <td>{{ $student->DateOfBirth }}</td>
                        <td>{{ $student->Gender }}</td>
                        <td>{{ $student->ContactNumber }}</td>
                        <td>{{ $student->EmailAddress }}</td>
                        <td>{{ $student->Semester1GPA }}</td>
                        <td>{{ $student->Semester2GPA }}</td>
                        <td>{{ $student->Semester3GPA }}</td>
                        <td>{{ $student->Semester4GPA }}</td>
                        <td>{{ $student->FinalCGPA }}</td>
                        <td>
                            <!-- Delete Button -->
                            <a href="{{ route('student.destroy', $student->StudentID) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        &copy; 2024 Student Information. All Rights Reserved.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
