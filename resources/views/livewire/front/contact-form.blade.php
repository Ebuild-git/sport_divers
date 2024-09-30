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
                            <input type="radio" id="Homme" name="gender" wire:model='gender' required> 
                            <label for="Homme">Homme</label>
                        </div>
                        <div class="col my-auto ">
                            <input type="radio" id="Femme" name="gender" wire:model='gender' required>
                            <label for="Femme">Femme</label>
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
                        class="input-field no-border w-100" required maxlength="8"
                        pattern="[A-Za-z0-9]{8}"
                        title="Le CIN doit contenir exactement 8 caractères, avec des lettres ou des chiffres."
                        oninput="this.value = this.value.slice(0, 8);">
                    @error('cin')
                        <span class="small text-danger error-message">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            
          {{--   <div class="col-lg-6">
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
            </div> --}}
            <div class="col-lg-12 mt-2">
                <div class="from-control">
                    <input wire:model="sujet" type="text" placeholder="Sujet" id="subject" required="required">
                    @error('sujet')
                        <span class="small text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

        </div>
        <div class="from-control">
            <textarea wire:model="message" placeholder="Laissez votre message" id="message" required="required"></textarea>
            @error('message')
                <span class="small text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="submit-btn">
            <button class="readon" type="submit">
                <span wire:loading>
                    <img src="/icons/kOnzy.gif" height="20" width="20" alt="" srcset="">
                </span>
                Envoyez le Message
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
