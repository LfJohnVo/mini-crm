<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $companie->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    @if($companie->email != NULL)
    <p>{{$companie->email}}</p>
    @else
        <p style="color: red;">Empty</p>
    @endif
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
    @if($companie->website != NULL)
        <p>{{$companie->website}}</p>
    @else
        <p style="color: red;">Empty</p>
    @endif
</div>

