<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier mon profil - Banque Pro</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #F1F5F9;
            min-height: 100vh;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            color: #0F172A;
        }

        /* --- TOPBAR --- */
        .topbar {
            background: #FFFFFF;
            padding: 20px 40px;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid #E2E8F0;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 32px;
        }

        .menu-toggle {
            width: 40px;
            height: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 6px;
            cursor: pointer;
            padding: 8px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .menu-toggle:hover {
            background: #F8FAFC;
        }

        .menu-toggle span {
            width: 100%;
            height: 2px;
            background: #64748B;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .menu-toggle.active span:nth-child(1) {
            transform: rotate(45deg) translate(7px, 7px);
        }

        .menu-toggle.active span:nth-child(2) {
            opacity: 0;
        }

        .menu-toggle.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -7px);
        }

        .logo-text {
            font-size: 22px;
            font-weight: 800;
            color: #0F172A;
            letter-spacing: -1px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .back-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: #F8FAFC;
            color: #475569;
            border: 1px solid #E2E8F0;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .back-btn:hover {
            background: #FFFFFF;
            border-color: #CBD5E1;
            color: #1E293B;
        }

        /* --- SIDEBAR --- */
        .sidebar {
            width: 280px;
            background: #FFFFFF;
            min-height: calc(100vh - 81px);
            position: fixed;
            left: -280px;
            top: 81px;
            transition: left 0.3s ease;
            z-index: 999;
            box-shadow: 2px 0 8px rgba(15, 23, 42, 0.06);
            border-right: 1px solid #E2E8F0;
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar-menu {
            list-style: none;
            padding: 20px 16px;
        }

        .menu-item {
            margin-bottom: 6px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: #64748B;
            text-decoration: none;
            transition: all 0.2s ease;
            font-size: 14px;
            font-weight: 500;
            border-radius: 8px;
        }

        .menu-link:hover {
            background: #F8FAFC;
            color: #0F172A;
        }

        .menu-link.active {
            background: #0F172A;
            color: #FFFFFF;
            font-weight: 600;
        }

        .menu-icon {
            font-size: 20px;
            width: 24px;
            text-align: center;
        }

        .menu-divider {
            height: 1px;
            background: #E2E8F0;
            margin: 20px 16px;
        }

        .sidebar-overlay {
            position: fixed;
            top: 81px;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(15, 23, 42, 0.5);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 998;
            backdrop-filter: blur(4px);
        }

        .sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* --- MAIN CONTENT --- */
        .main-content {
            padding: 48px 40px;
            transition: margin-left 0.3s ease;
        }

        .main-content.shifted {
            margin-left: 280px;
        }

        .edit-container {
            max-width: 900px;
            margin: 0 auto;
        }

        /* --- BREADCRUMB --- */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 32px;
            font-size: 14px;
            color: #64748B;
        }

        .breadcrumb a {
            color: #64748B;
            text-decoration: none;
            transition: color 0.2s;
        }

        .breadcrumb a:hover {
            color: #0F172A;
        }

        .breadcrumb span {
            color: #CBD5E1;
        }

        .breadcrumb .current {
            color: #0F172A;
            font-weight: 600;
        }

        /* --- HEADER --- */
        .page-header {
            margin-bottom: 32px;
        }

        .page-header h1 {
            font-size: 28px;
            font-weight: 700;
            color: #0F172A;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .page-header p {
            font-size: 15px;
            color: #64748B;
        }

        /* --- FORM CARD --- */
        .form-card {
            background: #FFFFFF;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.08);
            border: 1px solid #E2E8F0;
        }

        .form-section {
            margin-bottom: 40px;
        }

        .form-section:last-child {
            margin-bottom: 0;
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            color: #0F172A;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 1px solid #E2E8F0;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            font-size: 14px;
            font-weight: 600;
            color: #0F172A;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .required {
            color: #EF4444;
        }

        .form-input {
            padding: 12px 16px;
            border: 1px solid #E2E8F0;
            border-radius: 8px;
            font-size: 14px;
            color: #0F172A;
            transition: all 0.2s ease;
            font-family: 'Inter', sans-serif;
        }

        .form-input:focus {
            outline: none;
            border-color: #0F172A;
            box-shadow: 0 0 0 3px rgba(15, 23, 42, 0.1);
        }

        .form-input:disabled {
            background: #F8FAFC;
            color: #94A3B8;
            cursor: not-allowed;
        }

        textarea.form-input {
            min-height: 120px;
            resize: vertical;
        }

        .form-help {
            font-size: 12px;
            color: #64748B;
        }

        /* --- AVATAR UPLOAD --- */
        .avatar-upload {
            display: flex;
            align-items: center;
            gap: 24px;
            padding: 24px;
            background: #F8FAFC;
            border-radius: 12px;
        }

        .avatar-preview {
            width: 80px;
            height: 80px;
            border-radius: 12px;
            background: linear-gradient(135deg, #0F172A 0%, #334155 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            flex-shrink: 0;
        }

        .avatar-info {
            flex: 1;
        }

        .avatar-info h4 {
            font-size: 14px;
            font-weight: 600;
            color: #0F172A;
            margin-bottom: 4px;
        }

        .avatar-info p {
            font-size: 12px;
            color: #64748B;
            margin-bottom: 12px;
        }

        .upload-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: #FFFFFF;
            color: #0F172A;
            border: 1px solid #E2E8F0;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .upload-btn:hover {
            background: #F8FAFC;
            border-color: #CBD5E1;
        }

        /* --- PASSWORD SECTION --- */
        .password-info {
            background: #FEF3C7;
            border: 1px solid #FDE68A;
            padding: 16px;
            border-radius: 8px;
            display: flex;
            align-items: start;
            gap: 12px;
            margin-bottom: 20px;
        }

        .password-info-icon {
            font-size: 20px;
            flex-shrink: 0;
        }

        .password-info-text {
            font-size: 13px;
            color: #78350F;
            line-height: 1.5;
        }

        /* --- FORM ACTIONS --- */
        .form-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-top: 32px;
            border-top: 1px solid #E2E8F0;
            margin-top: 40px;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 32px;
            background: blue;
            color: beige;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            background: dodgerblue;
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(15, 23, 42, 0.2);
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            background: #FFFFFF;
            color: #475569;
            border: 1px solid #E2E8F0;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-secondary:hover {
            background: #F8FAFC;
            border-color: #CBD5E1;
        }

        /* --- ALERTS --- */
        .alert {
            padding: 16px 20px;
            border-radius: 8px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .alert-success {
            background: #ECFDF5;
            border: 1px solid #A7F3D0;
            color: #065F46;
        }

        .alert-error {
            background: #FEF2F2;
            border: 1px solid #FECACA;
            color: #991B1B;
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 24px 16px;
            }

            .main-content.shifted {
                margin-left: 0;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .topbar {
                padding: 16px 20px;
            }

            .form-card {
                padding: 24px;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn-primary,
            .btn-secondary {
                width: 100%;
                justify-content: center;
            }

            .avatar-upload {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>
<body>

<!-- Topbar -->
<div class="topbar">
    <div class="topbar-left">
        <div class="menu-toggle" onclick="toggleSidebar()">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="logo-text">Bankati</div>
    </div>
    <div class="topbar-right">
        <a href="{{ route('admin.profile') }}" class="back-btn">
            <span>←</span>
            <span>Retour au profil</span>
        </a>
    </div>
</div>

<!-- Sidebar Overlay -->
<div class="sidebar-overlay" onclick="toggleSidebar()"></div>

<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
    <ul class="sidebar-menu">
        <li class="menu-item">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <span class="menu-icon">📊</span>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('comptes.index') }}" class="menu-link">
                <span class="menu-icon">💳</span>
                <span>Comptes</span>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('clients.index') }}" class="menu-link">
                <span class="menu-icon">👥</span>
                <span>Clients</span>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('virements.index') }}" class="menu-link">
                <span class="menu-icon">💸</span>
                <span>Virements</span>
            </a>
        </li>
        <div class="menu-divider"></div>
        <li class="menu-item">
            <a href="{{ route('admin.profile') }}" class="menu-link active">
                <span class="menu-icon">👤</span>
                <span>Mon Profil</span>
            </a>
        </li>
    </ul>
</aside>

<!-- Main Content -->
<div class="main-content" id="mainContent">
    <div class="edit-container">
        
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="{{ route('dashboard') }}">Accueil</a>
            <span>/</span>
            <a href="{{ route('admin.profile') }}">Profil</a>
            <span>/</span>
            <span class="current">Modifier</span>
        </div>

        <!-- Header -->
        <div class="page-header">
            <h1>Modifier mon profil</h1>
            <p>Mettez à jour vos informations personnelles et vos paramètres</p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
        <div class="alert alert-success">
            <span>✓</span>
            <span>{{ session('success') }}</span>
        </div>
        @endif

        <!-- Error Messages -->
        @if($errors->any())
        <div class="alert alert-error">
            <span>⚠</span>
            <div>
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Form -->
        <form action="{{ route('admin.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-card">
                
                <!-- Avatar Section -->
                <div class="form-section">
                    <h3 class="section-title">Photo de profil</h3>
                    <div class="avatar-upload">
                        <div class="avatar-preview">👨‍💼</div>
                        <div class="avatar-info">
                            <h4>Changer votre photo</h4>
                            <p>Format JPG, PNG ou GIF. Taille maximale 2MB.</p>
                            <label class="upload-btn">
                                <span>📁</span>
                                <span>Choisir une image</span>
                                <input type="file" name="avatar" accept="image/*" style="display: none;">
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Personal Information -->
                <div class="form-section">
                    <h3 class="section-title">Informations personnelles</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">
                                Nom complet
                                <span class="required">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="name" 
                                class="form-input" 
                                value="{{ old('name', $admin->name ?? '') }}" 
                                required
                                placeholder="Entrez votre nom complet">
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                Adresse email
                                <span class="required">*</span>
                            </label>
                            <input 
                                type="email" 
                                name="email" 
                                class="form-input" 
                                value="{{ old('email', $admin->email ?? '') }}" 
                                required
                                placeholder="votre@email.com">
                        </div>

                      
                        <div class="form-group">
                            <label class="form-label">Rôle</label>
                            <input 
                                type="text" 
                                class="form-input" 
                                value="{{ $admin->role ?? 'Administrateur' }}" 
                                disabled>
                            <span class="form-help">Le rôle ne peut pas être modifié</span>
                        </div>
                    </div>
                </div>

                <!-- Password Section -->
                <div class="form-section">
                    <h3 class="section-title">Modifier le mot de passe</h3>
                    
                    <div class="password-info">
                        <span class="password-info-icon">ℹ️</span>
                        <div class="password-info-text">
                            Laissez les champs vides si vous ne souhaitez pas changer votre mot de passe.
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label class="form-label">Mot de passe actuel</label>
                            <input 
                                type="password" 
                                name="current_password" 
                                class="form-input"
                                placeholder="Entrez votre mot de passe actuel">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Nouveau mot de passe</label>
                            <input 
                                type="password" 
                                name="password" 
                                class="form-input"
                                placeholder="Minimum 8 caractères">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Confirmer le mot de passe</label>
                            <input 
                                type="password" 
                                name="password_confirmation" 
                                class="form-input"
                                placeholder="Retapez le mot de passe">
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="submit" class="btn-primary">
                        <span>💾</span>
                        <span>Enregistrer les modifications</span>
                    </button>
                    <a href="{{ route('admin.profile') }}" class="btn-secondary">
                        <span>✕</span>
                        <span>Annuler</span>
                    </a>
                </div>

            </div>
        </form>

    </div>
</div>

<script>
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.querySelector('.sidebar-overlay');
    const mainContent = document.getElementById('mainContent');
    const menuToggle = document.querySelector('.menu-toggle');
    
    sidebar.classList.toggle('active');
    overlay.classList.toggle('active');
    menuToggle.classList.toggle('active');
    
    if (window.innerWidth > 768) {
        mainContent.classList.toggle('shifted');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    console.log('Page de modification du profil chargée');
});
</script>

</body>
</html>