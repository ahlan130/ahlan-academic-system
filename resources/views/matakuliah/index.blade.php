<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mata Kuliah - STMIK IKMI CIREBON</title>
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
            padding: 40px 20px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 20px;
        }
        h1 { color: #2d3748; font-size: 1.8rem; }
        .btn {
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: 0.3s;
            border: none;
            cursor: pointer;
        }
        .btn-add { background: #f97316; color: white; }
        .btn-add:hover { background: #ea580c; transform: translateY(-2px); }
        .btn-view { background: #3b82f6; color: white; font-size: 0.8rem; padding: 5px 12px; }
        .btn-view:hover { background: #1d4ed8; }
        .btn-edit { background: #6b7280; color: white; font-size: 0.8rem; padding: 5px 12px; }
        .btn-edit:hover { background: #4b5563; }
        .btn-delete { background: #ef4444; color: white; font-size: 0.8rem; padding: 5px 12px; }
        .btn-delete:hover { background: #dc2626; }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th { text-align: left; padding: 15px; background: #f8fafc; color: #64748b; font-size: 0.9rem; text-transform: uppercase; }
        td { padding: 15px; border-bottom: 1px solid #e2e8f0; color: #4a5568; }
        
        .alert {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 500;
        }
        .alert-success { background: #dcfce7; color: #166534; border: 1px solid #bbf7d0; }

        .back-nav { margin-bottom: 20px; }
        .back-nav a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            opacity: 0.8;
            transition: 0.3s;
        }
        .back-nav a:hover { opacity: 1; transform: translateX(-5px); }
    </style>
</head>
<body>
    <div class="container">
        <div class="back-nav" style="margin-top: -80px; position: absolute;">
            <a href="/welcome-mahasiswa"><i class="fas fa-arrow-left"></i> Kembali ke Welcome</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <div class="header">
            <h1><i class="fas fa-book" style="color: #f97316;"></i> Mata Kuliah</h1>
            <a href="{{ route('matakuliah.create') }}" class="btn btn-add">
                <i class="fas fa-plus"></i> Tambah MK
            </a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Kode MK</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mataKuliahs as $mk)
                <tr>
                    <td><strong>{{ $mk->kode_mk }}</strong></td>
                    <td>{{ $mk->nama_mk }}</td>
                    <td>{{ $mk->sks }}</td>
                    <td style="display: flex; gap: 8px;">
                        <a href="{{ route('matakuliah.show', $mk->id) }}" class="btn btn-view" title="Lihat Mahasiswa">
                           <i class="fas fa-users"></i>
                        </a>
                        <a href="{{ route('matakuliah.edit', $mk->id) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('matakuliah.destroy', $mk->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align: center; padding: 40px; color: #94a3b8;">Belum ada data mata kuliah.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
