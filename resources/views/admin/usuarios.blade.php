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
               
      
      
                <div class="col-12">

                   
                  <div class="m-auto w-75 ">
                        @if (count($users)>0)
                        <table class="table mt-5" >
                                <thead class="bg-dark text-white">
                                  <tr>
                                    <td>#</td>
                                    <td>Nombre</td>
                                    <td>Nombre de usuario</td>
                                    <td>correo</td>
                                    <td>ciudad</td>
                                    <td>opciones</td>
                                  </tr>
                                </thead>
                                <tbody>
                              @foreach($users as $item)
                              <tr>
                                <td class="">{{ $item->id }}</td>
                                <td class="">{{ $item->name }}</td>
                                <td class="">{{ $item->name_user }}</td>
                                <td class="">{{ $item->email }}</td>
                                <td class="">{{ $item->city }}</td>
                                <td class="">
                                  <a  class="btn btn-outline-primary"  href="{{ route('editU',$item->id) }}">ver</a>
                                
                                </td>
                              </tr>
                                 
                              @endforeach
                            </tbody>
                          </table>

                          @else

                          <div class="alert alert-primary" role="alert">
                              No existen usuarios
                          </div>
                        @endif


                        
                  
            </div>
                </div>
              </div>
            </div>
      

            
               
           
@endsection