<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa - STMIK IKMI CIREBON</title>
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
            max-width: 1000px;
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
        .btn-edit { background: #6b7280; color: white; font-size: 0.8rem; padding: 5px 12px; }
        .btn-delete { background: #ef4444; color: white; font-size: 0.8rem; padding: 5px 12px; }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th { text-align: left; padding: 15px; background: #f8fafc; color: #64748b; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.05em; }
        td { padding: 15px; border-bottom: 1px solid #e2e8f0; color: #4a5568; font-size: 0.95rem; }
        tr:hover td { background: #f8fafc; }
        .actions { display: flex; gap: 8px; }
        
        .alert {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 500;
        }
        .alert-success { background: #dcfce7; color: #166534; border: 1px solid #bbf7d0; }

        .back-nav {
            margin-bottom: 20px;
        }
        .back-nav a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
            opacity: 0.8;
            transition: 0.3s;
        }
        .back-nav a:hover { opacity: 1; transform: translateX(-5px); }
    </style>
</head>
<body>
    <div class="container" style="max-width: 1100px;">
        <div class="back-nav" style="margin-top: -80px; position: absolute;">
            <a href="/welcome-mahasiswa"><i class="fas fa-arrow-left"></i> Kembali ke Welcome</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <div class="header">
            <h1><i class="fas fa-users" style="color: #f97316;"></i> Data Mahasiswa</h1>
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-add">
                <i class="fas fa-plus"></i> Tambah Mahasiswa
            </a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mahasiswas as $m)
                <tr>
                    <td><strong>{{ $m->nim }}</strong></td>
                    <td>{{ $m->nama }}</td>
                    <td>{{ $m->jurusan }}</td>
                    <td>{{ $m->email }}</td>
                    <td class="actions">
                        <a href="{{ route('mahasiswa.edit', $m->id) }}" class="btn btn-edit">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; padding: 40px; color: #94a3b8;">
                        <i class="fas fa-folder-open" style="font-size: 3rem; display: block; margin-bottom: 10px; opacity: 0.5;"></i>
                        Belum ada data mahasiswa.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
