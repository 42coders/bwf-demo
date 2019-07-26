@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <table class="table" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>@lang('Name')</th>
                        <th>@lang('Description')</th>
                        <th>@lang('Version')</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($packages as $package)
                        <tr>
                            <td>{{$package->getName()}}</td>
                            <td>{{$package->getDescription()}}</td>
                            <td>{{$package->getVersion()}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection