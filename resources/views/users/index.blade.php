@extends('layouts/app')

@section('content')
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                
            @endif
<div class="max-width">
        <div class="d-flex ai-center justify-content-between subtitulo">
            <p class="titulo-sec">{{ __('Listado de usuarios') }}</p>
            
        </div>
        <hr class="mb-3">
        @if(count($users) > 0)
            <div class="table-container">
                <table class="table bg-nutricionistas">
                    <thead class="text-left">
                        <tr class="nowrap">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Actualizado</th>
                            <th>Ciudad</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user )
                    <!--?php
                    echo "<pre>";
                    print_r($post->users);
                    exit;
                    ?-->
                    <tr class="tr-contenido">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>{{ $user->city }}</td>
                            <td>
                                <div class="d-flex justify-content-end action-list">
                                    <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn-editar">Editar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        @else
            <p>{{ __('Todavía no ha creado ningún usuario') }}</p>
        @endif
        
    </div>
@endsection