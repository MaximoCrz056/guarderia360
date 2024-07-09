@extends('layouts.app')

@section('template_title')
    {{ $child->name ?? __('Show') . " " . __('Child') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Child</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('children.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $child->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Middlename:</strong>
                                    {{ $child->middlename }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Lastname:</strong>
                                    {{ $child->lastname }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Birthdate:</strong>
                                    {{ $child->birthdate }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Parent Id:</strong>
                                    {{ $child->parent_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Photo:</strong>
                                    {{ $child->photo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Gender:</strong>
                                    {{ $child->gender }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Height:</strong>
                                    {{ $child->height }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Weight:</strong>
                                    {{ $child->weight }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Description:</strong>
                                    {{ $child->description }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
