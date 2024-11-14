<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <style>
        /* Add your styles here */
        /* Reset margin and padding for all elements */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: auto;
            padding: 20px;
        }

        /* Form container styles */
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            overflow: auto;
        }

        /* Heading styles */
        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        /* Label styles */
        label {
            font-size: 14px;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }

        /* Input and select field styles */
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            background-color: #fafafa;
            transition: border-color 0.3s ease;
        }

        input[type="number"]:invalid {
            border-color: #f44336;
        }

        /* Button styles */
        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Optional: Add some footer for additional information or links */
        .footer {
            text-align: center;
            margin-top: 15px;
            font-size: 12px;
            color: #888;
        }

        .footer a {
            color: #4CAF50;
            text-decoration: none;
        }

        /* Responsive design for smaller screens */
        @media screen and (max-width: 600px) {
            .container {
                padding: 15px;
            }

            h1 {
                font-size: 20px;
            }

            input, select {
                font-size: 13px;
            }

            button {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Add New Student</h1>

        <form id="addStudentForm" action="{{ $edit ? route('student.update', $student->StudentID) : route('student.store') }}" method="POST">
    @csrf


    <!-- Student ID -->
    <label for="StudentID">Student ID</label>
    <input type="number" id="StudentID" name="StudentID" value="{{ $edit ? $student->StudentID : old('StudentID') }}" required>

    <!-- Name -->
    <label for="Name">Name</label>
    <input type="text" id="Name" name="Name" value="{{ $edit ? $student->Name : old('Name') }}" required>

    <!-- Date of Birth -->
    <label for="DateOfBirth">Date of Birth</label>
    <input type="date" id="DateOfBirth" name="DateOfBirth" value="{{ $edit ? $student->DateOfBirth : old('DateOfBirth') }}" required>

    <!-- Gender -->
    <label for="Gender">Gender</label>
    <select id="Gender" name="Gender" required>
        <option value="M" {{ $edit && $student->Gender == 'M' ? 'selected' : '' }}>Male</option>
        <option value="F" {{ $edit && $student->Gender == 'F' ? 'selected' : '' }}>Female</option>
    </select>

    <!-- Contact Number -->
    <label for="ContactNumber">Contact Number</label>
    <input type="text" id="ContactNumber" name="ContactNumber" value="{{ $edit ? $student->ContactNumber : old('ContactNumber') }}">

    <!-- Email Address -->
    <label for="EmailAddress">Email Address</label>
    <input type="email" id="EmailAddress" name="EmailAddress" value="{{ $edit ? $student->EmailAddress : old('EmailAddress') }}" required>

    <!-- Semester 1 GPA -->
    <label for="Semester1GPA">Semester 1 GPA</label>
    <input type="number" step="0.01" id="Semester1GPA" name="Semester1GPA" value="{{ $edit ? $student->Semester1GPA : old('Semester1GPA') }}">

    <!-- Semester 2 GPA -->
    <label for="Semester2GPA">Semester 2 GPA</label>
    <input type="number" step="0.01" id="Semester2GPA" name="Semester2GPA" value="{{ $edit ? $student->Semester2GPA : old('Semester2GPA') }}">

    <!-- Semester 3 GPA -->
    <label for="Semester3GPA">Semester 3 GPA</label>
    <input type="number" step="0.01" id="Semester3GPA" name="Semester3GPA" value="{{ $edit ? $student->Semester3GPA : old('Semester3GPA') }}">

    <!-- Semester 4 GPA -->
    <label for="Semester4GPA">Semester 4 GPA</label>
    <input type="number" step="0.01" id="Semester4GPA" name="Semester4GPA" value="{{ $edit ? $student->Semester4GPA : old('Semester4GPA') }}">

    <!-- Final CGPA (read-only) -->
    <label for="FinalCGPA">Final CGPA</label>
    <input type="number" step="0.01" id="FinalCGPA" name="FinalCGPA" value="{{ $edit ? $student->FinalCGPA : old('FinalCGPA') }}" readonly>

    <!-- Submit Button -->
    <button type="submit">{{ $edit ? 'Update Student' : 'Add Student' }}</button>

    <!-- View Student Data Button -->
    <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('student.index') }}'">
        View Student Data
    </button>
</form>


        <div class="footer">
            <p>Form submitted? <a href="/">Go back</a></p>
        </div>
    </div>

    <script>
        // Optional: JavaScript for calculating Final CGPA automatically
        document.getElementById('addStudentForm').addEventListener('input', function () {
            const semester1 = parseFloat(document.getElementById('Semester1GPA').value) || 0;
            const semester2 = parseFloat(document.getElementById('Semester2GPA').value) || 0;
            const semester3 = parseFloat(document.getElementById('Semester3GPA').value) || 0;
            const semester4 = parseFloat(document.getElementById('Semester4GPA').value) || 0;

            // Simple average calculation for CGPA
            const finalCGPA = (semester1 + semester2 + semester3 + semester4) / 4;
            document.getElementById('FinalCGPA').value = finalCGPA.toFixed(2);
        });
    </script>

</body>
</html>
