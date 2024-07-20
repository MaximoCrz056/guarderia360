@extends('layouts.app')

@section('template_title')
    Employees
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Personal') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('employees.create') }}" class="btn btn-success btn-sm float-right"  data-placement="left">
                                  {{ __('Agregar') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
                                        
									<th >Nombre (s)</th>
									<th >Apellido Paterno</th>
									<th >Apellido Materno</th>
									<th >Cargo</th>
									<th >Estatus</th>
									<th >Foto</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td>{{ $employee->id }}</td>
                                            
										<td >{{ $employee->name }}</td>
										<td >{{ $employee->middlename }}</td>
										<td >{{ $employee->lastname }}</td>
										<td >{{ $employee->jobtitle }}</td>
										<td >{{ $employee->status }}</td>
										<td ><img src="{{ asset($employee->photo) }}" width="100" height="100" alt="Foto"></td>

                                            <td>
                                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('employees.show', $employee->id) }}"><i class="bi bi-eye"></i></a>
                                                    <a class="btn btn-sm btn-warning " href="{{ route('employees.edit', $employee->id) }}"><i class="bi bi-pen"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Estás seguro de borrar?') ? this.closest('form').submit() : false;"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $employees->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
