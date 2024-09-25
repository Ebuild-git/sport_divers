<div>
    <div>
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
        <form id="contact-form" class="contact-form" wire:submit="save">
    
            <div class="row">
    
                <div class="col-lg-6">
                    <div class="from-control">
                        <input wire:model="nom" type="text" placeholder="Votre nom" id="name" required="required">
                        @error('nom')
                            <span class="small text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
    
    
    
                <div class="col-lg-6">
                    <div class="from-control">
                        <input wire:model="email" type="email" placeholder="E-Mail" id="email" required="required">
                        @error('email')
                            <span class="small text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="from-control">
                        <input wire:model="telephone" type="number" placeholder="Votre téléphone" id="telephone"
                            required="required">
                        @error('telephone')
                            <span class="small text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
    
                <div class="col-lg-6">
                    <div class="from-control">
                        <input wire:model="birthdate" type="date" placeholder="Age" id="birthdate" required="required">
                        @error('birthdate')
                            <span class="small text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
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
                 <div class="col-lg-12 mt-2">
                    <div class="from-control">
                        <div class="form-group">
                            <label for="group">Group</label>
                            <select  wire:model="designation" class="form-control">
                                @foreach($groups as $group)
                                    <option value="{{ $group['id'] }}">{{ $group['designation'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div> 
    
            </div>
           <br>
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
