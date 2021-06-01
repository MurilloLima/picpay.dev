@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Contas</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @include('includes.alerts')
                    <button class="btn table-primary m-2" data-toggle="modal" data-target="#add">Nova conta</button>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Conta</th>
                                <th>Saldo</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                            <tr>
                                <td>{{$item->email}}</td>
                                <td>{{$item->saldo}}</td>
                                <td><a href="{{ route('conta.delete', ['id'=>$item->id]) }}">remover</a></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">Nenhuma conta adicionada no momento.</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal add --}}
<div class="modal fade" id="add" tabindex="-2" role="dialog" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title">
                    Nova conta
                </h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('conta.store') }}" class="navbar-form" method="post">
                    @csrf
                    @method('post')
                    <div class="modal-body">
                        @include('form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-default">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection