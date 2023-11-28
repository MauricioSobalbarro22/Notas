@extends('layouts.plantilla')
@section('titulo','Formulario de notas')
@section('contenido')

    <br><br>

    <h1>{{isset($nota) ? 'Edita tu nota':'Crea tu nota '}}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{isset($nota) ? route('notas.update',$nota->id) : route('notas.store')}}">
        @if(isset($nota))
            @method('put')
        @endif
        @csrf

    <div class="form-floating mb-3 text-white">
        <input type="text" class="form-control bg-dark text-white" name="titulo" id="titulo"
        value="{{isset($nota) ? $nota->titulo : old('titulo')}}">
        <label for="titulo" class="form-label">Titulo</label>
    </div>

    <div class="mb-3 ">
        <label for="contenido" class="form-label ">Escribe una nota...</label>
        <textarea class="form-control bg-dark text-white" name="contenido" id="contenido" rows="10">
            {{isset($nota) ? $nota->contenido : old('contenido')}}
        </textarea>
    </div>

    <button type="submit" class="btn btn-outline-success">Guardar</button>
    <a class="btn btn-outline-danger" href="{{ route('notas.index') }}">Cancelar</a>
            <br><br>

     <div class="input-group mb-3 ">
         <label class="input-group-text bg-dark text-white" for="categoria">Categoria</label>
         <select class="form-select bg-dark text-white" name="categoria" id="categoria">

             <option selected>{{ isset($nota->categoria) ? $nota->categoria : old('categoria')}}</option>
             <option value="Personal">Personal</option>
             <option value="Trabajo">Trabajo</option>
             <option value="Escuela">Escuela</option>
             <option value="Casa">Casa</option>
         </select>
     </div>

    <div class="form-floating mb-3 text-white">
    <label for="exampleColorInput" class="form-label">Color:</label><br><br>
    <input type="color" class="form-control form-control-color bg-dark" name="color" id="color"
           value="{{isset($nota->color) ? $nota->color : old('color')}}" >
    </div>

    <div class="form-floating mb-3 text-white">
        <input type="text" class="form-control bg-dark text-white" name="etiqueta" id="etiqueta"
               value="{{isset($nota->etiqueta) ? $nota->etiqueta : old('etiqueta') }} ">
        <label for="etiqueta" class="form-label">Etiqueta</label>
    </div>

    </form>
@endsection
