@extends('layouts/app')

@section('content')
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                
            @endif
<div class="max-width">
        <div class="d-flex ai-center justify-content-between subtitulo">
            <p class="titulo-sec">{{ __('Listado de posts') }}</p>
            
        </div>
        <hr class="mb-3">
        @if(count($posts) > 0)
            <div class="table-container">
                <table class="table bg-nutricionistas">
                    <thead class="text-left">
                        <tr class="nowrap">
                            <th>ID</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Actualizado</th>
                            <th>Usuario</th>
                            <th>Rating</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ( $posts as $post )
                    <tr class="tr-contenido">
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->body }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->rating }}</td>
                            <td>
                                <div class="d-flex justify-content-end action-list">
                                    <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn-editar">Editar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        @else
            <p>{{ __('Todavía no ha creado ningún post') }}</p>
        @endif
        
    </div>
@endsection