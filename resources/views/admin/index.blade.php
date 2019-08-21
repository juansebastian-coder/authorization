@extends('layouts.app')

@section('content')
<ul class="nav p-2 justify-content-end mr-3">
    
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/adminUser') }}">usuarios</a>
      </li>
      
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
              <button type="submit" class="btn btn-primary" >Cerrar session</button>
            </form>
          </li>
          </ul>



          <div class="container-fluid ">
              @if (session()->has('flash'))
              <div class="alert alert-info" role="alert">
                  {{ session('flash') }}
              </div>
              @endif
              <div class="row">
                <div class="col-lg-3">
                    <div class="card mt-5" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">Tú nombre en el sitio: <strong>{{ auth()->user()->name_user }}</strong></h5>
                          <h6 class="card-subtitle mb-2 text-muted"> Nombre: <strong>{{  auth()->user()->name }}</strong></h6>
                          <h6 class="card-subtitle mb-2 text-muted"> correo: <strong>{{  auth()->user()->email }}</strong></h6>
                          <h6 class="card-subtitle mb-2 text-muted"> ciudad: <strong>{{  auth()->user()->city }}</strong></h6>
                          <button class="btn btn-warning btn-block "  onclick="pintar({{ auth()->user() }})"
                           data-toggle="modal" data-target="#editUser">Editar perfil</button>
                            
                        </div>
                      </div>
                </div>
      
      
                <div class="col-9">
                  <div class="m-auto w-75">
                    <button class="btn btn-success mt-5" data-toggle="modal" data-target="#exampleModal">Agregar Hobby</button>
                  <table class="table " >
                    <thead class="bg-dark text-white">
                      <tr>
                        <td>#</td>
                        <td>Hobby</td>
                        <td>opciones</td>
                      </tr>
                    </thead>
                    <tbody>
                  @forelse (auth()->user()->hobbies as $item)
                  <tr>
                    <td class="">{{ $item->id }}</td>
                    <td class="">{{ $item->name }}</td>
                    <td><form action="{{ route('') }}" method="post" >
                            @csrf
                      <input type="submit" class="btn btn-outline-primary" value="eliminar">
                    </form>
                    </td>
                  </tr>
                     
                  @empty
                  <div class="alert alert-info" role="alert"> No posees hobbies asociados</div>
                  @endforelse
                </tbody>
              </table>
            </div>
                </div>
              </div>
            </div>
      
            @include('user.modal-agregar-hobby')
            @include('admin.edit-user')

            
               
           
@endsection