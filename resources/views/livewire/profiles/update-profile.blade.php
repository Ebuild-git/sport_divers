<div>
    @include('components.alert')

    <form wire:submit="update_user">
        <div class="mb-3">

            <label class="form-label" for="RePassword">Ancien mot de passe</label>
            <input type="password" value=" {{ Auth::user()->old_password }}"placeholder="8 - 15 Characters"
                wire:model="old_password" class= "form-control" style="font-size: 18px; color:black">
            @error('old_password')
                <span class="text-danger small"> {{ $message }} </span>
            @enderror
        </div>
        <br>
        <div class="mb-3">
            <label class="form-label" for="RePassword">Nouveau mot de passe</label>
            <input type="password" placeholder="8 - 15 caractères" wire:model="password" class= "form-control"
                style="font-size: 18px; color:black">
            @error('password')
                <span class="text-danger small"> {{ $message }} </span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="RePassword">Confirmation</label>
            <input type="password" placeholder="8 - 15 Caractères" wire:model="password_confirmation"
                class= "form-control" style="font-size: 18px; color:black">
            @error('password_confirmation')
                <span class="text-danger small"> {{ $message }} </span>
            @enderror
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary"  style=" background-color: #b2e21522;" type="submit">

                <i class="fa fa-save mr-1"></i>
                Enregistrer les modifications
            </button>
        </div>
        {{--  <div class="row">


           


            <div class="mb-3" >
                <h5>
                    Changement de mot de passe
                </h5>
                <hr>
                <div class="tp-footer-input-box mb-20 p-relative">
                    <label class="form-label" for="RePassword">Ancien mot de passe</label>
                    <input type="password"   value=" {{ Auth::user()->old_password }}"placeholder="8 - 15 Characters" wire:model="old_password"
                        class="form-control" style="font-size: 20px; font-weight: bold;">
                    @error('old_password')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="tp-footer-input-box mb-20 p-relative">
                    <label class="form-label" for="Password">Nouveau mot de passe</label>
                    <input type="password" placeholder="8 - 15 caractères" wire:model="password" class="form-control" style="font-size: 20px; font-weight: bold;">
                    @error('password')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
                
                 <div class="tp-footer-input-box mb-20 p-relative">
                    <label class="form-label" for="RePassword">Confirmation</label>
                    <input type="password" placeholder="8 - 15 Caractères" wire:model="password_confirmation"
                        class="form-control" style="font-size: 20px; font-weight: bold;">
                    @error('password_confirmation')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="submit">
                    <span wire:loading>
                        <img src="https://i.gifer.com/ZKZg.gif" height="15" alt="" srcset="">
                    </span>
                    <i class="fa fa-save mr-1"></i>
                    Enregistrer les changements
                </button>
            </div>
        </div> --}}
    </form>
</div>
