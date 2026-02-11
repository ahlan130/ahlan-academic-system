<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - {{ $nama }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --dark-bg: #0f0f1e;
            --card-bg: rgba(255, 255, 255, 0.05);
            --card-border: rgba(255, 255, 255, 0.1);
            --text-primary: #ffffff;
            --text-secondary: #b4b4c8;
            --shadow-glow: 0 8px 32px rgba(102, 126, 234, 0.3);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--dark-bg);
            color: var(--text-primary);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Animated Background */
        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: linear-gradient(135deg, #0f0f1e 0%, #1a1a2e 100%);
        }

        .animated-bg::before,
        .animated-bg::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.3;
            animation: float 20s infinite ease-in-out;
        }

        .animated-bg::before {
            width: 500px;
            height: 500px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            top: -100px;
            right: -100px;
            animation-delay: 0s;
        }

        .animated-bg::after {
            width: 400px;
            height: 400px;
            background: linear-gradient(135deg, #f093fb, #f5576c);
            bottom: -100px;
            left: -100px;
            animation-delay: 10s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(100px, -100px) scale(1.1); }
            66% { transform: translate(-100px, 100px) scale(0.9); }
        }

        /* Header Section */
        .header {
            padding: 40px 20px 30px;
            text-align: center;
            position: relative;
        }

        .profile-container {
            position: relative;
            display: inline-block;
            margin-bottom: 20px;
        }

        .profile-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            font-weight: 800;
            color: white;
            box-shadow: var(--shadow-glow);
            position: relative;
            animation: pulse 3s infinite;
            font-family: 'Poppins', sans-serif;
        }

        @keyframes pulse {
            0%, 100% { box-shadow: 0 0 40px rgba(102, 126, 234, 0.5); }
            50% { box-shadow: 0 0 60px rgba(102, 126, 234, 0.8); }
        }

        .profile-ring {
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            border: 3px solid transparent;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2, #f093fb) border-box;
            -webkit-mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
            mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            animation: rotate 4s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .profile-upload-btn {
            position: absolute;
            bottom: 5px;
            right: 5px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--accent-gradient);
            border: 3px solid var(--dark-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10;
            box-shadow: 0 4px 15px rgba(79, 172, 254, 0.4);
        }

        .profile-upload-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 25px rgba(79, 172, 254, 0.6);
        }

        .profile-upload-btn i {
            font-size: 1.2rem;
            color: white;
        }

        /* Welcome Page Navigation Button */
        .welcome-nav-btn {
            position: fixed;
            top: 30px;
            right: 30px;
            padding: 12px 25px;
            background: var(--primary-gradient);
            border-radius: 50px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
            text-decoration: none;
            font-weight: 600;
            box-shadow: var(--shadow-glow);
            z-index: 1000;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            border: 1px solid var(--card-border);
        }

        .welcome-nav-btn:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 12px 40px rgba(102, 126, 234, 0.5);
        }

        .welcome-nav-btn i {
            font-size: 1.1rem;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.3s ease;
        }

        .modal.active {
            display: flex;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .modal-content {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 25px;
            padding: 40px;
            max-width: 500px;
            width: 90%;
            backdrop-filter: blur(20px);
            position: relative;
            animation: slideUp 0.3s ease;
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

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .modal-header h3 {
            font-size: 1.8rem;
            font-weight: 700;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .modal-close {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            color: var(--text-primary);
            font-size: 1.5rem;
        }

        .modal-close:hover {
            background: rgba(255, 0, 0, 0.2);
            transform: rotate(90deg);
        }

        .upload-area {
            border: 2px dashed var(--card-border);
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .upload-area:hover {
            border-color: rgba(102, 126, 234, 0.5);
            background: rgba(102, 126, 234, 0.05);
        }

        .upload-area.dragover {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.1);
        }

        .upload-icon {
            font-size: 4rem;
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 15px;
        }

        .upload-text {
            font-size: 1.1rem;
            color: var(--text-secondary);
            margin-bottom: 10px;
        }

        .upload-hint {
            font-size: 0.9rem;
            color: var(--text-secondary);
            opacity: 0.7;
        }

        #photoInput {
            display: none;
        }

        .preview-container {
            display: none;
            margin-bottom: 20px;
        }

        .preview-container.active {
            display: block;
        }

        .preview-image {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            margin: 0 auto 20px;
            overflow: hidden;
            border: 3px solid var(--card-border);
        }

        .preview-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .button-group {
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .btn {
            padding: 12px 30px;
            border-radius: 50px;
            border: none;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-primary {
            background: var(--primary-gradient);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(102, 126, 234, 0.5);
        }

        .btn-danger {
            background: var(--secondary-gradient);
            color: white;
            box-shadow: 0 4px 15px rgba(240, 147, 251, 0.3);
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(240, 147, 251, 0.5);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: var(--text-primary);
            border: 1px solid var(--card-border);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        .btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Toast Notification */
        .toast {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 15px;
            padding: 20px 25px;
            backdrop-filter: blur(20px);
            box-shadow: var(--shadow-glow);
            display: flex;
            align-items: center;
            gap: 15px;
            transform: translateX(400px);
            transition: transform 0.3s ease;
            z-index: 2000;
        }

        .toast.show {
            transform: translateX(0);
        }

        .toast.success {
            border-left: 4px solid #4caf50;
        }

        .toast.error {
            border-left: 4px solid #f44336;
        }

        .toast-icon {
            font-size: 1.5rem;
        }

        .toast.success .toast-icon {
            color: #4caf50;
        }

        .toast.error .toast-icon {
            color: #f44336;
        }

        .toast-message {
            font-size: 1rem;
            color: var(--text-primary);
        }

        .name {
            font-family: 'Poppins', sans-serif;
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea, #f093fb);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 8px;
            letter-spacing: -1px;
        }

        .title {
            font-size: 1.1rem;
            color: var(--text-secondary);
            font-weight: 500;
            margin-bottom: 20px;
        }

        .quick-info {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .quick-info-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 18px;
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 50px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .quick-info-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-glow);
            border-color: rgba(102, 126, 234, 0.5);
        }

        .quick-info-item i {
            font-size: 1.2rem;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Container */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px 40px;
        }

        /* 2 Column Grid Layout */
        .content-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 35px;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        /* Section */
        .section {
            margin-bottom: 0;
            animation: fadeInUp 0.8s ease-out;
        }

        .section.standalone {
            margin-bottom: 35px;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section-title {
            font-family: 'Poppins', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-title i {
            font-size: 1.5rem;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .section-title::after {
            content: '';
            flex: 1;
            height: 2px;
            background: linear-gradient(90deg, rgba(102, 126, 234, 0.5) 0%, transparent 100%);
        }

        /* Cards */
        .card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 20px;
            padding: 20px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-glow);
            border-color: rgba(102, 126, 234, 0.5);
        }

        .card:hover::before {
            transform: scaleX(1);
        }

        /* Education */
        .education-item {
            display: flex;
            gap: 20px;
            align-items: start;
        }

        .education-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .education-content h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .education-content .institution {
            color: var(--text-secondary);
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .education-content .year {
            display: inline-block;
            padding: 5px 15px;
            background: rgba(102, 126, 234, 0.2);
            border-radius: 20px;
            font-size: 0.9rem;
            margin-top: 10px;
        }

        .education-content .status {
            display: inline-block;
            padding: 5px 15px;
            background: rgba(76, 175, 80, 0.2);
            border: 1px solid rgba(76, 175, 80, 0.3);
            border-radius: 20px;
            font-size: 0.9rem;
            margin-left: 10px;
            color: #4caf50;
        }

        /* Skills */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }

        .skill-category {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 20px;
            padding: 25px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .skill-category:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-glow);
            border-color: rgba(102, 126, 234, 0.5);
        }

        .skill-category h3 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .skill-category h3 i {
            font-size: 1.5rem;
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .skill-item {
            padding: 12px 20px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 10px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }

        .skill-item:hover {
            background: rgba(102, 126, 234, 0.1);
            transform: translateX(10px);
        }

        .skill-item::before {
            content: '▸';
            color: #667eea;
            font-weight: bold;
        }

        /* Contact */
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .contact-item {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 15px;
            padding: 25px;
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: all 0.3s ease;
        }

        .contact-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-glow);
            border-color: rgba(102, 126, 234, 0.5);
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: var(--secondary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .contact-content h4 {
            font-size: 0.9rem;
            color: var(--text-secondary);
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .contact-content p {
            font-size: 1.1rem;
            font-weight: 500;
            word-break: break-word;
        }

        .contact-content a {
            color: var(--text-primary);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .contact-content a:hover {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Business Card */
        .business-card {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            border: 2px solid rgba(102, 126, 234, 0.3);
            border-radius: 20px;
            padding: 25px;
            text-align: center;
            margin-top: 25px;
            position: relative;
            overflow: hidden;
        }

        .business-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.05), transparent);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }

        .business-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 8px;
            background: var(--secondary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .business-card p {
            font-size: 1rem;
            color: var(--text-secondary);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .name {
                font-size: 2rem;
            }

            .title {
                font-size: 1rem;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .quick-info {
                gap: 10px;
            }

            .content-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .skills-grid,
            .contact-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Print Styles */
        @media print {
            .animated-bg {
                display: none;
            }

            body {
                background: white;
                color: black;
            }

            .card, .skill-category, .contact-item {
                break-inside: avoid;
            }
        }
    </style>
</head>
<body>
    <div class="animated-bg"></div>

    <!-- Navigation to Welcome Page -->
    <a href="/welcome-mahasiswa" class="welcome-nav-btn">
        <span>Ke Halaman Welcome</span>
        <i class="fas fa-chevron-right"></i>
    </a>

    <!-- Header Section -->
    <header class="header">
        <div class="profile-container">
            <div class="profile-ring"></div>
            <div class="profile-image" id="profileImage">
                @if($profilePhoto)
                    <img src="{{ $profilePhoto }}" alt="{{ $nama }}">
                @else
                    AR
                @endif
            </div>
            <button class="profile-upload-btn" id="uploadBtn" title="Ubah Foto Profil">
                <i class="fas fa-camera"></i>
            </button>
        </div>
        <h1 class="name">{{ $nama }}</h1>
        <p class="title">{{ $prodi }} - {{ $study }}</p>
        
        <div class="quick-info">
            <div class="quick-info-item">
                <i class="fas fa-graduation-cap"></i>
                <span>Angkatan {{ $angkatan }}</span>
            </div>
            <div class="quick-info-item">
                <i class="fas fa-briefcase"></i>
                <span>Entrepreneur</span>
            </div>
            <div class="quick-info-item">
                <i class="fas fa-map-marker-alt"></i>
                <span>Cirebon, Indonesia</span>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <!-- Row 1: Data Diri & Pendidikan -->
        <div class="content-grid">
            <!-- About Section -->
            <section class="section">
                <h2 class="section-title">
                    <i class="fas fa-user"></i>
                    Data Diri
                </h2>
                <div class="card">
                    <div class="education-item">
                        <div class="education-icon">
                            <i class="fas fa-id-card"></i>
                        </div>
                        <div class="education-content">
                            <h3>{{ $nama }}</h3>
                            <p class="institution">{{ $prodi }}</p>
                            <p style="color: var(--text-secondary); margin-top: 15px; line-height: 1.8;">
                                Mahasiswa aktif di {{ $study }} dengan fokus pada bidang {{ $prodi }}. 
                                Memiliki jiwa kewirausahaan yang kuat dan berpengalaman dalam mengelola bisnis distribusi.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Education Section -->
            <section class="section">
                <h2 class="section-title">
                    <i class="fas fa-graduation-cap"></i>
                    Pendidikan
                </h2>
                @foreach($pendidikan as $edu)
                <div class="card">
                    <div class="education-item">
                        <div class="education-icon">
                            <i class="fas fa-university"></i>
                        </div>
                        <div class="education-content">
                            <h3>{{ $edu['jurusan'] }}</h3>
                            <p class="institution">{{ $edu['institusi'] }}</p>
                            <div style="margin-top: 10px;">
                                <span class="year">{{ $edu['tahun'] }}</span>
                                <span class="status">{{ $edu['status'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </section>
        </div>

        <!-- Row 2: Skills (Full Width) -->
        <section class="section standalone">
            <h2 class="section-title">
                <i class="fas fa-star"></i>
                Keahlian
            </h2>
            <div class="skills-grid">
                @foreach($keahlian as $kategori => $skills)
                <div class="skill-category">
                    <h3>
                        @if($kategori == 'Bisnis & Manajemen')
                            <i class="fas fa-chart-line"></i>
                        @elseif($kategori == 'Teknologi Informasi')
                            <i class="fas fa-laptop-code"></i>
                        @else
                            <i class="fas fa-lightbulb"></i>
                        @endif
                        {{ $kategori }}
                    </h3>
                    @foreach($skills as $skill)
                    <div class="skill-item">{{ $skill }}</div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </section>

        <!-- Row 3: Contact -->
        <section class="section standalone">
            <h2 class="section-title">
                <i class="fas fa-envelope"></i>
                Kontak
            </h2>
            <div class="contact-grid">
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="contact-content">
                        <h4>Telepon</h4>
                        <p><a href="tel:{{ $phone }}">{{ $phone }}</a></p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="contact-content">
                        <h4>Email</h4>
                        <p><a href="mailto:{{ $email }}">{{ $email }}</a></p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="contact-content">
                        <h4>Alamat</h4>
                        <p>{{ $alamat }}</p>
                    </div>
                </div>
            </div>

            <!-- Business Card -->
            <div class="business-card">
                <h3>{{ $bisnis }}</h3>
                <p>Distributor Minuman Kemasan Terpercaya</p>
            </div>
        </section>
    </div>

    <!-- Upload Photo Modal -->
    <div class="modal" id="uploadModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-camera"></i> Ubah Foto Profil</h3>
                <button class="modal-close" id="closeModal">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="upload-area" id="uploadArea">
                <div class="upload-icon">
                    <i class="fas fa-cloud-upload-alt"></i>
                </div>
                <p class="upload-text">Klik atau seret foto ke sini</p>
                <p class="upload-hint">Format: JPG, PNG, GIF (Max: 2MB)</p>
            </div>

            <input type="file" id="photoInput" accept="image/*">

            <div class="preview-container" id="previewContainer">
                <div class="preview-image" id="previewImage"></div>
            </div>

            <div class="button-group">
                <button class="btn btn-secondary" id="cancelBtn">
                    <i class="fas fa-times"></i> Batal
                </button>
                <button class="btn btn-primary" id="uploadPhotoBtn" disabled>
                    <i class="fas fa-upload"></i> Upload
                </button>
                @if($profilePhoto)
                <button class="btn btn-danger" id="deletePhotoBtn">
                    <i class="fas fa-trash"></i> Hapus Foto
                </button>
                @endif
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div class="toast" id="toast">
        <div class="toast-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="toast-message" id="toastMessage"></div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        // Smooth scroll animation
        document.addEventListener('DOMContentLoaded', function() {
            const sections = document.querySelectorAll('.section');
            
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -100px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            sections.forEach(section => {
                section.style.opacity = '0';
                section.style.transform = 'translateY(30px)';
                section.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
                observer.observe(section);
            });

            // Add parallax effect to background
            document.addEventListener('mousemove', function(e) {
                const moveX = (e.clientX - window.innerWidth / 2) * 0.01;
                const moveY = (e.clientY - window.innerHeight / 2) * 0.01;
                
                const bgElement = document.querySelector('.animated-bg');
                if (bgElement) {
                    bgElement.style.setProperty('--move-x', moveX + 'px');
                    bgElement.style.setProperty('--move-y', moveY + 'px');
                }
            });

            // Photo Upload Functionality
            const uploadBtn = document.getElementById('uploadBtn');
            const uploadModal = document.getElementById('uploadModal');
            const closeModal = document.getElementById('closeModal');
            const cancelBtn = document.getElementById('cancelBtn');
            const uploadArea = document.getElementById('uploadArea');
            const photoInput = document.getElementById('photoInput');
            const previewContainer = document.getElementById('previewContainer');
            const previewImage = document.getElementById('previewImage');
            const uploadPhotoBtn = document.getElementById('uploadPhotoBtn');
            const deletePhotoBtn = document.getElementById('deletePhotoBtn');
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toastMessage');
            const profileImage = document.getElementById('profileImage');

            let selectedFile = null;

            // Open modal
            uploadBtn.addEventListener('click', () => {
                uploadModal.classList.add('active');
            });

            // Close modal
            function closeUploadModal() {
                uploadModal.classList.remove('active');
                resetUpload();
            }

            closeModal.addEventListener('click', closeUploadModal);
            cancelBtn.addEventListener('click', closeUploadModal);

            // Click outside to close
            uploadModal.addEventListener('click', (e) => {
                if (e.target === uploadModal) {
                    closeUploadModal();
                }
            });

            // Click upload area
            uploadArea.addEventListener('click', () => {
                photoInput.click();
            });

            // File input change
            photoInput.addEventListener('change', (e) => {
                handleFile(e.target.files[0]);
            });

            // Drag and drop
            uploadArea.addEventListener('dragover', (e) => {
                e.preventDefault();
                uploadArea.classList.add('dragover');
            });

            uploadArea.addEventListener('dragleave', () => {
                uploadArea.classList.remove('dragover');
            });

            uploadArea.addEventListener('drop', (e) => {
                e.preventDefault();
                uploadArea.classList.remove('dragover');
                handleFile(e.dataTransfer.files[0]);
            });

            // Handle file
            function handleFile(file) {
                if (!file) return;

                // Validate file type
                if (!file.type.startsWith('image/')) {
                    showToast('error', 'File harus berupa gambar!');
                    return;
                }

                // Validate file size (2MB)
                if (file.size > 2 * 1024 * 1024) {
                    showToast('error', 'Ukuran file maksimal 2MB!');
                    return;
                }

                selectedFile = file;

                // Show preview
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewImage.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                    previewContainer.classList.add('active');
                    uploadPhotoBtn.disabled = false;
                };
                reader.readAsDataURL(file);
            }

            // Upload photo
            uploadPhotoBtn.addEventListener('click', async () => {
                if (!selectedFile) return;

                uploadPhotoBtn.disabled = true;
                uploadPhotoBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Uploading...';

                const formData = new FormData();
                formData.append('profile_photo', selectedFile);

                try {
                    const response = await fetch('/cv/upload-photo', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: formData
                    });

                    const data = await response.json();

                    if (data.success) {
                        // Update profile image
                        profileImage.innerHTML = `<img src="${data.photo_url}" alt="Profile">`;
                        showToast('success', data.message);
                        closeUploadModal();
                        
                        // Reload page after 1 second to update delete button
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else {
                        showToast('error', data.message);
                        uploadPhotoBtn.disabled = false;
                        uploadPhotoBtn.innerHTML = '<i class="fas fa-upload"></i> Upload';
                    }
                } catch (error) {
                    showToast('error', 'Terjadi kesalahan saat upload!');
                    uploadPhotoBtn.disabled = false;
                    uploadPhotoBtn.innerHTML = '<i class="fas fa-upload"></i> Upload';
                }
            });

            // Delete photo
            if (deletePhotoBtn) {
                deletePhotoBtn.addEventListener('click', async () => {
                    if (!confirm('Apakah Anda yakin ingin menghapus foto profil?')) {
                        return;
                    }

                    deletePhotoBtn.disabled = true;
                    deletePhotoBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menghapus...';

                    try {
                        const response = await fetch('/cv/delete-photo', {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Content-Type': 'application/json'
                            }
                        });

                        const data = await response.json();

                        if (data.success) {
                            profileImage.innerHTML = 'AR';
                            showToast('success', data.message);
                            closeUploadModal();
                            
                            // Reload page after 1 second
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        } else {
                            showToast('error', data.message);
                            deletePhotoBtn.disabled = false;
                            deletePhotoBtn.innerHTML = '<i class="fas fa-trash"></i> Hapus Foto';
                        }
                    } catch (error) {
                        showToast('error', 'Terjadi kesalahan saat menghapus foto!');
                        deletePhotoBtn.disabled = false;
                        deletePhotoBtn.innerHTML = '<i class="fas fa-trash"></i> Hapus Foto';
                    }
                });
            }

            // Reset upload
            function resetUpload() {
                selectedFile = null;
                photoInput.value = '';
                previewContainer.classList.remove('active');
                previewImage.innerHTML = '';
                uploadPhotoBtn.disabled = true;
                uploadPhotoBtn.innerHTML = '<i class="fas fa-upload"></i> Upload';
            }

            // Show toast
            function showToast(type, message) {
                toast.className = 'toast ' + type;
                toastMessage.textContent = message;
                
                const icon = toast.querySelector('.toast-icon i');
                if (type === 'success') {
                    icon.className = 'fas fa-check-circle';
                } else {
                    icon.className = 'fas fa-exclamation-circle';
                }

                toast.classList.add('show');

                setTimeout(() => {
                    toast.classList.remove('show');
                }, 3000);
            }
        });
    </script>
</body>
</html>
