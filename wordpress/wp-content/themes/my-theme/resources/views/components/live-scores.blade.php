<div class="livescore-wrapper">

  <div class="ls-tabs">
    <button class="active">Tất cả</button>
    <button class="live">🔴 Trực tiếp (36)</button>
    <button>Đã kết thúc</button>
    <button>Lịch thi đấu</button>
  </div>

  @foreach($groups as $competition_id => $matches)
    @php $comp = $matches->first()->competition; @endphp

    <div class="ls-competition">
      <img src="{{ $comp->logo }}" class="comp-logo">
      <span class="comp-name">{{ $comp->name }}</span>
    </div>

    @foreach($matches as $match)
      <div class="ls-row">
        <div class="ls-time">
          {{ date('H:i', $match->match_time) }}
          <div class="ls-live-status {{ $match->status_id == 2 || $match->status_id == 4 ? 'live' : '' }}">
            @if($match->status_id == 2)
              {{ $match->minute ?? '1H' }}
            @elseif($match->status_id == 3)
              Nghỉ giữa hiệp
            @elseif($match->status_id == 4)
              {{ $match->minute ?? '2H' }}
            @elseif($match->status_id == 8)
              FT
            @else
              -
            @endif
          </div>
        </div>

        <div class="ls-team home">
          <img src="{{ $match->homeTeam->logo }}" class="team-logo">
          <span>{{ $match->homeTeam->name }}</span>
        </div>

        <div class="ls-score">
          <span class="score-home">{{ $match->home_scores[0] }}</span>
          <span>-</span>
          <span class="score-away">{{ $match->away_scores[0] }}</span>
        </div>

        <div class="ls-team away">
          <img src="{{ $match->awayTeam->logo }}" class="team-logo">
          <span>{{ $match->awayTeam->name }}</span>
        </div>

        <div class="ls-last">
          HT {{ $match->home_scores[1] }}-{{ $match->away_scores[1] }}
        </div>
      </div>
    @endforeach

  @endforeach
</div>
