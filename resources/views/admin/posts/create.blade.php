@extends('layouts.admin')

@section('content')
   <div class="container">
      @if ($errors->any())
      <div class="alert alert-danger" role="alert">
         @foreach ($errors->all()
          as $error)
            <li>{{ $error }}</li>
         @endforeach
      </div>
      @endif
      <h1>Crea Post</h1>
      <form action="{{ route('admin.post.store') }}" method="POST">
         @csrf
         @method('POST')
         <div class="mb-3 form-check">
            <label class="form-check-label" for="title">Titolo</label>
            <input 
               type="text" 
               placeholder="Inserisci il titolo del post"
               id="title"
               name="title"
               value="{{ old('title') }}"
               class="form-control
                  @error('title')
                     is-invalid
                  @enderror
               "
            >
            @error('title')   
               <p class="@error('title')
                  invalid-feedback
               @enderror">{{ $message }}</p>
            @enderror
         </div>
         <div class="mb-3 form-check">
            <label class="form-check-label" for="category_id">Categoria</label>
            <select class="form-control mb-3" name="category_id">
               <option>Seleziona la categoria</option>
               @foreach ($categories as $category)
                  <option value="{{ $category->id }}"
                     @if ($category->id == old('category_id'))
                        selected
                     @endif   
                  >{{ $category->name }}</option>
               @endforeach
            </select>
         </div>
         <div class="mb-3 form-check">
            <label class="form-check-label" for="content">Contenuto</label>
            <textarea
               name="content"
               cols="30"
               rows="10"
               placeholder="Inserisci il contentuto del post"
               id="content"
               class="form-control
                  @error('content')
                     is-invalid
                  @enderror
               "
            >{{ old('content') }}</textarea>
            @error('content')   
               <p class="@error('content')
                  invalid-feedback
               @enderror">{{ $message }}</p>
            @enderror
         </div>
         <button type="submit" class="btn btn-primary">Submit</button>
         <button type="reset" class="btn btn-secondary">Reset</button>
      </form>
   </div>
@endsection

@section('title')
   Crea Post
@endsection