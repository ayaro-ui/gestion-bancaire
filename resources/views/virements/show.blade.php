@extends('virements.layout')

@section('title', 'Détails du virement')

@section('content')

<style>
    .details-header {
        background: linear-gradient(135deg, #0A1F44 0%, #1A73E8 100%);
        padding: 30px;
        border-radius: 20px 20px 0 0;
        color: white;
        margin-bottom: 0;
    }

    .details-header h2 {
        font-size: 28px;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .details-header h2 i {
        font-size: 32px;
        color: #4DD0E1;
    }

    .details-card {
        background: #FFFFFF;
        border-radius: 0 0 20px 20px;
        box-shadow: 0 10px 40px rgba(10, 31, 68, 0.12);
        border: none;
        overflow: hidden;
    }

    .details-body {
        padding: 40px;
    }

    .detail-row {
        display: flex;
        align-items: center;
        padding: 20px;
        margin-bottom: 12px;
        background: #F6F7F9;
        border-radius: 12px;
        border-left: 4px solid var(--accent-color);
        transition: all 0.3s ease;
    }

    .detail-row:hover {
        background: #FFFFFF;
        box-shadow: 0 4px 15px rgba(26, 115, 232, 0.1);
        transform: translateX(5px);
    }

    .detail-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        background: var(--accent-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 20px;
        flex-shrink: 0;
    }

    .detail-icon i {
        font-size: 24px;
        color: white;
    }

    .detail-content {
        flex: 1;
    }

    .detail-label {
        font-size: 13px;
        color: #0A1F44;
        opacity: 0.6;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 5px;
    }

    .detail-value {
        font-size: 18px;
        color: #0A1F44;
        font-weight: 600;
    }

    .detail-row.source {
        --accent-color: #1A73E8;
        --accent-gradient: linear-gradient(135deg, #1A73E8, #4285F4);
    }

    .detail-row.destination {
        --accent-color: #4DD0E1;
        --accent-gradient: linear-gradient(135deg, #4DD0E1, #26C6DA);
    }

    .detail-row.amount {
        --accent-color: #0A1F44;
        --accent-gradient: linear-gradient(135deg, #0A1F44, #1A73E8);
    }

    .detail-row.description {
        --accent-color: #1A73E8;
        --accent-gradient: linear-gradient(135deg, #1A73E8, #4285F4);
    }

    .detail-row.date {
        --accent-color: #4DD0E1;
        --accent-gradient: linear-gradient(135deg, #4DD0E1, #26C6DA);
    }

    .amount-highlight {
        font-size: 28px;
        font-weight: 700;
        background: linear-gradient(135deg, #0A1F44, #1A73E8);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .btn-modern {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 14px 28px;
        background: linear-gradient(135deg, #1A73E8, #4285F4);
        color: white;
        text-decoration: none;
        border-radius: 12px;
        font-weight: 600;
        font-size: 15px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(26, 115, 232, 0.3);
        border: none;
        margin-top: 30px;
    }

    .btn-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 25px rgba(26, 115, 232, 0.4);
        color: white;
    }

    .btn-modern i {
        font-size: 18px;
    }

    .status-badge {
        display: inline-block;
        padding: 8px 16px;
        background: linear-gradient(135deg, #4DD0E1, #26C6DA);
        color: white;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-left: 15px;
    }
</style>

<div class="details-header">
    <h2>
        <i class="bi bi-receipt"></i>
        Détails du Virement #{{ $virement->id }}
        <span class="status-badge">Effectué</span>
    </h2>
</div>

<div class="card details-card">
    <div class="details-body">

        <!-- Compte Source -->
        <div class="detail-row source">
            <div class="detail-icon">
                <i class="bi bi-box-arrow-up-right"></i>
            </div>
            <div class="detail-content">
                <div class="detail-label">Compte Source</div>
                <div class="detail-value">Compte #{{ $virement->compte_source_id }}</div>
            </div>
        </div>

        <!-- Compte Destination -->
        <div class="detail-row destination">
            <div class="detail-icon">
                <i class="bi bi-box-arrow-in-down-left"></i>
            </div>
            <div class="detail-content">
                <div class="detail-label">Compte Destination</div>
                <div class="detail-value">Compte #{{ $virement->compte_destination_id }}</div>
            </div>
        </div>

        <!-- Montant -->
        <div class="detail-row amount">
            <div class="detail-icon">
                <i class="bi bi-cash-coin"></i>
            </div>
            <div class="detail-content">
                <div class="detail-label">Montant</div>
                <div class="amount-highlight">{{ number_format($virement->montant, 2, ',', ' ') }} DH</div>
            </div>
        </div>

        <!-- Description -->
        <div class="detail-row description">
            <div class="detail-icon">
                <i class="bi bi-file-text"></i>
            </div>
            <div class="detail-content">
                <div class="detail-label">Description</div>
                <div class="detail-value">{{ $virement->description ?? 'Aucune description' }}</div>
            </div>
        </div>

        <!-- Date -->
        <div class="detail-row date">
            <div class="detail-icon">
                <i class="bi bi-calendar-check"></i>
            </div>
            <div class="detail-content">
                <div class="detail-label">Date du virement</div>
                <div class="detail-value">{{ \Carbon\Carbon::parse($virement->date_virement)->format('d/m/Y à H:i') }}</div>
            </div>
        </div>

        <!-- Bouton Retour -->
        <a href="{{ route('virements.index') }}" class="btn-modern">
            <i class="bi bi-arrow-left"></i>
            Retour à la liste
        </a>

    </div>
</div>

@endsection