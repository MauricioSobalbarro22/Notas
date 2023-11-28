@extends('layouts.plantilla')

@section('titulo', 'Tus notas')

@section('contenido')
    <br><br>
    <h1>Tus notas
        <span>
        <a class="btn btn-success" href="{{ route('notas.create') }}">Crear nota
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
            <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5"/>
            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
            </svg>
        </a>
    </span>
    </h1>
<!--Notas de usuario-->
    <div class="table table-striped">
        @forelse($notas as $nota)
<div class="from" >
            <div class="card text-center bg-dark text-white"
                 style="padding: 10px; border: 5px solid {{isset($nota->color)?$nota->color : '#212529'}};" >
                <div class="card-header">
                    <ul class="nav navbar-expand-lg ">
                        <li class="nav-item"> <!--auth()->user()->id->-->
                            <a class="btn btn-outline-warning "  href="{{route('notas.edit',$nota->id )}}">Editar</a>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-outline-danger"  data-bs-toggle="modal" data-bs-target="#modal{{$nota->id}}">Eliminar</button>
                            <!-- Modal -->
                            <div class="modal fade" id="modal{{$nota->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-dark text-white">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar cliente</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body bg-dark text-white" >
                                            ¿Desea realmente eliminar la nota {{$nota->nombre}}?
                                        </div>
                                        <div class="modal-footer bg-dark text-white">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                            <form method="post" action="{{route('notas.destroy', $nota->id)}}">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" value="Eliminar" class="btn btn-danger">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item">
                            <p class="card-text text-secondary">  Creada el {{$nota->created_at}}</p>
                        </li>

                        <li class="nav-item">
                            <span class="navbar-text text-primary">{{$nota->etiqueta}}</span>
                        </li>

                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$nota->titulo}}</h5>
                    <div class="mb-3 ">
                <textarea class="form-control bg-dark text-white "
                          id="floatingTextarea2Disabled" style="height: 70px" disabled
                          name="nota" id="nota" rows="2">{{$nota->contenido}}</textarea>
                    </div>
                </div>
            </div>

            <br>
        @empty

                <h3 class=" text-success" >No tienes notas aún</h3>

        @endforelse
    </div>
    {{$notas->links()}}


@endsection


