@extends('layouts.admin')

@section('content')
   <div class="container">
      @if (session('deleted'))
         <div class="alert alert-success" role="alert">
            {{ session('deleted') }}
         </div>
      @endif
      <div class="row">
         <h1>Elenco Posts</h1>
         <table class="table">
            <thead>
               <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Titolo</th>
                  <th scope="col">Categoria</th>
                  <th scope="col">Tag</th>
                  <th scope="col">Azioni</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($posts as $post)
                  <tr>
                     <th scope="row">{{ $post->id }}</th>
                     <td>{{ $post->title }}</td>
                     <td>
                        @if ($post->category)
                           {{ $post->category->name }}
                        @else
                           -
                        @endif
                     </td>
                     <td>
                        @forelse ($post->tags as $tag)
                           <span class="badge bg-info text-dark">{{ $tag->name }}</span>
                        @empty
                           -
                        @endforelse
                     </td>
                     <td class="d-flex justify-content-around">
                        <button class="btn btn-primary"><a class="text-dark" href="{{ route('admin.post.show', $post) }}">Show</a></button>
                        <button class="btn btn-success"><a class="text-white" href="{{ route('admin.post.edit', $post) }}">Edit</a></button>
                        <form onsubmit="return confirm('Conferma eliminazione di {{ $post->title }}?')" action="{{ route('admin.post.destroy', $post) }}" method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                     </td>
                  </tr>
               @endforeach
            </tbody>
         </table>
         {{ $posts->links() }}
      </div>
      @foreach ($categories as $category)
         <div>
            <h1>{{ $category->name }}</h1>
            <ul>
               @forelse ($category->posts as $post)
                  <li><a href="{{ route('admin.post.show', $post) }}">{{ $post->title }}</a></li>
               @empty
                  <p>Nessun post per la categoria <strong>{{ $category->name }}</strong></p>
               @endforelse
            </ul>
         </div>
      @endforeach
   </div>
@endsection

@section('title')
   Elenco post
@endsection