<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dicas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex flex-row">
                                <div class="p-2">
                                    <h4 class="card-title">Suas dicas cadastradas</h4>
                                </div>
                                <div class="ml-auto p-2">
                                    <button type="button" class="btn btn-sm btn-outline-success" data-toggle="modal"
                                        data-target="#adicionar">Adicionar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Descrição</th>
                                        <th>Opções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tips as $tip)
                                        <tr data-key="{{ $tip->id }}">
                                            <th scope="row">{{ $tip->id }}</th>
                                            <td>{{ $tip->name }}</td>
                                            <td>{{ $tip->description }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-outline-warning"
                                                    href="{{ route('tips.edit', ['tip' => $tip]) }}">Editar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="adicionar" tabindex="-1" role="dialog" aria-labelledby="adicionarTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Nova dica</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-adicionar" action="{{ route('tips.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">Nome</label>
                                <input type="text" name="name" id="name" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="description">Dica</label>
                                <input type="text" name="description" id="description"
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="type">Tipo</label>
                                <select name="type_id" id="type" class="form-control">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="brand">Marca</label>
                                <select name="brand_id" id="brand" class="form-control">

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="model">Modelo</label>
                                <input type="text" name="model" id="model" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="version">Versão</label>
                                <input type="text" name="version" id="version" class="form-control form-control-sm">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" form="form-adicionar" class="btn btn-outline-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
