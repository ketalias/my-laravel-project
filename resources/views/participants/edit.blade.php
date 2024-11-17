<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Редагувати учасника</title>
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
            max-width: 800px;
            margin: 20px auto;
        }

        h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: inline-block;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 1rem;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Error styling */
        .invalid-feedback {
            color: #e74c3c;
            font-size: 0.875rem;
        }

        /* Focus styling */
        input:focus, select:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
        }

        /* Media queries for responsiveness */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            h2 {
                font-size: 1.5rem;
            }

            input, select {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>

@can('update', $participant)
    <h2>Редагувати учасника</h2>

    <form action="{{ route('participants.update', $participant->id) }}" method="POST">
        @csrf
        @method('PUT')  <!-- This specifies the form will use the PUT method -->

        <div>
            <label for="name">ПІБ:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $participant->name) }}" required>
        </div>

        <div>
            <label for="gender">Стать:</label>
            <select name="gender" id="gender" required>
                <option value="M" {{ $participant->gender == 'M' ? 'selected' : '' }}>Чоловік</option>
                <option value="F" {{ $participant->gender == 'F' ? 'selected' : '' }}>Жінка</option>
            </select>
        </div>

        <div>
            <label for="age">Вік:</label>
            <input type="number" name="age" id="age" value="{{ old('age', $participant->age) }}" required min="0">
        </div>

        <div>
            <label for="country">Країна:</label>
            <input type="text" name="country" id="country" value="{{ old('country', $participant->country) }}" required>
        </div>

        <div>
            <label for="scores">Оцінки (через кому):</label>
            <input type="text" name="scores" id="scores" value="{{ old('scores', $participant->scores ) }}" required>
        </div>

        <div>
            <button type="submit">Зберегти зміни</button>
        </div>
    </form>
@else
    <div class="alert alert-danger">
        Ви не маєте дозволу редагувати цього учасника.
    </div>
@endcan

</body>
</html>
