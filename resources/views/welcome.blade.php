@extends('app')

@section('content')

    <div class="et_pb_row team">
        @foreach($teams as $team)
            <div class="et_pb_column et_pb_column_1_3">
                <div class="et_pb_text et_pb_bg_layout_light et_pb_text_align_center">
                    <h1 style="text-align: center;"><a href="{!! $team->url() !!}">{{ $team->teamname }} ({{$team->division}})</a></h1>
                    @if($team->logo_url)
                        <p><a href="{!! $team->url() !!}">
                                <img class="wp-image-1881 aligncenter" src="{!! $team->logo_url !!}" alt="{{ $team->teamname }}">
                            </a>
                        </p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

@endsection
