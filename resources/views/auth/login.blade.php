<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="container">
        <div class="form-wrapper">
            <h1 class="form-title">Login</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="form-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="form-error" />
                </div>

                <!-- Password -->
                <div class="form-group">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="form-input" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="form-error" />
                </div>

                <!-- Remember Me -->
                <div class="form-group-checkbox">
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                        <span class="checkbox-label">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Actions -->
                <div class="form-actions">
                    @if (Route::has('password.request'))
                        <a class="form-link" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="btn-primary">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

    <style>
        /* General Reset */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9fafb;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-wrapper {
            text-align: center;
        }

        .form-title {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #4a5568;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.2s;
        }

        .form-input:focus {
            border-color: #4a90e2;
            outline: none;
        }

        .form-error {
            font-size: 12px;
            color: #e53e3e;
            margin-top: 5px;
        }

        .form-group-checkbox {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .form-checkbox {
            margin-right: 10px;
            accent-color: #4a90e2;
        }

        .checkbox-label {
            font-size: 14px;
            color: #4a5568;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .form-link {
            font-size: 14px;
            color: #4a90e2;
            text-decoration: none;
        }

        .form-link:hover {
            text-decoration: underline;
        }

        .btn-primary {
            padding: 10px 20px;
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #357abd;
        }
    </style>
</x-guest-layout>
