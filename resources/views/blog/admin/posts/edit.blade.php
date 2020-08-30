@extends('layouts.app')

@section('content')
    <div class="container">

        @php /** @var \App\Models\BlogPost $item */ @endphp

        @if ($item->exists)
            <form method="POST" action="{{ route('blog.admin.posts.update', $item->id) }}">
                @method('PATCH')
            @else
                <form method="POST" action="{{ route('blog.admin.posts.store') }}">
        @endif

        @csrf
        @php
        /** @var \illuminate\Support\ViewErrorBag $errors */
        @endphp

        @if ($errors->any())
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                        {{ $errors->first() }}
                    </div>
                </div>
            </div>
        @endif

        @if (session('success'))
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                        {{ session()->get('success') }}
                    </div>
                </div>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('blog.admin.posts.includes.item_edit_main_col')
            </div>
            <div class="col-md-4">
                @include('blog.admin.posts.includes.item_edit_add_col')
            </div>
        </div>
        </form>

        @if ($item->exists)
            <br>
            <form method="POST" action="{{ route('blog.admin.posts.destroy', $item->id) }}">
                @method('DELETE')
                @csrf

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <button type="submit" class="btn btn-link">Удалить</button>
                            </div>
                        </div>
                    </div>                    
                    <div class="col-md-4">
                    </div>
                </div>
            </form>
        @endif

    </div>

@endsection