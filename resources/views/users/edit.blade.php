@extends('layouts/app')

@section('content')
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                
            @endif
<div class="max-width">
        <div class="d-flex ai-center justify-content-between subtitulo">
            <p class="titulo-sec">{{ __('Editar usuario') }}</p>
            
        </div>
        <hr class="mb-3">
        @if($user)
            <div class="table-container">
                <h3>Plantilla en desarrollo</h3>
            </div>
        @else
            <p>{{ __('Todavía no ha creado ningún usuario') }}</p>
        @endif
        
    </div>
@endsection