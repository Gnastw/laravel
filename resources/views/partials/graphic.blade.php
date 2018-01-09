<div class="grid">
    @forelse($spendings as $spending)
        <div class="person-{{$loop->index + 1}} graphic-{{$loop->index + 1}}">
            {{$spending->name}}
            {{round($spending->total/$total, 2)*100}}%
        </div>
    @empty
    @endforelse
</div>

<style>
    .grid {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        margin-left: -1px;

        /* Inline-block fallback */
        letter-spacing: -0.31em;
        text-rendering: optimizespeed;
    }
    .grid > * {
        flex: 0 0 auto;
        width: calc(100%/{{count($spendings)}} - 1px);
        margin-left: 1px;
        display: block;  /* IE fix */

        /* Inline-block fallback */
        display: block;
        vertical-align: bottom;
        align-self: flex-end;
        letter-spacing: normal;
        text-rendering: auto;
    }
    @foreach($spendings as $spending)
    .person-{{$loop->index + 1}}{
        height: {{round(500*$spending->total/$total,3)}}px;
    }
    @endforeach
</style>