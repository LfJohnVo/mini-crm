<!-- First Name Field -->
<div class="form-group">
    {!! Form::label('first_name', 'First Name:') !!}
    <p>{{ $employee->first_name }}</p>
</div>

<!-- Last Name Field -->
<div class="form-group">
    {!! Form::label('last_name', 'Last Name:') !!}
    <p>{{ $employee->last_name }}</p>
</div>

<!-- Company Id Field -->
<div class="form-group">
    {!! Form::label('company_id', 'Company Id:') !!}
    <p>{{ $compañia->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    @if($employee->email != NULL)
        {{$employee->email}}
    @else
        <p style="color: red;">Empty</p>
        @endif</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Phone:') !!}
    @if($employee->phone != NULL)
        {{$employee->phone}}
    @else
        <p style="color: red;">Empty</p>
    @endif
</div>

<!-- Remember Token Field -->
<!--<div class="form-group">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    <p>{{ $employee->remember_token }}</p>
</div>-->

