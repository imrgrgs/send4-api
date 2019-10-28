@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Contatos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div >
                            <a  href="{{ route('novoContato') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('adicionar-contato-form').submit();">
                                {{ __('Adicionar Contato') }}
                            </a>

                            <form id="adicionar-contato-form" action="{{ route('novoContato') }}" method="GET" style="display: none;">
                                @csrf
                            </form>
                    </div>

                    <div  class="table-responsive">
                        <table class="table table-striped table-hover ">
                            <thead class="black white-text">
                                <tr>
                                  <th ><strong> ID </strong></th>
                                  <th ><strong> Nome </strong></th>
                                  <th ><strong> E-mail </strong></th>
                                  <th ><strong> Telefone </strong></th>
                                </tr>
                            </thead>   
                            <tbody> 
                               @foreach($contatos as $contato)
                                <tr>
                                    <td>  {{ $contato->id }} <td>
                                    <td>  {{ $contato->nome }} <td>
                                    <td>  {{ $contato->email }} <td>
                                    <td>  {{ $contato->telefone }} <td>
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
@endsection
