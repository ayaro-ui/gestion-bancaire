<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Connexion</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #e0c3fc 0%, #8ec5fc 100%);
         
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        position: relative;
        overflow: hidden;
        
    }

    .container {
        display: flex;
        background: white;
        border-radius: 30px;
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        max-width: 900px;
        width: 100%;
        min-height: 550px;
        position: relative;
        z-index: 1;
    }

    .left-panel {
        background: linear-gradient(135deg, #667eea 0%, #0b0977ff 100%);
        flex: 1;
        padding: 60px 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .left-panel::before {
        content: '';
        position: absolute;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        top: -100px;
        left: -100px;
    }

    .left-panel::after {
        content: '';
        position: absolute;
        width: 250px;
        height: 250px;
        background: rgba(255, 255, 255, 0.08);
        border-radius: 50%;
        bottom: -80px;
        right: -80px;
    }

    .left-panel h1 {
        font-size: 42px;
        font-weight: 700;
        margin-bottom: 15px;
        text-align: center;
        z-index: 1;
    }

    .left-panel p {
        font-size: 16px;
        margin-bottom: 30px;
        opacity: 0.9;
        text-align: center;
        z-index: 1;
    }

    .register-btn {
        padding: 14px 40px;
        background: transparent;
        border: 2px solid white;
        border-radius: 25px;
        color: white;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        z-index: 1;
    }

    .register-btn:hover {
        background: white;
        color: #3259d8ff;
        transform: translateY(-2px);
    }

    .right-panel {
        flex: 1;
        padding: 60px 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .right-panel h2 {
        font-size: 32px;
        font-weight: 700;
        color: #333;
        margin-bottom: 40px;
        text-align: center;
    }

    label {
        font-size: 14px;
        font-weight: 600;
        display: block;
        margin-bottom: 8px;
        color: #555;
    }

    .input-group {
        position: relative;
        margin-bottom: 25px;
    }

    input {
        width: 100%;
        padding: 14px 45px 14px 16px;
        border-radius: 10px;
        border: 1px solid #ddd;
        font-size: 15px;
        transition: all 0.3s ease;
        background: #f8f9fa;
    }

    input:focus {
        outline: none;
        border-color: #667eea;
        background: white;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .input-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #999;
        font-size: 18px;
    }

    .forgot-password {
        text-align: right;
        margin-top: -15px;
        margin-bottom: 25px;
    }

    .forgot-password a {
        color: #667eea;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
    }

    .forgot-password a:hover {
        text-decoration: underline;
    }

    button[type="submit"] {
        width: 100%;
        padding: 16px;
        background: linear-gradient(135deg, #2045ebff 0%, #362ccfff 100%);
        border: none;
        border-radius: 10px;
        color: white;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        margin-bottom: 25px;
    }

    button[type="submit"]:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
    }

    button[type="submit"]:active {
        transform: translateY(0);
    }

    .social-login {
        text-align: center;
    }

    .social-login p {
        color: #30a2eeff;
        font-size: 14px;
        margin-bottom: 15px;
    }

    .social-icons {
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .social-icon {
        width: 45px;
        height: 45px;
        border: 1px solid #ddd;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        background: white;
    }

    .social-icon:hover {
        border-color: #284ce9ff;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .social-icon svg {
        width: 20px;
        height: 20px;
    }

    .error-message {
        color: #e53e3e;
        font-size: 13px;
        margin-top: -15px;
        margin-bottom: 15px;
        padding: 10px 12px;
        background: #fff5f5;
        border-radius: 8px;
        border-left: 3px solid #e53e3e;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .error-icon {
        font-size: 16px;
    }

    @media (max-width: 768px) {
        .container {
            flex-direction: column;
        }
        
        .left-panel {
            padding: 40px 30px;
        }
        
        .right-panel {
            padding: 40px 30px;
        }
        
        .left-panel h1 {
            font-size: 32px;
        }
        
        .right-panel h2 {
            font-size: 26px;
        }
    }
    </style>
</head>
<body>

    <div class="container">
        <!-- Left Panel -->
        <div class="left-panel">
            <h1>Hello, Welcome!</h1>
            <p>Connectez-vous à votre compte</p>
            <button class="register-btn">se connecter ➡️ </button>
        </div>

        <!-- Right Panel -->
        <div class="right-panel">
            <h2>Login</h2>

            <form method="POST" action="/login">
                @csrf

                <div class="input-group">
                    <label for="email">Username</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Username" required autofocus>
                    <span class="input-icon">👤</span>
                </div>
                
                @error('email')
                    <p class="error-message">
                        <span class="error-icon">⚠️</span>
                        {{ $message }}
                    </p>
                @enderror

                <div class="input-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" placeholder="Password" required>
                    <span class="input-icon">🔒</span>
                </div>

                <div class="forgot-password">
                    <a href="#"></a>
                </div>

                <button type="submit">Login</button>
                
                @if ($errors->has('email') && $errors->first('email') === 'Email ou mot de passe incorrect.')
                    <p class="error-message">
                        <span class="error-icon">⚠️</span>
                        {{ $errors->first('email') }}
                    </p>
                @endif

                <div class="social-login">
                    <p>or login with social platforms</p>
                    <div class="social-icons">
                        <div class="social-icon">
                            <svg viewBox="0 0 24 24" fill="#DB4437">
                                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                            </svg>
                        </div>
                        <div class="social-icon">
                            <svg viewBox="0 0 24 24" fill="#1877F2">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </div>
                        <div class="social-icon">
                            <svg viewBox="0 0 24 24" fill="#333">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                        </div>
                        <div class="social-icon">
                            <svg viewBox="0 0 24 24" fill="#0A66C2">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>
</html>