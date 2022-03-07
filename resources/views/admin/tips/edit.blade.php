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
                                    <h4 class="card-title">Dica #{{ $tip->id }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('tips.update', $tip)}}" method="POST" id="update-form">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="name">Nome</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{old('name', $tip->name)}}" />
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="name">Descrição</label>
                                        <input type="text" name="description" id="description" class="form-control" value="{{old('description', $tip->description)}}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="type">Tipo</label>
                                        <select name="type_id" id="type" class="form-control">
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}" {{old('type_id', $tip->brand->type->id) == $type->id ? 'selected' : ''}} >{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="brand">Marca</label>
                                        <select name="brand_id" id="brand" class="form-control">
                                            <option value="{{$tip->brand->id}}">{{$tip->brand->name}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="model">Modelo</label>
                                        <input type="text" name="model" id="model" class="form-control form-control-sm" value="{{old('model', $tip->model)}}">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="version">Versão</label>
                                        <input type="text" name="version" id="version" class="form-control form-control-sm" value="{{old('version', $tip->version)}}">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex flex-row">
                                <div class="p-2">
                                    <form action="{{route('tips.destroy',['tip' => $tip])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Excluir</button>
                                    </form>
                                </div>
                                <div class="p-2 ml-auto">
                                    <button type="submit" form="update-form" class="btn btn-sm btn-outline-success">Alterar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
