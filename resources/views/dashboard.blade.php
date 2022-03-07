<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Dicas cadastradas</h4>
                        </div>
                        <div class="card-body">
                            
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Descrição</th>
                                        <th>Usuário</th>
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
                                                {{$tip->user->name}}
                                            </td>
                                            <td>
                                                <a href="{{route('show.tip',['tipId' => $tip->id])}}" class="btn btn-sm btn-outline-warning">Mais informações</a>
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
</x-app-layout>
