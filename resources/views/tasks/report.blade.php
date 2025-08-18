<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .user-section { margin-bottom: 20px; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Relatório de Tarefas</h1>
    <hr>
    @foreach ($tasksByUser as $userId => $tasks)
        @php
            $user = \App\Models\User::find($userId);
        @endphp
        <div class="user-section">
            <h2>User: {{ $user->name ?? 'Unknown User' }}</h2>
            <table>
                <tr>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->type ?? 'N/A' }}</td>
                        <td>{{ $task->description ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div style="page-break-before: always;"></div> <!-- Nova página para cada usuário -->
    @endforeach
</body>
</html>
