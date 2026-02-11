<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Selamat Datang Mahasiswa - STMIK IKMI CIREBON</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

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
            max-width: 1000px;
            width: 100%;
        }

        .welcome-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 30px;
            padding: 50px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            text-align: center;
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo {
            width: 120px;
            height: 120px;
            margin: 0 auto 30px;
            background: linear-gradient(135deg, #f97316, #ea580c);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            color: white;
            font-weight: 800;
            box-shadow: 0 10px 30px rgba(249, 115, 22, 0.4);
        }

        h1 {
            font-size: 2.5rem;
            color: #2d3748;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .subtitle {
            font-size: 1.2rem;
            color: #f97316;
            margin-bottom: 30px;
            font-weight: 500;
        }

        .description {
            font-size: 1rem;
            color: #4a5568;
            line-height: 1.8;
            margin-bottom: 40px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .feature-card {
            background: linear-gradient(135deg, #f6f8fb 0%, #ffffff 100%);
            padding: 30px;
            border-radius: 20px;
            border: 2px solid #e2e8f0;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(249, 115, 22, 0.2);
            border-color: #f97316;
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #f97316, #ea580c);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
        }

        .feature-title {
            font-size: 1.2rem;
            color: #2d3748;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .feature-text {
            font-size: 0.9rem;
            color: #718096;
            line-height: 1.6;
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 15px 40px;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #f97316, #ea580c);
            color: white;
            box-shadow: 0 10px 30px rgba(249, 115, 22, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(249, 115, 22, 0.5);
        }

        .btn-secondary {
            background: white;
            color: #f97316;
            border: 2px solid #f97316;
        }

        .btn-secondary:hover {
            background: #f97316;
            color: white;
            transform: translateY(-3px);
        }

        .info-section {
            margin-top: 40px;
            padding-top: 40px;
            border-top: 2px solid #e2e8f0;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            text-align: center;
        }

        .info-item {
            padding: 20px;
        }

        .info-number {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #f97316, #ea580c);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 5px;
        }

        .info-label {
            font-size: 0.9rem;
            color: #718096;
            font-weight: 500;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .welcome-card {
                padding: 30px 20px;
            }

            h1 {
                font-size: 2rem;
            }

            .subtitle {
                font-size: 1rem;
            }

            .features {
                grid-template-columns: 1fr;
            }

            .cta-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }

        /* Floating Animation */
        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .logo {
            animation: float 3s ease-in-out infinite;
        }

        /* Back Button */
        .back-button {
            position: fixed;
            top: 30px;
            left: 30px;
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 1000;
            text-decoration: none;
            color: #f97316;
            font-size: 20px;
        }

        .back-button:hover {
            transform: scale(1.1) translateX(-5px);
            box-shadow: 0 8px 30px rgba(249, 115, 22, 0.4);
            background: #f97316;
            color: white;
        }

        .back-button i {
            transition: transform 0.3s ease;
        }

        .back-button:hover i {
            transform: translateX(-3px);
        }
    </style>
</head>
<body>
    <!-- Back Button -->
    <a href="/cv" class="back-button" title="Kembali ke CV">
        <i class="fas fa-arrow-left"></i>
    </a>

    <div class="container">
        <div class="welcome-card">
            <div class="logo">
                <i class="fas fa-graduation-cap"></i>
            </div>

            <h1>Selamat Datang, Mahasiswa!</h1>
            <p class="subtitle">STMIK IKMI CIREBON</p>
            <p class="description">
                Portal mahasiswa untuk mengakses berbagai layanan akademik, informasi kampus, 
                dan mengembangkan potensi diri. Mari bersama-sama meraih prestasi dan 
                membangun masa depan yang cerah!
            </p>

            <div class="features">
                <a href="{{ route('mahasiswa.index') }}" style="text-decoration: none;">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <h3 class="feature-title">Akademik</h3>
                        <p class="feature-text">CRUD Mahasiswa & Relasi</p>
                    </div>
                </a>

                <a href="{{ route('matakuliah.index') }}" style="text-decoration: none;">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <h3 class="feature-title">Mata Kuliah</h3>
                        <p class="feature-text">KelOLA data Mata Kuliah & SKS</p>
                    </div>
                </a>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h3 class="feature-title">Sertifikasi</h3>
                    <p class="feature-text">Ikuti pelatihan dan dapatkan sertifikat kompetensi</p>
                </div>
            </div>

            <div class="cta-buttons">
                <a href="/cv" class="btn btn-primary">
                    <i class="fas fa-user"></i>
                    Lihat Profil CV
                </a>
                <a href="#" class="btn btn-secondary">
                    <i class="fas fa-info-circle"></i>
                    Informasi Lebih Lanjut
                </a>
            </div>

            <div class="info-section">
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-number">{{ $jmlMahasiswa }}</div>
                        <div class="info-label">Mahasiswa Terdaftar</div>
                    </div>
                    <div class="info-item">
                        <div class="info-number">{{ $jmlMataKuliah }}</div>
                        <div class="info-label">Mata Kuliah Tersedia</div>
                    </div>
                    <div class="info-item">
                        <div class="info-number">100%</div>
                        <div class="info-label">Sistem Terintegrasi</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add smooth hover effects
        document.querySelectorAll('.feature-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Add click animation to buttons
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });
    </script>
</body>
</html>
