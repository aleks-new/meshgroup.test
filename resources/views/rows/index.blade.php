@extends('template')
@section('main')
    @foreach($groups as $date => $rows)
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <a class="btn btn-link" data-toggle="collapse" href="#group{{ $loop->index }}" role="button" aria-expanded="false">
                        {{ $date }}
                    </a>
                </h5>
            </div>
            <div id="group{{ $loop->index }}" class="collapse">
                <div class="card-body">
                    <div class="row font-weight-bold">
                        <div class="col-sm-3">ID</div>
                        <div class="col-sm-9">NAME</div>
                    </div>
                    @foreach($rows as $row)
                        <div class="row">
                            <div class="col-sm-3">{{ $row->id }}</div>
                            <div class="col-sm-9">{{ $row->name }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
@endsection
