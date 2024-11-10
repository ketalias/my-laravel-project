<!-- resources/views/participants/index.blade.php -->

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Список учасників</title>
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

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f7f7f7;
            color: #333;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td a {
            color: #007bff;
            text-decoration: none;
            margin-right: 10px;
        }

        td a:hover {
            text-decoration: underline;
        }

        td button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        td button:hover {
            background-color: #c82333;
        }

        .alert {
            margin-top: 20px;
            border-radius: 5px;
        }

        /* Media queries for responsiveness */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
            table {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
<h2>Список учасників</h2>

@if(session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

<table>
    <thead>
    <tr>
        <th>ПІБ</th>
        <th>Стать</th>
        <th>Вік</th>
        <th>Країна</th>
        <th>Оцінки</th>
        <th>Дії</th>
    </tr>
    </thead>
    <tbody>
    @foreach($participants as $participant)
        <tr>
            <td>{{ $participant->name }}</td>
            <td>{{ $participant->gender == 'M' ? 'Чоловік' : 'Жінка' }}</td>
            <td>{{ $participant->age }}</td>
            <td>{{ $participant->country }}</td>
            <td>{{ $participant->scores  }}</td>
            <td>
                <a href="{{ route('participants.edit', $participant->id) }}">Редагувати</a>
                <form action="{{ route('participants.destroy', $participant->id) }}" method="POST"
                      style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Видалити</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<a href="{{ route('participants.create') }}">Додати нового учасника</a>
</body>
</html>
