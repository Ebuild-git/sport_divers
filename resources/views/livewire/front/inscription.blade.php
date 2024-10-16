<div>
    <div>

        <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js"></script>
        @livewireStyles

        @if (session()->has('error'))
            <div class="alert alert-danger p-3 small">
                {{ session('error') }}
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success p-3 small">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Vous avez déjà fait une inscription.</strong>
            </div>
        @endif
        <form id="contact-form" class="contact-form" wire:submit="save">

            <div class="row">

                <div class="col-lg-6">
                    <div class="from-control">
                        <input wire:model="firstName" type="text" placeholder="Votre nom*" id="firstName"
                            required="required">
                        @error('firstName')
                            <span class="small text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="from-control">
                        <input wire:model="lastName" type="text" placeholder="Votre prénom*" id="lastName"
                            required="required">
                        @error('lastName')
                            <span class="small text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>



                <div class="col-lg-6">
                    <div class="from-control">
                        <input wire:model="email" type="email" placeholder="E-Mail*" id="email"
                            required="required">
                        @error('email')
                            <span class="small text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="from-control">
                        <input wire:model="telephone" type="number" placeholder="Votre téléphone*" id="telephone"
                            required="required">
                        @error('telephone')
                            <span class="small text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6">
                    <style>
                        /* Par défaut, cacher l'élément */
                        .mobile-only {
                            display: none;
                        }

                        /* Afficher uniquement sur mobile (moins de 768px) */
                        @media screen and (max-width: 768px) {
                            .mobile-only {
                                display: block;
                            }
                        }
                    </style>
                    </style>
                    <label for="birthdate" class="mobile-only">Date de naissance*</label>
                    <div class="from-control">
                        <input wire:model="birthdate" type="date" placeholder="Date de naissance" id="birthdate"
                            required="required">
                        @error('birthdate')
                            <span class="small text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>


                    <script>
                        // Calculer la date maximale autorisée (18 ans en arrière à partir d'aujourd'hui)
                        const today = new Date();
                        const maxDate = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());
                        document.getElementById('birthdate').setAttribute('max', maxDate.toISOString().split('T')[0]);
                    </script>
                </div>

                <div class="col-lg-6">
                    <div class="form-control col-lg-12">
                        <div class="row no-border">
                            <div class="col my-auto ">
                                <input type="radio" id="Femme" name="gender" wire:model='gender' required>
                                <label for="Femme">Femme</label>
                            </div>
                            <div class="col my-auto ">
                                <input type="radio" id="Homme" name="gender" wire:model='gender' required>
                                <label for="Homme">Homme</label>
                            </div>

                        </div>
                        @error('gender')
                            <span class="small text-danger error-message">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <br><br>
                <div class="col-lg-6">
                    <div class="form-control col-lg-12 p-1">
                        <input wire:model="cin" type="text" placeholder="CIN" id="cin"
                            class="input-field no-border w-100" required maxlength="8" pattern="[01][0-9]{7}"
                            title="CIN doit avoir 8 chiffres, et le premier chiffre doit être 0 ou 1"
                            oninput="this.value = this.value.slice(0, 8);">
                        @error('cin')
                            <span class="small text-danger error-message">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <input  class="form-check-input switch" type="checkbox" id="group" wire:model.lazy="group" wire:click="group">
                    <label class=" col-lg-12 mt-2 form-check-label" for="group">
                         Group Externe
                    </label>
                    @error('group')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
                
              {{--  <div class="col-lg-12 mt-2">
                    <div class="form-check form-switch">
        
                         <input name="group"  class="form-check-input switch"   type="checkbox" id="group" wire:model.lazy="group"
                           wire:click="group"> 

                                  <label class="form-check-label" for="group">Groupes Externes</label>
                          @error('group')
                            <span class="text-danger small"> {{ $message }} </span>
                        @enderror
                    </div>
                </div> --}}
                @if(!$group)
                <div class="col-lg-12 mt-2">
                    <div class="from-control">
                        <div class="form-group">
                         {{--    <label for="group">Groupe*</label> --}}
                            <select wire:model="group" class="form-control" required>
                                <option value="">Sellectionnez le groupe</option>
                                @foreach ($groups as $group)
                                    <option value="{{ $group['id'] }}">{{ $group['designation'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-lg-12 mt-2">
                    <div class="from-control">
                        <div class="form-group">
                            <label for="group">Groupes Externes*</label>
                            <select wire:model="group" class="form-control" required>
                                <option value="">Sellectionnez le groupe</option>
                                @foreach ($extern_groups as $group)
                                    <option value="{{ $group['id'] }}">{{ $group['designation'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                @endif
                

                <div class="col-lg-12 mt-2">
                    <div class="form-group">
                        <input wire:model="terms" type="checkbox" id="terms" required aria-required="true">
                        <label for="terms" class="form-check-label">
                            J'accepte les <a href="#" id="openTermsModal">termes et conditions</a>*
                        </label>
                        @error('terms')
                            <span class="small text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

            </div>
 @include('livewire.front.condition') 
<br>

            <div class="submit-btn">
                <button class="readon" type="submit">
                    <span wire:loading>
                        <img src="/icons/kOnzy.gif" height="20" width="20" alt="" srcset="">
                    </span>
                    Confirmation
                </button>
            </div>
        </form>


        <style>
            .no-border {
                border: solid 1px white !important;
                box-shadow: none !important;
                height: 38px;
                width: 100%;
                outline-style: none !important;
            }
        </style>
    </div>

</div>
