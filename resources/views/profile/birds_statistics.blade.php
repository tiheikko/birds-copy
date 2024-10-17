@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <div class="statistics">
                                <table>
                                    <thead>
                                    <th>Птица</th>
                                    <th>Сколько раз</th>
                                    <th>В последний раз</th>
                                    <th>Координаты</th>
                                    </thead>
                                    <tbody>
                                    @foreach($sorted_birds as $bird)
                                        <tr>
                                            <td>{{ $bird["bird"] }}</td>
                                            <td>{{ $bird["count"] }}</td>
                                            <td>{{ $bird["last_seen"]["date_seen"] }}</td>
                                            <td>{{ $bird["last_seen"]["latitude"] }}, {{ $bird["last_seen"]["longitude"] }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
