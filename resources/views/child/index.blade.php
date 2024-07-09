@extends('layouts.app')

@section('template_title')
    Children
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Children') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('children.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Name</th>
									<th >Middlename</th>
									<th >Lastname</th>
									<th >Birthdate</th>
									<th >Parent Id</th>
									<th >Photo</th>
									<th >Gender</th>
									<th >Height</th>
									<th >Weight</th>
									<th >Description</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($children as $child)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $child->name }}</td>
										<td >{{ $child->middlename }}</td>
										<td >{{ $child->lastname }}</td>
										<td >{{ $child->birthdate }}</td>
										<td >{{ $child->parent_id }}</td>
										<td >{{ $child->photo }}</td>
										<td >{{ $child->gender }}</td>
										<td >{{ $child->height }}</td>
										<td >{{ $child->weight }}</td>
										<td >{{ $child->description }}</td>

                                            <td>
                                                <form action="{{ route('children.destroy', $child->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('children.show', $child->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('children.edit', $child->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $children->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
