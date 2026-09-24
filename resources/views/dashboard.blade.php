<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMS | Mabalacat City College</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        body {
            background-color: #F0F6F6; /* Adjusted soft institution tint */
            display: flex;
            height: 100vh;
            overflow: hidden;
            color: #0F2D30; /* Dark slate text corresponding to identity scheme */
        }

        /* --- INST-BRANDED SIDEBAR --- */
        .sidebar {
            width: 260px;
            background-color: #0F2D30; /* Dark premium institutional background */
            display: flex;
            flex-direction: column;
            padding: 32px 20px;
            gap: 8px;
            height: 100%;
            flex-shrink: 0;
        }

        .profile-container {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 8px 24px 8px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 16px;
        }

        .profile-icon {
            width: 44px;
            height: 44px;
            background-color: #129EA4; /* SSITE Signature Teal Primary */
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            flex-shrink: 0;
        }

        .profile-icon::before {
            content: '';
            position: absolute;
            width: 14px;
            height: 14px;
            background-color: #ffffff;
            border-radius: 50%;
            top: 9px;
        }

        .profile-icon::after {
            content: '';
            position: absolute;
            width: 28px;
            height: 14px;
            background-color: #ffffff;
            border-radius: 30px 30px 0 0;
            bottom: 4px;
        }

        .profile-info h3 {
            font-size: 14px;
            font-weight: 700;
            color: #ffffff;
        }

        .profile-info p {
            font-size: 12px;
            color: #92B9BD;
        }

        .nav-item {
            width: 100%;
            padding: 12px 16px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #92B9BD;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .nav-item:hover {
            background-color: rgba(255, 255, 255, 0.05);
            color: #ffffff;
        }

        .nav-item.active {
            background-color: #129EA4;
            color: #ffffff;
        }

        .nav-icon {
            font-size: 18px;
        }

        .scanner-bracket {
            margin-top: auto;
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 14px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            align-self: center;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .scanner-bracket:hover {
            border-color: #129EA4;
            background-color: rgba(18, 158, 164, 0.1);
        }

        /* --- DASHBOARD GRID --- */
        .main-container {
            flex-grow: 1;
            padding: 32px;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 32px;
            overflow-y: auto;
        }

        @media (max-width: 1024px) {
            .main-container { grid-template-columns: 1fr; }
        }

        .column {
            display: flex;
            flex-direction: column;
            gap: 32px;
        }

        .card {
            background-color: #ffffff;
            border-radius: 16px;
            border: 1px solid #E2E8F0;
            padding: 28px;
            box-shadow: 0 4px 6px -1px rgba(15, 45, 48, 0.05);
        }

        /* --- INST-BRANDED CALENDAR --- */
        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .calendar-title {
            font-size: 18px;
            font-weight: 700;
            color: #0F2D30;
        }

        .weekdays-row {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            text-align: center;
            font-size: 13px;
            font-weight: 600;
            color: #92B9BD;
            padding-bottom: 12px;
            border-bottom: 1px solid #f1f5f9;
        }

        .days-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            text-align: center;
            margin-top: 12px;
            row-gap: 12px;
        }

        .day-cell {
            font-size: 14px;
            font-weight: 500;
            color: #0F2D30;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 36px;
            position: relative;
        }

        .day-cell.event-red::after {
            content: '';
            position: absolute;
            bottom: 2px;
            width: 4px;
            height: 4px;
            background-color: #ef4444;
            border-radius: 50%;
        }

        .day-cell.event-green::after {
            content: '';
            position: absolute;
            bottom: 2px;
            width: 4px;
            height: 4px;
            background-color: #22c55e;
            border-radius: 50%;
        }

        .day-cell.active-selected {
            background-color: #129EA4;
            color: #ffffff;
            border-radius: 8px;
            font-weight: 600;
        }
        .day-cell.active-selected::after { display: none; }

        .day-cell.muted-text {
            color: #cbd5e1;
        }

        /* --- AUTHENTICATION BLOCKS --- */
        .auth-section-title {
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #92B9BD;
            margin-bottom: 16px;
        }

        .auth-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .auth-card {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 18px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: border-color 0.2s;
        }

        .auth-card:hover {
            border-color: #129EA4;
        }

        .auth-meta {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .auth-avatar-box {
            width: 42px;
            height: 42px;
            background-color: #F4F8F8;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #129EA4;
            font-size: 18px;
        }

        .auth-details h4 {
            font-size: 14px;
            font-weight: 600;
            color: #0F2D30;
        }

        .auth-details p {
            font-size: 12px;
            color: #92B9BD;
            margin-top: 1px;
        }

        .status-badge {
            font-size: 12px;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 6px;
            background-color: #F4F8F8;
            color: #92B9BD;
        }

        .status-badge.pending {
            background-color: rgba(18, 158, 164, 0.1);
            color: #129EA4;
        }

        /* --- NOTIFICATION PANEL --- */
        .card-header-badge {
            display: inline-block;
            background-color: rgba(18, 158, 164, 0.1);
            color: #129EA4;
            font-size: 12px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 6px;
            margin-bottom: 16px;
            text-transform: uppercase;
        }

        .notification-panel h2 {
            font-size: 20px;
            font-weight: 700;
            color: #0F2D30;
            margin-bottom: 12px;
        }

        .notification-panel p {
            font-size: 15px;
            line-height: 1.6;
            color: #556B6D;
        }

        .variable-chip {
            background-color: #F4F8F8;
            border: 1px dashed #129EA4;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: monospace;
            font-size: 13px;
            color: #0F2D30;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <!-- SIDEBAR NAV -->
    <div class="sidebar">
        <div class="profile-container">
            <div class="profile-icon"></div>
            <div class="profile-info">
                <h3>MCC - SSITE</h3>
                <p>Event Coordinator</p>
            </div>
        </div>
        
        <a href="#" class="nav-item">
            <span class="nav-icon">🏠</span> Home
        </a>
        <a href="#" class="nav-item active">
            <span class="nav-icon">📅</span> Calendar
        </a>
        <a href="#" class="nav-item">
            <span class="nav-icon">👥</span> Attendance
        </a>
        <a href="#" class="nav-item">
            <span class="nav-icon">🔔</span> Notification
        </a>

        <div class="scanner-bracket" title="Quick Scan Terminal">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#92B9BD" stroke-width="2.5">
                <path d="M4 8V5a1 1 0 0 1 1-1h3M4 16v3a1 1 0 0 0 1 1h3M20 8V5a1 1 0 0 0 -1-1h-3M20 16v3a1 1 0 0 1 -1 1h-3" stroke-linecap="round"/>
                <line x1="6" y1="12" x2="18" y2="12" stroke="#129EA4" stroke-width="2" />
            </svg>
        </div>
    </div>

    <!-- MAIN CONTAINER -->
    <div class="main-container">
        
        <div class="column">
            <div class="card">
                <div class="calendar-header">
                    <div class="calendar-title">October 2026</div>
                </div>
                
                <div class="weekdays-row">
                    <div>Su</div><div>Mo</div><div>Tu</div><div>We</div><div>Th</div><div>Fr</div><div>Sa</div>
                </div>
                
                <div class="days-grid">
                    <div class="day-cell muted-text">27</div><div class="day-cell muted-text">28</div><div class="day-cell muted-text">29</div><div class="day-cell muted-text">30</div><div class="day-cell">1</div><div class="day-cell">2</div><div class="day-cell">3</div>
                    <div class="day-cell">4</div><div class="day-cell">5</div><div class="day-cell">6</div><div class="day-cell event-red">7</div><div class="day-cell">8</div><div class="day-cell">9</div><div class="day-cell">10</div>
                    <div class="day-cell">11</div><div class="day-cell">12</div><div class="day-cell">13</div><div class="day-cell">14</div><div class="day-cell event-green">15</div><div class="day-cell">16</div><div class="day-cell">17</div>
                    <div class="day-cell muted-text">18</div><div class="day-cell">19</div><div class="day-cell">20</div><div class="day-cell">21</div><div class="day-cell active-selected">22</div><div class="day-cell">23</div><div class="day-cell">24</div>
                    <div class="day-cell">25</div><div class="day-cell">26</div><div class="day-cell">27</div><div class="day-cell">28</div><div class="day-cell">29</div><div class="day-cell">30</div><div class="day-cell">31</div>
                </div>
            </div>
        </div>

        <div class="column">
            <div>
                <h3 class="auth-section-title">2-Way Verification Status</h3>
                <div class="auth-list">
                    
                    <div class="auth-card">
                        <div class="auth-meta">
                            <div class="auth-avatar-box">🔑</div>
                            <div class="auth-details">
                                <h4>Factor 1: Randomized QR</h4>
                                <p>Dynamic student signature match</p>
                            </div>
                        </div>
                        <div class="status-badge pending">Awaiting Scan</div>
                    </div>

                    <div class="auth-card">
                        <div class="auth-meta">
                            <div class="auth-avatar-box">📷</div>
                            <div class="auth-details">
                                <h4>Factor 2: Photo Verification</h4>
                                <p>Facial structure biometric check</p>
                            </div>
                        </div>
                        <div class="status-badge">Pending Factor 1</div>
                    </div>

                </div>
            </div>

            <div class="card notification-panel">
                <span class="card-header-badge">Required Attendance</span>
                <h2>MCC Event Overview</h2>
                <p>You have an MCC event scheduled on <span class="variable-chip">[DATE]</span> at <span class="variable-chip">[TIME]</span> located around <span class="variable-chip">[VENUE/LOCATION]</span>. Full secondary authentication is strictly required. Tap here to look over complete scheduling constraints.</p>
            </div>
        </div>

    </div>

</body>
</html>