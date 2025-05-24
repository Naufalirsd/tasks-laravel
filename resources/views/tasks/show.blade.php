<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Task</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 40px 15px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
            font-size: 24px;
            color: #333;
        }

        .section {
            margin-bottom: 20px;
        }

        .label {
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }

        .badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            color: white;
        }

        .bg-success {
            background-color: #28a745;
        }

        .bg-warning {
            background-color: #ffc107;
            color: #333;
        }

        .btn {
            padding: 10px 16px;
            font-size: 14px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            color: white;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-warning {
            background-color: #f0ad4e;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn i {
            margin-right: 5px;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .btn-group {
            display: flex;
            gap: 10px;
        }

        @media (max-width: 600px) {
            .actions {
                flex-direction: column;
                gap: 15px;
            }

            .btn-group {
                flex-direction: column;
                width: 100%;
            }

            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Detail Task</h2>

        <div class="section">
            <span class="label">Nama Task:</span>
            <p>{{ $task->task_name }}</p>
        </div>

        <div class="section">
            <span class="label">Status:</span>
            <span class="badge {{ $task->is_completed ? 'bg-success' : 'bg-warning' }}">
                {{ $task->is_completed ? 'Selesai' : 'Pending' }}
            </span>
        </div>

        <div class="section">
            <span class="label">Dibuat Pada:</span>
            <p>{{ $task->created_at->format('d M Y H:i') }}</p>
        </div>

        <div class="actions">
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <div class="btn-group">
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <button class="btn btn-danger" onclick="confirmDelete('{{ $task->id }}')">
                    <i class="fas fa-trash"></i> Hapus
                </button>
                <form id="delete-form-{{ $task->id }}" action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(taskId) {
            if (confirm('Yakin ingin menghapus task ini?')) {
                document.getElementById('delete-form-' + taskId).submit();
            }
        }
    </script>

</body>
</html>
