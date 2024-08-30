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
                    <input  wire:model="email" type="email" placeholder="E-Mail" id="email" required="required">
                    @error('email')
                    <span class="small text-danger">
                        {{ $message }}
                    </span>
                @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="from-control">
                    <input wire:model="telephone" type="number" placeholder="Votre téléphone" id="telephone" required="required">
                    @error('telephone')
                    <span class="small text-danger">
                        {{ $message }}
                    </span>
                @enderror
                </div>
            </div>

            <div class="col-lg-6">
                <div class="from-control">
                    <input wire:model="age" type="number" placeholder="Age" id="age" required="required" >
                    @error('age')
                        <span class="small text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-control col-lg-12">
                    <select wire:model="gender" id="sexe" class="input-field w-100" >
                        <option value="">Sélectionnez votre sexe</option>
                        <option value="MALE">Homme</option>
                        <option value="FEMALE">Femme</option>
                    </select>
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
                    <input 
                        wire:model="cni"  
                        type="text" 
                        placeholder="CIN" 
                        id="cni" 
                        class="input-field w-100" 
                        required 
                        maxlength="8" 
                        pattern="[01]{2}[0-9]{6}" 
                        title="CIN doit avoir 8 chiffres et les deux premiers sont composés entre 0 et 1"
                        oninput="this.value = this.value.slice(0, 8);">
                    @error('cni')
                        <span class="small text-danger error-message">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            
          {{-- 
            <div class="col-lg-6">
                <div class="form-control col-lg-12 p-1">
                    <input wire:model="cni"  type="number" placeholder="CIN" id="cni" class="input-field w-100" required minlength="8" maxlength="8" pattern="[01]{2}[0-9]{6}" title="CIN doit avoir 8 chiffres et les deux premier sont composés entre 0 et 1">
                    @error('cni')
                        <span class="small text-danger error-message">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div> --}}

           

            <div class="col-lg-6">
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
                <textarea wire:model="message"  placeholder="Laissez votre message"  id="message" required="required"></textarea>
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

</div>
