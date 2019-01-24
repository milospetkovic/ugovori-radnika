@extends('layouts.app')

@section('content')

    <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">

            <div class="panel-heading">Lista radnika</div>

            <div class="panel-body">

                @if (count($workers))

                    <ul class="list-group">

                        @foreach($workers as $ind => $worker)

                            <li class="list-group-item">
                                {{ $ind + 1 }} {{ $worker->last_name.' '.$worker->first_name }}
                            </li>

                        @endforeach

                    </ul>

                @else

                    <p>Nemate unetih komitenata</p>

                @endif

            </div>

        </div>
    </div>
@endsection