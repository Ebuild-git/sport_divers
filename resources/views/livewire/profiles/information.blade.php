<div>
    @include('components.alert')

    <form wire:submit="update_user">


        <div class="row gx-3 mb-3">
            {{--  <div class="col-md-6">
                <label class="small mb-1" for="nom">Nom</label>

                <input type="text" value=" {{ Auth::user()->nom }}" wire:model="nom" class="form-control"
                    style="font-size: 18px; font-weight: bold;">
                @error('nom')
                    <span class="text-danger small"> {{ $message }} </span>
                @enderror
            </div> --}}
            <div class=" col-md-6 input-validator">
                <label class="small mb-1" for="nom">Nom</label>
                <input wire:model="nom" type="text" {{ Auth::user()->nom }} class= "form-control"
                    style="font-size: 18px; color:black">
                @error('nom')
                    <span class="small text-danger">
                        {{ $message }}
                    </span>
                @enderror

            </div>

            {{-- <div class="col-md-6">
                <label class="small mb-1" for="prenom">Prénom</label>
                <input type="text" value=" {{ Auth::user()->prenom }}" wire:model="prenom" class="form-control"
                    style="font-size: px; font-weight: bold;">
                @error('prenom')
                    18
                    <span class="text-danger small"> {{ $message }} </span>
                @enderror
            </div> --}}
            <div class=" col-md-6 input-validator">
                <label class="small mb-1" for="prenom">Prénom</label>
                <input wire:model="prenom" type="text" {{ Auth::user()->prenom }} class= "form-control"
                    style="font-size: 18px; color:black">
                @error('prenom')
                    <span class="small text-danger">
                        {{ $message }}
                    </span>
                @enderror

            </div>
        </div>

        <div class="row gx-3 mb-3">

            <div class="col-md-6">
                <label class="small mb-1" for="inputOrgName">Email</label>

                <input type="text" value=" {{ Auth::user()->email }}" wire:model="email" class= "form-control"
                    style="font-size: 18px; color:black">
                @error('email')
                    <span class="text-danger small"> {{ $message }} </span>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="small mb-1" for="inputLocation">Téléphone</label>

                <input value=" {{ Auth::user()->phone }}" wire:model="phone" id="inputLocation" type="text"
                    class= "form-control" style="font-size: 18px; color:black">
                @error('phone')
                    <span class="text-danger small"> {{ $message }} </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">

            <label class="small mb-1" for="adresse">Addresse</label>
            <input type="text" value=" {{ Auth::user()->adresse }}" wire:model="adresse"
                style="font-size: 18px; color:black" class= "form-control">
            @error('adresse')
                <span class="text-danger small"> {{ $message }} </span>
            @enderror
        </div>

        <div class="modal-footer center">
            <button class="btn btn-primary"  style=" background-color: #b2e21522;" type="submit">

                <i class="fa fa-save mr-1"></i>
                Confirmer les changements
            </button>
        </div>
    </form>


</div>
