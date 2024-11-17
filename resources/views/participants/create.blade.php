<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Додати нового учасника</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .alert {
            margin-top: 20px;
            border-radius: 5px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control, .form-select {
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .invalid-feedback {
            color: #e74c3c;
            font-size: 0.875rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
        }

        /* Additional media queries for responsiveness */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
            h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Додати нового учасника</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (Gate::allows('create-participant'))
        <form action="{{ route('participants.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">ПІБ:</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Стать:</label>
            <select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror" required>
                <option value="">-- Виберіть стать --</option>
                <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Чоловік</option>
                <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Жінка</option>
            </select>
            @error('gender')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Вік:</label>
            <input type="number" name="age" id="age" class="form-control @error('age') is-invalid @enderror" value="{{ old('age') }}" required min="0">
            @error('age')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="country" class="form-label">Країна:</label>
            <input type="text" name="country" id="country" class="form-control @error('country') is-invalid @enderror" value="{{ old('country') }}" required>
            @error('country')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="scores" class="form-label">Оцінки (через кому):</label>
            <input type="text" name="scores" id="scores" class="form-control @error('scores') is-invalid @enderror" value="{{ old('scores') }}" required>
            @error('scores')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Додати учасника</button>
    </form>
    @else
        <p>У вас немає прав доступу для створення учасників.</p>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
