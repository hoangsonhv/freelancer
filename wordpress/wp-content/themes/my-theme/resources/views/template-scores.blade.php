@extends('layouts.app')

@section('content')
  <div class="scores-container">

    <h2>Trực tiếp</h2>

    @foreach ($live_matches as $match)
      @component('components.live-scores', ['match' => $match])
      @endcomponent
    @endforeach

  </div>
@endsection
