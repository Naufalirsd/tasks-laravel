<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Task Baru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 40px 15px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
            color: #333;
            text-align: center;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            box-sizing: border-box;
        }

        .invalid-feedback {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            font-size: 14px;
            text-decoration: none;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            color: #fff;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-secondary {
            background-color: #6c757d;
            margin-right: 10px;
        }

        .btn i {
            margin-right: 5px;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        @media (max-width: 500px) {
            .container {
                padding: 20px;
            }

            .button-group {
                flex-direction: column;
                gap: 10px;
                align-items: stretch;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Tambah Task Baru</h2>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="task_name">Nama Task</label>
                <input type="text" id="task_name" name="task_name" value="{{ old('task_name') }}"
                       class="@error('task_name') is-invalid @enderror" required>
                @error('task_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="button-group">
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>

</body>
</html>
