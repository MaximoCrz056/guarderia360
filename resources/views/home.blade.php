@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white">
                    {{ __('¡Bienvenido a tu cuenta,') }} {{ Auth::user()->name }}!
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>{{ __('Gracias por iniciar sesión.') }}</p>
                    <p>{{ __('Aquí encontrarás información relevante sobre tu cuenta.') }}</p>

                    <div class="mt-4">
                        <h5>Opciones disponibles:</h5>
                        <ul>
                            <li><strong>Editar perfil:</strong> Actualiza tu información personal.</li>
                            <li><strong>Ver órdenes:</strong> Revisa tus pedidos realizados.</li>
                            <li><strong>Configuración:</strong> Ajusta preferencias y ajustes de cuenta.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
