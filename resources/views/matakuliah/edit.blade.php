<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mata Kuliah - STMIK IKMI CIREBON</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #f97316 0%, #6b7280 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; }
        .container { max-width: 500px; width: 100%; background: white; padding: 40px; border-radius: 20px; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2); }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: 500; }
        input { width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 10px; }
        .btn-group { display: flex; gap: 10px; margin-top: 30px; }
        .btn { flex: 1; padding: 12px; border-radius: 50px; border: none; font-weight: 600; cursor: pointer; text-align: center; text-decoration: none; }
        .btn-save { background: #f97316; color: white; }
        .btn-cancel { background: #e2e8f0; color: #4a5568; }
        .error-msg { color: #ef4444; font-size: 0.8rem; margin-top: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="margin-bottom: 25px; text-align: center;">Edit Mata Kuliah</h2>
        <form action="{{ route('matakuliah.update', $matakuliah->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="form-group">
                <label>Kode MK</label>
                <input type="text" name="kode_mk" value="{{ old('kode_mk', $matakuliah->kode_mk) }}" required>
                @error('kode_mk') <p class="error-msg">{{ $message }}</p> @enderror
            </div>
            <div class="form-group">
                <label>Nama Mata Kuliah</label>
                <input type="text" name="nama_mk" value="{{ old('nama_mk', $matakuliah->nama_mk) }}" required>
                @error('nama_mk') <p class="error-msg">{{ $message }}</p> @enderror
            </div>
            <div class="form-group">
                <label>SKS (1-6)</label>
                <input type="number" name="sks" value="{{ old('sks', $matakuliah->sks) }}" min="1" max="6" required>
                @error('sks') <p class="error-msg">{{ $message }}</p> @enderror
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-save">Update</button>
                <a href="{{ route('matakuliah.index') }}" class="btn btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
