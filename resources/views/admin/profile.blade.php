<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Administrateur - Banque Pro</title>
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

        .dashboard-btn {
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

        .dashboard-btn:hover {
            background: #FFFFFF;
            border-color: #CBD5E1;
            color: #1E293B;
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: #0F172A;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .logout-btn:hover {
            background: #1E293B;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.2);
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

        .profile-container {
            max-width: 1400px;
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
        .profile-header {
            background: #FFFFFF;
            border-radius: 16px;
            padding: 40px;
            margin-bottom: 32px;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.08);
            border: 1px solid #E2E8F0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .profile-header-left {
            display: flex;
            align-items: center;
            gap: 32px;
        }

        .profile-avatar-large {
            width: 100px;
            height: 100px;
            border-radius: 16px;
            background: linear-gradient(135deg, #0F172A 0%, #334155 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.15);
            position: relative;
        }

        .profile-avatar-large::after {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: 16px;
            background: linear-gradient(135deg, #0F172A, #334155);
            z-index: -1;
        }

        .profile-info {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .profile-name-large {
            font-size: 28px;
            font-weight: 700;
            color: #0F172A;
            letter-spacing: -0.5px;
        }

        .profile-subtitle {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 15px;
            color: #64748B;
        }

        .profile-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #0F172A;
            color: #FFFFFF;
            padding: 4px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        .edit-profile-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            background: #0F172A;
            color: #FFFFFF;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .edit-profile-btn:hover {
            background: #1E293B;
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(15, 23, 42, 0.2);
        }

        /* --- GRID LAYOUT --- */
        .profile-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 24px;
            margin-bottom: 32px;
        }

        /* --- STAT CARD --- */
        .stat-mini-card {
            background: #FFFFFF;
            border-radius: 12px;
            padding: 28px;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.08);
            border: 1px solid #E2E8F0;
            transition: all 0.3s ease;
        }

        .stat-mini-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(15, 23, 42, 0.1);
        }

        .stat-mini-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .stat-mini-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            background: #F8FAFC;
        }

        .stat-mini-change {
            font-size: 12px;
            font-weight: 600;
            color: #10B981;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .stat-mini-change.negative {
            color: #EF4444;
        }

        .stat-mini-value {
            font-size: 32px;
            font-weight: 700;
            color: #0F172A;
            margin-bottom: 4px;
        }

        .stat-mini-label {
            font-size: 13px;
            color: #64748B;
            font-weight: 500;
        }

        /* --- TWO COLUMN LAYOUT --- */
        .two-col-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 24px;
        }

        /* --- INFO SECTION --- */
        .info-section {
            background: #FFFFFF;
            border-radius: 12px;
            padding: 32px;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.08);
            border: 1px solid #E2E8F0;
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
            padding-bottom: 20px;
            border-bottom: 1px solid #E2E8F0;
        }

        .section-title {
            font-size: 18px;
            font-weight: 700;
            color: #0F172A;
        }

        .section-action {
            font-size: 13px;
            color: #64748B;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }

        .section-action:hover {
            color: #0F172A;
        }

        .info-row {
            display: grid;
            grid-template-columns: 140px 1fr;
            gap: 20px;
            padding: 16px 0;
            border-bottom: 1px solid #F1F5F9;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-size: 13px;
            font-weight: 600;
            color: #64748B;
        }

        .info-value {
            font-size: 14px;
            color: #0F172A;
            font-weight: 500;
        }

        /* --- ACTIVITY SECTION --- */
        .activity-list {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .activity-item {
            display: flex;
            align-items: start;
            gap: 16px;
            padding: 16px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .activity-item:hover {
            background: #F8FAFC;
        }

        .activity-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #0F172A;
            margin-top: 6px;
            flex-shrink: 0;
        }

        .activity-content {
            flex: 1;
        }

        .activity-text {
            font-size: 14px;
            color: #0F172A;
            font-weight: 500;
            margin-bottom: 4px;
        }

        .activity-time {
            font-size: 12px;
            color: #94A3B8;
        }

        /* --- SECURITY SECTION --- */
        .security-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            background: #F8FAFC;
            border-radius: 10px;
            margin-bottom: 12px;
        }

        .security-item:last-child {
            margin-bottom: 0;
        }

        .security-info {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .security-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .security-text h4 {
            font-size: 14px;
            font-weight: 600;
            color: #0F172A;
            margin-bottom: 2px;
        }

        .security-text p {
            font-size: 12px;
            color: #64748B;
        }

        .security-status {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            font-weight: 600;
            color: #10B981;
        }

        .security-status.warning {
            color: #F59E0B;
        }

        @media (max-width: 1200px) {
            .profile-grid {
                grid-template-columns: 1fr 1fr;
            }

            .two-col-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 24px 16px;
            }

            .main-content.shifted {
                margin-left: 0;
            }

            .profile-grid {
                grid-template-columns: 1fr;
            }

            .profile-header {
                flex-direction: column;
                gap: 24px;
            }

            .profile-header-left {
                flex-direction: column;
                text-align: center;
            }

            .topbar {
                padding: 16px 20px;
            }

            .info-row {
                grid-template-columns: 1fr;
                gap: 8px;
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
        <a href="{{ route('dashboard') }}" class="dashboard-btn">
            <span>📊</span>
            <span>Dashboard</span>
        </a>
        <a href="{{ route('login') }}" class="logout-btn">
            <span>↗</span>
            <span>Déconnexion</span>
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
    <div class="profile-container">
        
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="{{ route('dashboard') }}">Accueil</a>
            <span>/</span>
            <span class="current">Profil Administrateur</span>
        </div>

        <!-- Profile Header -->
        <div class="profile-header">
            <div class="profile-header-left">
                <div class="profile-avatar-large">👨‍💼</div>
                <div class="profile-info">
                    <h1 class="profile-name-large">{{ $admin->name ?? 'Administrateur' }}</h1>
                    <div class="profile-subtitle">
                        <span class="profile-badge">
                            <span>⚡</span>
                            Administrateur Principal
                        </span>
                        <span>{{ $admin->email ?? 'admin@bankati.com' }}</span>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.edit') }}" class="edit-profile-btn">
                <span>✏️</span>
                <span>Modifier le profil</span>
            </a>
        </div>

        <!-- Stats Grid -->
        <div class="profile-grid">
            <div class="stat-mini-card">
                <div class="stat-mini-header">
                    <div class="stat-mini-icon">💳</div>
                    <div class="stat-mini-change">
                        <span>↗</span>
                        <span>+12%</span>
                    </div>
                </div>
                <div class="stat-mini-value">{{ $comptesCount ?? 0 }}</div>
                <div class="stat-mini-label">Comptes Gérés</div>
            </div>

            <div class="stat-mini-card">
                <div class="stat-mini-header">
                    <div class="stat-mini-icon">👥</div>
                    <div class="stat-mini-change">
                        <span>↗</span>
                        <span>+8%</span>
                    </div>
                </div>
                <div class="stat-mini-value">{{ $clientsCount ?? 0 }}</div>
                <div class="stat-mini-label">Clients Actifs</div>
            </div>

            <div class="stat-mini-card">
                <div class="stat-mini-header">
                    <div class="stat-mini-icon">💸</div>
                    <div class="stat-mini-change">
                        <span>↗</span>
                        <span>+15%</span>
                    </div>
                </div>
                <div class="stat-mini-value">{{ $virementsCount ?? 0 }}</div>
                <div class="stat-mini-label">Virements Traités</div>
            </div>
        </div>

        <!-- Two Column Layout -->
        <div class="two-col-grid">
            <!-- Information Section -->
            <div class="info-section">
                <div class="section-header">
                    <h2 class="section-title">Informations Personnelles</h2>
                    <a href="{{ route('admin.edit') }}" class="edit-profile-btn">Modifier →</a>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Nom complet</div>
                    <div class="info-value">{{ $admin->name ?? 'Non renseigné' }}</div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Adresse email</div>
                    <div class="info-value">{{ $admin->email ?? 'Non renseigné' }}</div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Téléphone</div>
                    <div class="info-value">{{ $admin->phone ?? '+212 6XX XXX XXX' }}</div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Rôle</div>
                    <div class="info-value">{{ $admin->role ?? 'Administrateur Principal' }}</div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Date de création</div>
                    <div class="info-value">{{ $admin->created_at ? $admin->created_at->format('d F Y') : 'Non disponible' }}</div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Dernière connexion</div>
                    <div class="info-value">{{ $admin->last_login ? $admin->last_login->format('d/m/Y à H:i') : 'Aujourd\'hui' }}</div>
                </div>
            </div>

            <!-- Activity Section -->
            <div class="info-section">
                <div class="section-header">
                    <h2 class="section-title">Activité Récente</h2>
                    <a href="#" class="section-action">Voir tout →</a>
                </div>
                
                <div class="activity-list">
                    <div class="activity-item">
                        <div class="activity-dot"></div>
                        <div class="activity-content">
                            <div class="activity-text">Connexion au système</div>
                            <div class="activity-time">Aujourd'hui à 09:24</div>
                        </div>
                    </div>
                    
                    <div class="activity-item">
                        <div class="activity-dot"></div>
                        <div class="activity-content">
                            <div class="activity-text">Validation d'un compte bancaire</div>
                            <div class="activity-time">Hier à 16:45</div>
                        </div>
                    </div>
                    
                    <div class="activity-item">
                        <div class="activity-dot"></div>
                        <div class="activity-content">
                            <div class="activity-text">Ajout d'un nouveau client</div>
                            <div class="activity-time">Il y a 2 jours</div>
                        </div>
                    </div>
                    
                    <div class="activity-item">
                        <div class="activity-dot"></div>
                        <div class="activity-content">
                            <div class="activity-text">Modification des paramètres</div>
                            <div class="activity-time">Il y a 3 jours</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Security Section -->
        <div class="info-section" style="margin-top: 24px;">
            <div class="section-header">
                <h2 class="section-title">Sécurité & Accès</h2>
            </div>
            
            <div class="security-item">
                <div class="security-info">
                    <div class="security-icon">🔒</div>
                    <div class="security-text">
                        <h4>Mot de passe</h4>
                        <p>Dernière modification il y a 30 jours</p>
                    </div>
                </div>
                <div class="security-status">
                    <span>●</span>
                    <span>Sécurisé</span>
                </div>
            </div>
            
            <div class="security-item">
                <div class="security-info">
                    <div class="security-icon">📱</div>
                    <div class="security-text">
                        <h4>Authentification à deux facteurs</h4>
                        <p>Protégez votre compte avec 2FA</p>
                    </div>
                </div>
                <div class="security-status warning">
                    <span>●</span>
                    <span>Non activé</span>
                </div>
            </div>
            
            <div class="security-item">
                <div class="security-info">
                    <div class="security-icon">🌐</div>
                    <div class="security-text">
                        <h4>Sessions actives</h4>
                        <p>1 appareil connecté</p>
                    </div>
                </div>
                <div class="security-status">
                    <span>●</span>
                    <span>Normal</span>
                </div>
            </div>
        </div>

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
    console.log('Page profil administrateur chargée');
});
</script>

</body>
</html>