@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>@lang('Name')</th>
                        <th>@lang('Document class')</th>
                        <th>@lang('Layout')</th>
                        <th>@lang('Created at')</th>
                        <th>@lang('Modified at')</th>
                        <th colspan="3" class="text-center">@lang('Actions')</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($documentTemplates as $documentTempate)
                            <tr>
                                <td><a href="{{route(config('document_templates.base_url') . '.edit', $documentTempate->id)}}">{{$documentTempate->name}}</a></td>
                                <td>{{$documentTempate->document_class}}</td>
                                <td>{{$documentTempate->layout}}</td>
                                <td>{{$documentTempate->created_at}}</td>
                                <td>{{$documentTempate->updated_at}}</td>
                                <td>
                                    <a class="btn btn btn-primary" target="_blank" href="{{route(config('document_templates.base_url') . '.show', $documentTempate->id)}}">Render</a>
                                </td>
                                <td>
                                    <a class="btn btn btn-primary" target="_blank" href="{{route(config('document_templates.base_url') . '.pdf', $documentTempate->id)}}">PDF</a>
                                </td>
                                <td>
                                    <form method="post" action="{{route( config('document_templates.base_url') . '.email', $documentTempate->id)}}">
                                        @csrf
                                        <button class="btn btn-primary" type="submit">Email</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection