<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa - STMIK IKMI CIREBON</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f97316 0%, #6b7280 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        }
        .header { margin-bottom: 30px; border-bottom: 2px solid #e2e8f0; padding-bottom: 15px; }
        h1 { color: #2d3748; font-size: 1.5rem; text-align: center; }
        
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: 500; color: #4a5568; }
        input, textarea {
            width: 100%;
            padding: 12px 15px;
            border-radius: 10px;
            border: 2px solid #e2e8f0;
            font-family: inherit;
            transition: 0.3s;
        }
        input:focus, textarea:focus { border-color: #f97316; outline: none; box-shadow: 0 0 0 4px rgba(249, 115, 22, 0.1); }
        
        .btn-group { display: flex; gap: 10px; margin-top: 30px; }
        .btn {
            flex: 1;
            padding: 12px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            border: none;
            text-align: center;
            text-decoration: none;
        }
        .btn-save { background: #f97316; color: white; }
        .btn-save:hover { background: #ea580c; transform: translateY(-2px); }
        .btn-cancel { background: #e2e8f0; color: #4a5568; }
        .btn-cancel:hover { background: #cbd5e1; }
        
        .error-msg { color: #ef4444; font-size: 0.8rem; margin-top: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-user-plus" style="color: #f97316;"></i> Tambah Mahasiswa</h1>
        </div>

        <form action="{{ route('mahasiswa.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" name="nim" id="nim" value="{{ old('nim') }}" placeholder="Contoh: 20240101" required>
                @error('nim') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required>
                @error('nama') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan') }}" required>
                @error('jurusan') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                @error('email') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label for="alamat">Alamat (Opsional)</label>
                <textarea name="alamat" id="alamat" rows="3">{{ old('alamat') }}</textarea>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-save">Simpan Data</button>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
