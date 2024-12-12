@extends('layout')

@section('document')
    Visualizar Candidatos
@endsection

@section('content')
<h2>Candidatos</h2>
<hr>

<div class="container mt-5">
        <h2 class="mb-4">Lista de Candidatos para a vaga: {{$name}}</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Currículo</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($candidates as $candidate)
                <tr>
                    <td>{{ $candidate->name }}</td>
                    <td>{{ $candidate->email }}</td>
                    <td>
                        <a href="{{asset('assets/curriculum/'.$candidate->pdf_candidate) }}" class="btn btn-primary btn-sm" target="_blank">
                            Baixar Currículo
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>







@endsection
