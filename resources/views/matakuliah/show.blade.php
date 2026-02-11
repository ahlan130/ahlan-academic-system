<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mata Kuliah - {{ $matakuliah->nama_mk }}</title>
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
            max-width: 800px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        }
        .header {
            margin-bottom: 30px;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 20px;
        }
        .course-info {
            background: #f8fafc;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 30px;
            border-left: 5px solid #f97316;
        }
        .course-info h2 { color: #2d3748; margin-bottom: 5px; }
        .course-info p { color: #64748b; font-weight: 500; }
        
        h3 { color: #2d3748; margin-bottom: 20px; display: flex; align-items: center; gap: 10px; }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th { text-align: left; padding: 15px; background: #e2e8f0; color: #475569; font-size: 0.9rem; text-transform: uppercase; }
        td { padding: 15px; border-bottom: 1px solid #e2e8f0; color: #1e293b; }
        tr:last-child td { border-bottom: none; }
        
        .badge {
            background: #f97316;
            color: white;
            padding: 2px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #4a5568;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 20px;
            transition: 0.3s;
        }
        .btn-back:hover { color: #f97316; transform: translateX(-5px); }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: #94a3b8;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('matakuliah.index') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali ke Daftar MK
        </a>

        <div class="header">
            <div class="course-info">
                <p>KODE: {{ $matakuliah->kode_mk }}</p>
                <h2>{{ $matakuliah->nama_mk }}</h2>
                <p>Beban Studi: <span class="badge">{{ $matakuliah->sks }} SKS</span></p>
            </div>
        </div>

        <h3><i class="fas fa-users" style="color: #f97316;"></i> Mahasiswa yang Mengambil</h3>
        
        <table>
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Jurusan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($matakuliah->mahasiswas as $m)
                <tr>
                    <td><strong>{{ $m->nim }}</strong></td>
                    <td>{{ $m->nama }}</td>
                    <td>{{ $m->jurusan }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="empty-state">
                        <i class="fas fa-user-slash" style="font-size: 2rem; display: block; margin-bottom: 10px; opacity: 0.5;"></i>
                        Belum ada mahasiswa yang mengambil mata kuliah ini.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
