@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header">Resultados del Torneo Mundial del 21 start!!!
                    <a  href="/baraja/borrar" class="btn btn-danger"> Borrar Registros</a>
                </div>

                <div class="card-body">
    
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr class="table-success">
                            <th >Nombre</th>
                            <th >Numero</th>
                        </tr>
                        </thead>
                        <tbody>
                    
                           @foreach($resultados as $r)
                               <tr>
                            <td>{{$r->nombre}}</td>
                            <td>{{$r->numero}}</td>
                               </tr>
                           @endforeach
                     
                        
                        </tbody>
                    </table>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
