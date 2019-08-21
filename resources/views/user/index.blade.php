@extends('layouts.app')
@section('content')
<ul class="nav justify-content-end pr-3">

    <li class="nav-item">
        <a class="nav-link active" href="#">Bienvenido {{ auth()->user()->name }}</a>
      </li>
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="post">
                @csrf
          <button type="submit" class="btn btn-primary" >Cerrar session</button>
        </form>
      </ul>



      <div class="container-fluid ">
        <div class="row">
          <div class="col-lg-3">
              <div class="card mt-5" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">Tú nombre en el sitio: <strong>{{ auth()->user()->name_user }}</strong></h5>
                    <h6 class="card-subtitle mb-2 text-muted"> Nombre: <strong>{{  auth()->user()->name }}</strong></h6>
                    <h6 class="card-subtitle mb-2 text-muted"> correo: <strong>{{  auth()->user()->email }}</strong></h6>
                    <h6 class="card-subtitle mb-2 text-muted"> ciudad: <strong>{{  auth()->user()->city }}</strong></h6>
                    <button class="btn btn-success btn-block" data-toggle="modal" data-target="#exampleModal">Agregar Hobby</button>
                  </div>
                </div>
          </div>


          <div class="col-9">
          
              @if (session()->has('flash'))
              <div class="alert alert-info" role="alert">
                  {{ session('flash') }}
              </div>
              @endif
                <ol class="ol ml-5 list-group mt-5">
                  
            @forelse (auth()->user()->hobbies as $item)
                <li class="list-group-item">{{ $item->name }}</li>
            @empty
            <li class="list-group-item"> <strong> !! No tienes hobbies asociados !!</strong></li>
            @endforelse
                </ol>
          </div>
        </div>
      </div>

      @include('user.modal-agregar-hobby');
@endsection