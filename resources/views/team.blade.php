@extends('app')
@section('pageTitle', $team->teamname)
@section('content')
    <div class="et_pb_row">
        <div class="et_pb_column et_pb_column_1_3">
            <img src="{!! $team->logo()!!}" alt="" class="et-waypoint et_pb_image et_pb_animation_left et-animated">
        </div>
        <div class="et_pb_column et_pb_column_2_3">
            <div class="et_pb_text et_pb_bg_layout_light et_pb_text_align_left">
                <h2>{{ $team->teamname }}</h2>
                <p>{{ $team->description }}</p>
                <h3><span style="line-height: 1.5em; font-size: 1.17em;">Captain</span></h3>
                <ul>
                    @foreach($team->captains as $captain)
                        <li>{{ $captain->person->fullName()}} ({{ $captain->leader }})</li>
                    @endforeach
                </ul>
                <h3><span style="line-height: 1.5em;">Game Location</span></h3>
                <p><span style="line-height: 1.5em;">Games take place at&nbsp;Sky Rink&nbsp;at Chelsea Piers, Pier 61, 2nd Floor. Pier 61 is at 23rd Street&nbsp;</span><em style="line-height: 1.5em;">over</em><span style="line-height: 1.5em;">&nbsp;the Hudson River.</span></p>
            </div>
            <div class="et_pb_widget_area et_pb_widget_area_left clearfix et_pb_bg_layout_light">
            </div>
        </div>
    </div>


    <div class="et_pb_row">
        <div class="et_pb_column et_pb_column_4_4">
            <div class="et_pb_text et_pb_bg_layout_light et_pb_text_align_left">
                <div class="et-tabs-container et_sliderfx_fade et_sliderauto_false et_sliderauto_speed_5000 et_slidertype_top_tabs"
                     style="position: relative;">
                    <ul class="et_shortcodes_mobile_nav">
                        <li><a href="#" class="et_sc_nav_next">Next<span></span></a></li>
                        <li><a href="#" class="et_sc_nav_prev">Previous<span></span></a></li>
                    </ul>
                    <ul class="et-tabs-control">
                        <li class="active"><a href="#">
                                Current Season
                            </a></li>
                        <li><a href="#">
                                All Seasons
                            </a></li>
                    </ul>
                    <!-- .et-tabs-control -->
                    <div class="et-tabs-content" style="overflow: hidden; position: relative;">
                        <div class="et-tabs-content-main-wrap">
                            <div class="et-tabs-content-wrapper">
                                <div class="et_slidecontent et_shortcode_slide_active" style="display: block;">
                                    <div class="table-responsive">
                                        <table style="width:100%; "
                                               class="easy-table easy-table-default tablesorter   tablesorter-default">
                                            <thead>
                                            <tr class="tablesorter-headerRow">
                                                <th class="easy-table-header" data-column="0" tabindex="0" unselectable="on"
                                                    style="-webkit-user-select: none;">
                                                    <div class="tablesorter-header-inner">#</div>
                                                </th>
                                                <th class="easy-table-header" data-column="1" tabindex="0" unselectable="on"
                                                    style="-webkit-user-select: none;">
                                                    <div class="tablesorter-header-inner">Player</div>
                                                </th>
                                                <th class="easy-table-header" data-column="2" tabindex="0" unselectable="on"
                                                    style="-webkit-user-select: none;">
                                                    <div class="tablesorter-header-inner">GP</div>
                                                </th>
                                                <th class="easy-table-header" data-column="3" tabindex="0" unselectable="on"
                                                    style="-webkit-user-select: none;">
                                                    <div class="tablesorter-header-inner">G</div>
                                                </th>
                                                <th class="easy-table-header" data-column="4" tabindex="0" unselectable="on"
                                                    style="-webkit-user-select: none;">
                                                    <div class="tablesorter-header-inner">A</div>
                                                </th>
                                                <th class="easy-table-header" data-column="5" tabindex="0" unselectable="on"
                                                    style="-webkit-user-select: none;">
                                                    <div class="tablesorter-header-inner">P</div>
                                                </th>
                                                <th class="easy-table-header" data-column="6" tabindex="0" unselectable="on"
                                                    style="-webkit-user-select: none;">
                                                    <div class="tablesorter-header-inner">PIM</div>
                                                </th>
                                                <th class="easy-table-header" data-column="7" tabindex="0" unselectable="on"
                                                    style="-webkit-user-select: none;">
                                                    <div class="tablesorter-header-inner">G/G</div>
                                                </th>
                                                <th class="easy-table-header" data-column="8" tabindex="0" unselectable="on"
                                                    style="-webkit-user-select: none;">
                                                    <div class="tablesorter-header-inner">A/G</div>
                                                </th>
                                                <th class="easy-table-header" data-column="9" tabindex="0" unselectable="on"
                                                    style="-webkit-user-select: none;">
                                                    <div class="tablesorter-header-inner">P/G</div>
                                                </th>
                                                <th class="easy-table-header" data-column="10" tabindex="0"
                                                    unselectable="on" style="-webkit-user-select: none;">
                                                    <div class="tablesorter-header-inner">PIM/G</div>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 1; ?>
                                            @foreach($currentSeason as $stat)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $stat->person->fullName() }}</td>
                                                <td>{{ $stat->gamesPlayed }}</td>
                                                <td>{{ $stat->goals }}</td>
                                                <td>{{ $stat->assists }}</td>
                                                <td>{{ $stat->points }}</td>
                                                <td>{{ $stat->penaltyMinutes }}</td>
                                                <td>{{ $stat->goalsPerGame() }}</td>
                                                <td>{{ $stat->assistsPerGame() }}</td>
                                                <td>{{ $stat->pointsPerGame() }}</td>
                                                <td>{{ $stat->penaltyMinutesPerGame() }}</td>
                                            </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="et_slidecontent">
                                    <div class="table-responsive">
                                        <table style="width:100%; "
                                               class="easy-table easy-table-default tablesorter   tablesorter-default">
                                            <thead>
                                            <tr class="tablesorter-headerRow">
                                                <th class="easy-table-header" data-column="0" tabindex="0" unselectable="on"
                                                    style="-webkit-user-select: none;">
                                                    <div class="tablesorter-header-inner">#</div>
                                                </th>
                                                <th class="easy-table-header" data-column="1" tabindex="0" unselectable="on"
                                                    style="-webkit-user-select: none;">
                                                    <div class="tablesorter-header-inner">Player</div>
                                                </th>
                                                <th class="easy-table-header" data-column="2" tabindex="0" unselectable="on"
                                                    style="-webkit-user-select: none;">
                                                    <div class="tablesorter-header-inner">GP</div>
                                                </th>
                                                <th class="easy-table-header" data-column="3" tabindex="0" unselectable="on"
                                                    style="-webkit-user-select: none;">
                                                    <div class="tablesorter-header-inner">G</div>
                                                </th>
                                                <th class="easy-table-header" data-column="4" tabindex="0" unselectable="on"
                                                    style="-webkit-user-select: none;">
                                                    <div class="tablesorter-header-inner">A</div>
                                                </th>
                                                <th class="easy-table-header" data-column="5" tabindex="0" unselectable="on"
                                                    style="-webkit-user-select: none;">
                                                    <div class="tablesorter-header-inner">P</div>
                                                </th>
                                                <th class="easy-table-header" data-column="6" tabindex="0" unselectable="on"
                                                    style="-webkit-user-select: none;">
                                                    <div class="tablesorter-header-inner">PIM</div>
                                                </th>
                                                <th class="easy-table-header" data-column="7" tabindex="0" unselectable="on"
                                                    style="-webkit-user-select: none;">
                                                    <div class="tablesorter-header-inner">G/G</div>
                                                </th>
                                                <th class="easy-table-header" data-column="8" tabindex="0" unselectable="on"
                                                    style="-webkit-user-select: none;">
                                                    <div class="tablesorter-header-inner">A/G</div>
                                                </th>
                                                <th class="easy-table-header" data-column="9" tabindex="0" unselectable="on"
                                                    style="-webkit-user-select: none;">
                                                    <div class="tablesorter-header-inner">P/G</div>
                                                </th>
                                                <th class="easy-table-header" data-column="10" tabindex="0"
                                                    unselectable="on" style="-webkit-user-select: none;">
                                                    <div class="tablesorter-header-inner">PIM/G</div>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 1; ?>
                                            @foreach($allSeasons as $stat)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $stat->person->fullName() }}</td>
                                                    <td>{{ $stat->gamesPlayed }}</td>
                                                    <td>{{ $stat->goals }}</td>
                                                    <td>{{ $stat->assists }}</td>
                                                    <td>{{ $stat->points }}</td>
                                                    <td>{{ $stat->penaltyMinutes }}</td>
                                                    <td>{{ $stat->goalsPerGame() }}</td>
                                                    <td>{{ $stat->assistsPerGame() }}</td>
                                                    <td>{{ $stat->pointsPerGame() }}</td>
                                                    <td>{{ $stat->penaltyMinutesPerGame() }}</td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .et-tabs-container -->
            </div>
            <!-- .et_pb_text -->
        </div>
        <!-- .et_pb_column -->
    </div>

@stop
