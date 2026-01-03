<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register - School Portal</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .register-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            max-width: 1200px;
            width: 100%;
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15), 
                        0 0 0 1px rgba(0, 0, 0, 0.05),
                        0 40px 80px rgba(16, 185, 129, 0.2);
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Left Column - Branding */
        .brand-section {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .brand-section::before {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -200px;
            right: -200px;
            animation: float 6s ease-in-out infinite;
        }

        .brand-section::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            bottom: -150px;
            left: -150px;
            animation: float 8s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(20px); }
        }

        .brand-content {
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .brand-logo {
            font-size: 56px;
            margin-bottom: 24px;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .brand-content h1 {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 16px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .brand-content p {
            font-size: 18px;
            opacity: 0.95;
            line-height: 1.6;
            max-width: 400px;
        }

        .features {
            margin-top: 48px;
            text-align: left;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
            padding: 16px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            backdrop-filter: blur(10px);
        }

        .feature-icon {
            font-size: 28px;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
        }

        .feature-text h3 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .feature-text p {
            font-size: 14px;
            opacity: 0.9;
        }

        /* Right Column - Form */
        .form-section {
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-header {
            margin-bottom: 32px;
        }

        .form-header h2 {
            font-size: 32px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 8px;
        }

        .form-header p {
            color: #64748b;
            font-size: 15px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: #334155;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 18px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 14px 16px 14px 48px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: #fff;
            color: #1e293b;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #10b981;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        input.is-invalid {
            border-color: #ef4444;
        }

        .error-message {
            color: #ef4444;
            font-size: 13px;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 14px rgba(16, 185, 129, 0.4);
            margin-top: 24px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.5);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .login-link {
            text-align: center;
            margin-top: 24px;
            padding-top: 24px;
            border-top: 1px solid #e2e8f0;
            color: #64748b;
            font-size: 14px;
        }

        .login-link a {
            color: #10b981;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            color: #059669;
        }

        @media (max-width: 968px) {
            .register-wrapper {
                grid-template-columns: 1fr;
                max-width: 500px;
            }

            .brand-section {
                display: none;
            }

            .form-section {
                padding: 40px 32px;
            }
        }

        @media (max-width: 480px) {
            .form-section {
                padding: 32px 24px;
            }

            .form-header h2 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <div class="register-wrapper">
        <!-- Left Column - Branding -->
        <div class="brand-section">
            <div class="brand-content">
                <div class="brand-logo">🎓</div>
                <h1>Join {{ config('app.name', 'Our School') }}</h1>
                <p>Register to access your personalized portal as a student, teacher, parent, or staff member</p>

                <div class="features">
                    <div class="feature-item">
                        <div class="feature-icon">👨‍🎓</div>
                        <div class="feature-text">
                            <h3>For Students</h3>
                            <p>Access courses & assignments</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">👨‍🏫</div>
                        <div class="feature-text">
                            <h3>For Teachers</h3>
                            <p>Manage classes & grades</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">👪</div>
                        <div class="feature-text">
                            <h3>For Parents & Staff</h3>
                            <p>Monitor progress & records</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Form -->
        <div class="form-section">
            <div class="form-header">
                <h2>Create Your Account</h2>
                <p>Register to access the school management system</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <div class="input-wrapper">
                        <span class="input-icon">👤</span>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            class="@error('name') is-invalid @enderror"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Enter your full name">
                    </div>
                    @error('name')
                    <div class="error-message">
                        ⚠️ {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-wrapper">
                        <span class="input-icon">📧</span>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            class="@error('email') is-invalid @enderror"
                            value="{{ old('email') }}"
                            required
                            autocomplete="username"
                            placeholder="Enter your email">
                    </div>
                    @error('email')
                    <div class="error-message">
                        ⚠️ {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <span class="input-icon">🔒</span>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            class="@error('password') is-invalid @enderror"
                            required
                            autocomplete="new-password"
                            placeholder="Create a password">
                    </div>
                    @error('password')
                    <div class="error-message">
                        ⚠️ {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <div class="input-wrapper">
                        <span class="input-icon">🔒</span>
                        <input 
                            type="password" 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            required
                            autocomplete="new-password"
                            placeholder="Confirm your password">
                    </div>
                    @error('password_confirmation')
                    <div class="error-message">
                        ⚠️ {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn-submit">Create Account</button>
            </form>

            <div class="login-link">
                Already registered? <a href="{{ route('login') }}">Sign in to your account</a>
            </div>
        </div>
    </div>
</body>
</html>