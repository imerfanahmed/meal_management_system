@extends('layouts.master')

@section('body')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <h1>Current Month : {{Carbon::now()->format('F')}}</h1>
                <h1>Number of Meal this Month : <span id="meal Number"></span> </h1>
                <div class="card text-left">
                  <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Day</th>
                                <th>Meal Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $from = '2021-08-01';
                                $to = '2021-08-31';
                                $period = \Carbon\CarbonPeriod::create($from, '1 day', $to);
                            @endphp

                            @foreach ($period as $date)
                                <tr>
                                    <td>{{ $date->format('d-M') }}</td>
                                    <td>{{ $date->format('l') }}</td>
                                    <td>
                                        <div class="custom-control custom-switch custom-switch-success">
                                            <input type="checkbox" class="custom-control-input" id="{{ $date->format('Y-m-d') }}" checked onclick="numberOfChecked()"/>
                                            <label class="custom-control-label" for="{{ $date->format('Y-m-d') }}">
                                                <span class="switch-icon-left"><i data-feather="check"></i></span>
                                                <span class="switch-icon-right"><i data-feather="x"></i></span>
                                            </label>
                                        </div>
                                    </td>
                                </tr>

                            @endforeach
                    </table>

                  </div>
                </div>
            </div>
            <div class="col-md-6">
                hello world
            </div>
            {{ \Carbon\Carbon::now()->daysInMonth }}
            {{-- @php
               $now = Carbon::now();
            echo $now->year;
            echo $now->month;
            echo $now->weekOfYear;
            @endphp --}}

        </div>

    </div>
@endsection

@section('script')
<script src="{{asset('custom-asset/js/meal.js')}}"></script>
@endsection
