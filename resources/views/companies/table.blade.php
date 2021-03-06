<div class="table-responsive">
    <table class="table text-center" id="companies-table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Logo</th>
            <th>Website</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($companies as $companie)
            <tr>
                <td>{{ $companie->name }}</td>
                <td>
                    @if($companie->email != NULL)
                        {{$companie->email}}
                    @else
                        <p style="color: red;">Empty</p>
                    @endif
                </td>
                <td>
                    @if($companie->logo != NULL)
                        <img src="{{asset($companie->logo)}}" style="width: 50px;">
                    @else
                        <p style="color: red;">Empty</p>
                    @endif
                </td>
                <td>
                    @if($companie->website != NULL)
                        {{$companie->website}}
                    @else
                        <p style="color: red;">Empty</p>
                    @endif
                </td>
                <td>
                    {!! Form::open(['route' => ['companies.destroy', $companie->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('companies.show', [$companie->id]) }}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('companies.edit', [$companie->id]) }}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $companies->links() }}
</div>
