<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f6fa;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 20px;
            box-sizing: border-box;
            font-size: 15px;
        }

        .invalid-feedback {
            color: red;
            font-size: 14px;
            margin-top: -15px;
            margin-bottom: 10px;
        }

        .btn {
            padding: 10px 18px;
            font-size: 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            color: white;
            margin-right: 10px;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Task</h1>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="task_name">Nama Task</label>
                <input type="text" id="task_name" name="task_name"
                       value="{{ old('task_name', $task->task_name) }}"
                       class="@error('task_name') is-invalid @enderror" required>
                @error('task_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="@error('status') is-invalid @enderror" required>
                    <option value="0" {{ old('status', $task->is_completed) == 0 ? 'selected' : '' }}>Pending</option>
                    <option value="1" {{ old('status', $task->is_completed) == 1 ? 'selected' : '' }}>Selesai</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Task</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
