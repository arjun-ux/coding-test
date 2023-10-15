@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @can('isAdmin')
                        <div class="alert alert-success">
                            Selamat Datang {{ Auth::user()->name }}, Anda Login Sebagai {{ Auth::user()->role_name}}
                        </div>
                    @elsecan('isManager')
                        <div class="alert alert-info">
                            Selamat Datang {{ Auth::user()->name }}, Anda Login Sebagai {{ Auth::user()->role_name }}
                        </div>
                    @else
                        <div class="alert alert-warning">
                            Selamat Datang {{ Auth::user()->name }}, Anda Login Sebagai {{ Auth::user()->role_name }}
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- auth()->user()->schools()->first()->id --}}
