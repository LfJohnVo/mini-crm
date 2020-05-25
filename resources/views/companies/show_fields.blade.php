<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $companie->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $companie->email }}</p>
</div>

<!-- Logo Field -->
<div class="form-group">
    @if($companie->logo != NULL)
        <img src="{{asset($companie->logo)}}" style="width: 150px;">
    @else
        <p style="color: red;">Empty</p>
    @endif
</div>

<!-- Website Field -->
<div class="form-group">
    {!! Form::label('website', 'Website:') !!}
    <p>{{ $companie->website }}</p>
</div>

