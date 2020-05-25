@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Companie
        </h1>
    </section>
    <div class="content">
        @include('layouts.errors')
        @include('flash::message')

        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'companies.store', 'enctype' => 'multipart/form-data']) !!}

                        @include('companies.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
