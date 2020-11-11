<div class="col-xs-12">

    <div class="panel panel-default">

        <div class="panel-heading">
            Lista radnika
            @if (!isset($company))
                <a href="{{ action('HomeController@index') }}" class="btn btn-default btn-sm pull-right"><i class="glyphicon glyphicon-home"></i> Početna strana</a>
            @endif
            <a href="{{ url()->previous() }}" class="btn btn-sm btn-default pull-right mrg-r-5"><i class="glyphicon glyphicon-circle-arrow-left"></i> Nazad</a>
            <div class="clearfix">
                <!-- -->
            </div>
        </div>

        <div class="panel-body">

            @if (isset($company))
                <form method="get" action="{{ action('Company\CompanyController@show', ['id' => $company->id ]) }}">
            @else
                 <form method="get" action="{{ action('Worker\WorkerController@listWorkers') }}">
            @endif

            <label>
                <input class="show-inactive" type="checkbox" @if($showinactive) checked @endif name="showinactive" value="1" @click="$(this).closest('form').submit();"> Prikaži i neaktivne
            </label>

            <div class="table-responsive">

                <table class="table table-bordered table-hover" id="table">
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
                            <th>Aktivan do datuma</th>
                            <th>Salji notifikaciju za istek ugovora</th>
                            <th>Beleska</th>
                        </tr>
                    </thead>

                    <tbody>

                    @if (count($workers))

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
                                <td>
                                    @if ($worker->inactive)
                                        <span class="badge text-danger text-muted" style="background: red !important">NEAKTIVAN</span>
                                    @else
                                        <span class="badge text-success text-muted" style="background: green !important; opacity: 0.5;">Aktivan</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($worker->active_until_date)
                                        {{ date('d.m.Y', strtotime($worker->active_until_date)) }}
                                    @endif
                                </td>

                                <td>
                                    @if ($worker->send_contract_ended_notification)
                                        DA
                                    @else
                                        NE
                                    @endif
                                </td>
                                <td>
                                    {!! nl2br(e($worker->description)) !!}
                                </td>


                            </tr>
                        @endforeach

                    @else

                        <p class="bg-warning">Nemate unetih radnika</p>

                    @endif

                    </tbody>
                </table>

            </div>

            </form>

        </div>

    </div>
</div>