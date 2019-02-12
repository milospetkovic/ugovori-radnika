<div class="row">

    <div class="col-xs-12">

        <div class="panel panel-default">

            <div class="panel-heading">Lista radnika</div>

            <div class="panel-body">

                @if (count($workers))

                    <table class="table" id="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Kompanija</th>
                            <th>Prezime</th>
                            <th>Ime</th>
                            <th>Početak ugovora</th>
                            <th>Kraj ugovora</th>
                            <th>JMBG</th>
                            <th>Status</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($workers as $ind => $worker)

                            <?php
                            $row_class = '';
                            if (strtotime($worker->contract_end) <= (time() + (2 * 86400))) {
                                $row_class = "bg-warning";
                            }
                            if ($worker->contract_end <= date('Y-m-d')) {
                                $row_class = "bg-danger";
                            }
                            ?>

                            <tr class="{{ $row_class }}">
                                <td>{{ $ind + 1 }}.</td>
                                <td><a href="/company/show/{{ $worker->company_id }}">{{ $worker->company_name }}</a></td>
                                <td><a href="/worker/show/{{ $worker->id }}">{{ $worker->last_name }}</a></td>
                                <td><a href="/worker/show/{{ $worker->id }}">{{ $worker->first_name }}</a></td>
                                <td>{{ date('d.m.Y', strtotime($worker->contract_start)) }}</td>
                                <td>{{ date('d.m.Y', strtotime($worker->contract_end)) }}</td>
                                <td>{{ $worker->jmbg }}</td>

                                <td>@if ($worker->inactive) NEAKTIVAN @else Aktivan @endif</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                @else

                    <p>Nemate unetih radnika</p>

                @endif

            </div>

        </div>
    </div>

</div>