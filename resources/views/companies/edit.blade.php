@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Companie
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($companie, ['route' => ['companies.update', $companie->id], 'method' => 'patch']) !!}

                        @include('companies.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection