@extends('layouts.app')


@section('content')
<ul class="nav p-2 justify-content-end mr-3">
        <li class="nav-item">
          <a class="btn btn-primary" href="{{ url('/register') }}">Registro</a>
        
      </ul>
    <div class="row">
        
    <div class="col-md-6 offset-md-4 ">
      
          @if (session()->has('flash'))
              <div class="alert alert-danger" role="alert">
                  {{ session('flash') }}
              </div>
          @endif



            <div id="flogin" class="jumbotron jumbotron-fluid">
                <div class="container">
                    <form action="{{ route('login')}}" method="post">
                        @csrf
                         <h2 class="text-center">Inicio sesion</h2>
                         <hr>
                         <div class="form-group  {{ $errors->has('email')? 'has-error': ''}}">
                             <label class="text-center"> Email </label>
                             <input type="email" name="email" placeholder="Ingresa tu email" class="form-control">
                         {{ $errors->first('email',':message') }}
                            </div>
                         <div class="form-group {{ $errors->has('password')?'has-error': ''}}">
                                <label class="text-center"> Password </label>
                                <input type="password" name="password" placeholder="Ingresa tu email" class="form-control">
                                {{ $errors->first('password',':message') }}
                            </div>

                         <input type="submit" class="btn btn-danger btn-block" value="Ingresar">
                        </form>
                </div>
              </div>
        </div>
    </div>
@endsection