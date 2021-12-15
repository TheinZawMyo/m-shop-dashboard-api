@extends('layouts.app')
@section('title', 'login')
@section('content')
    <div class="container login_back">
        <div class="login_container">
            <div class="login_card">
                <h2 class="title">M-shop Admin Login</h2>
                <form action="{{ route('emp#login') }}" method="POST">
                    @csrf
                    <div class="form_field">
                        <div class="label">
                            <label for="email">Email</label>
                        </div>
                        <div class="form_input">
                            <input type="email" name="email" id="email" class="form_control"
                                placeholder="Enter your email">
                        </div>
                        @error('email')
                            <div class="error">
                                <span class="error_text">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    <div class="form_field">
                        <div class="label">
                            <label for="password">Password</label>
                        </div>
                        <div class="form_input">
                            <input type="password" name="password" class="form_control" id="password"
                                placeholder="Enter your password">
                        </div>
                        @error('password')
                            <div class="error">
                                <span class="error_text">{{ $message }}</span>
                            </div>
                        @enderror
                        @if ($error = Session()->get('error'))
                            <div class="error">
                                <span class="error_text">{{ $error }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form_field">
                        <button type="submit" class="btn login_btn">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
