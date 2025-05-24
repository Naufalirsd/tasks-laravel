{{-- resources/views/tasks/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Tasks</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 40px;
        }

        .container {
            background: #ffffff;
            border-radius: 12px;
            padding: 30px;
            max-width: 950px;
            margin: 0 auto;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        h1 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #111827;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .filter-form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }

        .filter-form input,
        .filter-form select {
            padding: 8px 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
        }

        .btn {
            padding: 8px 14px;
            text-decoration: none;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: 0.2s;
        }

        .btn:hover {
            transform: translateY(-1px);
            opacity: 0.95;
        }

        .btn-primary { background-color: #3b82f6; color: white; }
        .btn-success { background-color: #10b981; color: white; }
        .btn-warning { background-color: #facc15; color: #111827; }
        .btn-danger  { background-color: #ef4444; color: white; }
        .btn-info    { background-color: #06b6d4; color: white; }
        .btn-secondary { background-color: #6b7280; color: white; }

        .alert {
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .alert-info {
            background-color: #e0f2fe;
            border: 1px solid #bae6fd;
            color: #0c4a6e;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 14px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background-color: #f9fafb;
            font-weight: 600;
            color: #374151;
        }

        tr:hover {
            background-color: #f1f5f9;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .back-button {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background: linear-gradient(90deg, #6366f1 0%, #4f46e5 100%);
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .back-button:hover {
            background: #3730a3;
            transform: translateY(-2px) scale(1.02);
        }
    </style>
</head>
<body>

<a href="/dashboard" class="back-button">&larr; Kembali ke Dashboard</a>

<div class="container">
    <div class="header">
        <h1>Daftar Task</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">+ Tambah Task</a>
    </div>

    <form method="GET" action="{{ route('tasks.index') }}" class="filter-form" style="justify-content: flex-end; display: flex; gap: 10px;">
        <select name="status" style="padding: 8px; font-size: 14px;">
            <option value="">Status</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
        </select>
    
        <button type="submit" class="btn btn-info">Filter</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Reset</a>
    </form>

    @if ($tasks->isEmpty())
        <div class="alert alert-info">Tidak ada pekerjaan. Buat pekerjaan baru!</div>
    @else
        <table>
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>
                            <span @if ($task->is_completed) style="text-decoration: line-through; color: #6b7280;" @endif>
                                {{ $task->task_name }}
                            </span>
                        </td>
                        <td>
                            <form action="{{ route('tasks.toggle', $task->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn {{ $task->is_completed ? 'btn-success' : 'btn-info' }}">
                                    {{ $task->is_completed ? '✓ Selesai' : 'Pending' }}
                                </button>
                            </form>
                        </td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info">Lihat</a>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
</body>
</html>
