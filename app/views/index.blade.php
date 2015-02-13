@section('content')
<div class="row" id="content">

    <div class="row">

        <table class="table table-striped table-bordered table-hover display" id="footballTable">

            <thead>
            <tr>
                <th>
                    Position
                </th>
                <th>
                    Name
                </th>
                <th>
                    Location
                </th>
                <th>
                    LastPlayed
                </th>
                <th>
                    W / D / L
                </th>
                <th>
                    GD
                </th>
                <th>
                    Points
                </th>
            </tr>
            </thead>

        </table>
    </div>

</div>
@stop

@section('custom-javascript')
<script src="/static/js/football-table.js"></script>
@stop