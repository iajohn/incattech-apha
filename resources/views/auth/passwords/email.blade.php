@extends('layouts.backend')

@section('title','Reset Password')

@section('styles')
    <style type="text/css">
        .custom-select.is-valid:focus, .form-control.is-valid:focus, .was-validated .custom-select:valid:focus, .was-validated .form-control:valid:focus {
            border-color: #38c172;
            box-shadow: transparent!important;
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #a1cbef;
            outline: 0;
            box-shadow: none;
        }

        .page .reset-page {
            position: absolute;
            top: 0;
            right: 0;
            -webkit-transition: width 0.3s linear;
            transition: width 0.3s linear;
            width: calc(100% - -200px) !important;
            background-color: #F4F7FA;
            background-color: #e9e9e9;
            min-height: 100vh;
            padding-bottom: 50px;
            padding-top: 50px;
        }
    </style>
@stop

@section('content')
    <div class="page reset-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Reset Password') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
