@extends('layouts.app')


@section('content')
<ul class="nav p-2 justify-content-end mr-3">
        <li class="nav-item">
          <a class="btn btn-primary" href="{{ url('/') }}">Login</a>
        
      </ul>
    <div class="row">
        
    <div class="col-md-6 offset-md-4 " >
            <div id="flogin" style="width: 80%;" class="jumbotron jumbotron-fluid">
                <div class="container">
                    <form action="{{ route('regis')}}" method="post">
                        @csrf
                         <h2 class="text-center">Nuevo usuario</h2>
                         <hr>
                         <div class="form-group {{ $errors->has('name')?'has-error': ''}}">
                                <label class="text-center"> Nombre </label>
                                <input type="text" name="name" placeholder="Ingresa tu nombre" class="form-control">
                                {{ $errors->first('name',':message') }}
                            </div>

                            <div class="form-group {{ $errors->has('name_user')?'has-error': ''}}">
                                    <label class="text-center"> Nombre de usuario </label>
                                    <input type="text" name="name_user" placeholder="Ingresa tu nombre de usuario" class="form-control">
                                    {{ $errors->first('name_user',':message') }}
                                </div>
                             

                                    <div class="form-group {{ $errors->has('city')?'has-error': ''}}">
                                            <label class="text-center"> Ciudad </label>
                                            <input type="text" name="city" placeholder="Ingresa tu ciudad" class="form-control">
                                            {{ $errors->first('city',':message') }}
                                        </div>

                         <div class="form-group  {{ $errors->has('email')? 'has-error': ''}}">
                             <label class="text-center"> Email </label>
                             <input type="email" name="email" placeholder="Ingresa tu email" class="form-control">
                         {{ $errors->first('email',':message') }}
                            </div>
                         <div class="form-group {{ $errors->has('password')?'has-error': ''}}">
                                <label class="text-center"> Password </label>
                                <input type="password" name="password" placeholder="Ingresa tu password" class="form-control">
                                {{ $errors->first('password',':message') }}
                            </div>

                            <div class="form-group ">
                                    <label class="text-center">Confirmacion del Password </label>
                                    <input type="password" name="password_confirmation" placeholder="Ingresa tu password nuevamente" class="form-control">
                                    
                                </div>

                         <input type="submit" class="btn btn-danger btn-block" value="Registrarme">
                        </form>
                </div>
              </div>
        </div>
    </div>
@endsection