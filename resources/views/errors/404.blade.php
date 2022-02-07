@extends('layouts.admin')

@section('content')
   <div class="container">
      <h1>Errore</h1>
      <h3>{{ $exception->getMessage() }}</h3>
   </div>
@endsection

@section('title')
   Errore 404
@endsection