
<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edicion de usuario</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('uedit_hobby')}}" method="post">
            <div class="modal-body">
                            @csrf
                            
                             <div class="form-group {{ $errors->has('name')?'has-error': ''}}">
                                    <label class="text-center"> Nombre </label>
                                    <input type="text" id="name" name="name" placeholder="Ingresa tu nombre" class="form-control">
                                    {{ $errors->first('name',':message') }}
                                </div>
    
                                <div class="form-group {{ $errors->has('name_user')?'has-error': ''}}">
                                        <label class="text-center"> Nombre de usuario </label>
                                        <input id="name_user" type="text" name="name_user" placeholder="Ingresa tu nombre de usuario" class="form-control">
                                        {{ $errors->first('name_user',':message') }}
                                    </div>
                                 
    
                                        <div class="form-group {{ $errors->has('city')?'has-error': ''}}">
                                                <label class="text-center"> Ciudad </label>
                                                <input id="city" type="text" name="city" placeholder="Ingresa tu ciudad" class="form-control">
                                                {{ $errors->first('city',':message') }}
                                            </div>
    
                             <div class="form-group  {{ $errors->has('email')? 'has-error': ''}}">
                                 <label class="text-center"> Email </label>
                                 <input id="email" type="email" name="email" placeholder="Ingresa tu email" class="form-control">
                             {{ $errors->first('email',':message') }}
                                </div>
                             
                                    
                                    <input id="password" type="hidden" name="id" placeholder="Ingresa tu password" class="form-control">
                                    
                                
    
    
                            
                            
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-danger " value="editar">
            </div>
        </form>
          </div>
        </div>
      </div>

