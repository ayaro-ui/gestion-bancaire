<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Banque Pro</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* --- RESET --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* --- BACKGROUND --- */
        body {
            background: #F8FAFC;
            min-height: 100vh;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            color: #1E293B;
        }

        /* --- TOPBAR --- */
        .topbar {
            background: #FFFFFF;
            padding: 16px 32px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
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
            gap: 24px;
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
            background: #F1F5F9;
        }

        .menu-toggle span {
            width: 100%;
            height: 2px;
            background: #475569;
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

        .topbar-logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-text {
            font-size: 18px;
            font-weight: 700;
            color: #1E293B;
            letter-spacing: -0.5px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: #1E40AF;
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
            background: #1E3A8A;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(30, 64, 175, 0.25);
            color: white;
        }

        .admin-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: #FFFFFF;
            color: #1E40AF;
            border: 2px solid #1E40AF;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .admin-btn:hover {
            background: #EFF6FF;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(30, 64, 175, 0.15);
            color: #1E40AF;
        }

        .logout-icon {
            font-size: 16px;
        }

        /* --- SIDEBAR --- */
        .sidebar {
            width: 280px;
            background: #FFFFFF;
            min-height: calc(100vh - 73px);
            position: fixed;
            left: -280px;
            top: 73px;
            transition: left 0.3s ease;
            z-index: 999;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.06);
            border-right: 1px solid #E2E8F0;
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar-menu {
            list-style: none;
            padding: 16px 12px;
        }

        .menu-item {
            margin-bottom: 4px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: #475569;
            text-decoration: none;
            transition: all 0.2s ease;
            font-size: 14px;
            font-weight: 500;
            border-radius: 8px;
        }

        .menu-link:hover {
            background: #F1F5F9;
            color: #1E40AF;
        }

        .menu-link.active {
            background: #EFF6FF;
            color: #1E40AF;
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
            margin: 16px 12px;
        }

        /* --- OVERLAY --- */
        .sidebar-overlay {
            position: fixed;
            top: 73px;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 998;
        }

        .sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* --- MAIN CONTENT --- */
        .main-content {
            padding: 40px 32px;
            transition: margin-left 0.3s ease;
        }

        .main-content.shifted {
            margin-left: 280px;
        }

        /* --- HEADER --- */
        .dashboard-header {
            margin-bottom: 40px;
        }

        .dashboard-header h1 {
            color: #0F172A;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .dashboard-header p {
            color: #64748B;
            font-size: 16px;
            font-weight: 400;
        }

        /* --- CONTAINER --- */
        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* --- CARDS GRID --- */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
            gap: 24px;
        }

        /* --- CARD STYLING --- */
        .stat-card {
            background: #FFFFFF;
            border-radius: 12px;
            padding: 28px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            position: relative;
            border: 1px solid #E2E8F0;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
            border-color: var(--card-color);
        }

        .stat-card.royal {
            --card-color: #1E40AF;
            --card-light: #EFF6FF;
        }

        .stat-card.turquoise {
            --card-color: #0891B2;
            --card-light: #ECFEFF;
        }

        .stat-card.night {
            --card-color: #4F46E5;
            --card-light: #EEF2FF;
        }

        .card-header-custom {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .card-icon-wrapper {
            width: 56px;
            height: 56px;
            border-radius: 12px;
            background: var(--card-light);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-icon {
            font-size: 28px;
        }

        .card-badge {
            background: var(--card-light);
            color: var(--card-color);
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .card-title-custom {
            font-size: 14px;
            font-weight: 600;
            color: #64748B;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .card-stat {
            font-size: 40px;
            font-weight: 700;
            color: #0F172A;
            margin-bottom: 8px;
            line-height: 1;
        }

        .card-label {
            font-size: 14px;
            color: #64748B;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .stats-trend {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            font-weight: 600;
            color: #10B981;
            margin-bottom: 20px;
        }

        .card-metric-bar {
            width: 100%;
            height: 4px;
            background: #F1F5F9;
            border-radius: 2px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .card-metric-fill {
            height: 100%;
            background: var(--card-color);
            border-radius: 2px;
            transition: width 1s ease-out;
        }

        .stat-card:nth-child(1) .card-metric-fill {
            width: 85%;
        }

        .stat-card:nth-child(2) .card-metric-fill {
            width: 72%;
        }

        .stat-card:nth-child(3) .card-metric-fill {
            width: 93%;
        }

        .btn-card {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 24px;
            background: var(--card-color);
            color: #FFFFFF;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s ease;
            width: 100%;
        }

        .btn-card:hover {
            opacity: 0.9;
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            color: #FFFFFF;
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 24px 16px;
            }

            .main-content.shifted {
                margin-left: 0;
            }

            .dashboard-header h1 {
                font-size: 24px;
            }

            .cards-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .topbar {
                padding: 16px;
            }

            .admin-btn span:last-child,
            .logout-btn span:last-child {
                display: none;
            }

            .admin-btn,
            .logout-btn {
                padding: 10px 12px;
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
        <div class="topbar-logo">
            <div class="logo-text">Bankati</div>
        </div>
    </div>
    <div class="topbar-right">
        <a href="{{ route('admin.profile') }}" class="admin-btn">
            <span class="logout-icon">⚙️</span>
            <span>Administration</span>
        </a>
        <a href="{{ route('login') }}" class="logout-btn">
            <span class="logout-icon">↗</span>
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
            <a href="{{ route('dashboard') }}" class="menu-link active">
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
    </ul>
</aside>

<!-- Main Content -->
<div class="main-content" id="mainContent">
    <div class="dashboard-container">
        <!-- Header -->
        <div class="dashboard-header">
            <h1>Tableau de Bord</h1>
            <p>Gestion Bancaire Professionnelle</p>
        </div>

        <!-- Cards Grid -->
        <div class="cards-grid">
            <!-- Card 1: Comptes -->
            <div class="stat-card royal">
                <div class="card-header-custom">
                    <div class="card-icon-wrapper">
                        <div class="card-icon">💳</div>
                    </div>
                    <div class="card-badge">Premium</div>
                </div>
                <div class="card-title-custom">Comptes</div>
                <div class="card-stat" id="comptesCount">0</div>
                <div class="card-label">Comptes actifs</div>
                <div class="stats-trend">
                    ↗ +12% ce mois
                </div>
                <div class="card-metric-bar">
                    <div class="card-metric-fill"></div>
                </div>
                <a href="{{ route('comptes.index') }}" class="btn-card">Voir détails</a>
            </div>

            <!-- Card 2: Clients -->
            <div class="stat-card turquoise">
                <div class="card-header-custom">
                    <div class="card-icon-wrapper">
                        <div class="card-icon">👤</div>
                    </div>
                    <div class="card-badge">Actif</div>
                </div>
                <div class="card-title-custom">Clients</div>
                <div class="card-stat" id="clientsCount">0</div>
                <div class="card-label">Clients enregistrés</div>
                <div class="stats-trend">
                    ↗ +8% ce mois
                </div>
                <div class="card-metric-bar">
                    <div class="card-metric-fill"></div>
                </div>
                <a href="{{ route('clients.index') }}" class="btn-card">Voir détails</a>
            </div>

            <!-- Card 3: Virements -->
            <div class="stat-card night">
                <div class="card-header-custom">
                    <div class="card-icon-wrapper">
                        <div class="card-icon">💸</div>
                    </div>
                    <div class="card-badge">Sécurisé</div>
                </div>
                <div class="card-title-custom">Virements</div>
                <div class="card-stat" id="virementsCount">0</div>
                <div class="card-label">Transactions effectuées</div>
                <div class="stats-trend">
                    ↗ +15% ce mois
                </div>
                <div class="card-metric-bar">
                    <div class="card-metric-fill"></div>
                </div>
                <a href="{{ route('virements.index') }}" class="btn-card">Voir détails</a>
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

// Animation des chiffres
function animateCount(elementId, target) {
    const element = document.getElementById(elementId);
    const duration = 1000;
    const start = 0;
    const increment = target / (duration / 16);
    let current = start;
    
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = target.toLocaleString('fr-FR');
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(current).toLocaleString('fr-FR');
        }
    }, 16);
}

// Récupérer les données passées depuis Laravel et animer les compteurs
document.addEventListener('DOMContentLoaded', function() {
    // OPTION 1: Si vous passez les données via le contrôleur
    const comptesCount = {{ $comptesCount ?? 0 }};
    const clientsCount = {{ $clientsCount ?? 0 }};
    const virementsCount = {{ $virementsCount ?? 0 }};
    
    animateCount('comptesCount', comptesCount);
    animateCount('clientsCount', clientsCount);
    animateCount('virementsCount', virementsCount);
    
    console.log('Statistiques chargées:', {
        comptes: comptesCount,
        clients: clientsCount,
        virements: virementsCount
    });
});
</script>

</body>
</html>