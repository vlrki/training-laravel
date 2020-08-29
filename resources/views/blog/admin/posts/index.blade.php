@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-primary" href="{{ route('blog.admin.categories.create') }}">Добавить</a>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Автор</th>
                                    <th>Категория</th>
                                    <th>Заголовок</th>
                                    <th>Дата публикации</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paginator as $post)
                                    @php /** @var \App\Models\PostCategory $post */ @endphp
                                    <tr @if (!$post->is_published) class="text-muted" @endif>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->user_id }}</td>
                                        <td>{{ $post->category_id }}</td>
                                        <td>
                                            <a href="{{ route('blog.admin.posts.edit', $post->id) }}" @if (!$post->is_published) class="text-muted" @endif>
                                                {{ $post->title }}
                                            </a>
                                        </td>
                                        <td>{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d.m.y H:i'): '' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @if ($paginator->total() > $paginator->count())
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $paginator->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection
