<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        /* Destacar mudança de usuário */
        tr:first-child td,
        tr:not(:first-child) td:first-child {
            border-top: 2px solid #007bff;
        }

        /* Ou use zebra striping por usuário */
        .user-group-1 { background-color: #f8f9fa; }
        .user-group-2 { background-color: #e9ecef; }
    </style>
</head>
<body>
    <h1>Relatório de Tarefas</h1>
    <hr>
    <table>
        <thead>
        <tr>
            <th>User</th>
            <th>Type</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tasksByUser as $userId => $tasks)
            @php
                $user = \App\Models\User::find($userId);
            @endphp

            {{-- Tarefas do usuário --}}
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $user->name ?? 'Unknown User' }}</td>
                    <td>{{ $task->type ?? 'N/A' }}</td>
                    <td>{{ $task->description ?? 'N/A' }}</td>
                </tr>
            @endforeach
        @endforeach
        </tbody>
    </table>
</body>
</html>
