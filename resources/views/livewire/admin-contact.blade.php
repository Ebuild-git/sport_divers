<div>
    @include('components.alert')


    <div class="card mb-8">
        <h5 class="card-header">Les configurations</h5>
        <form class="card-body" wire:submit="update_form" enctype="multipart/form-data">
            @csrf
           
            <div class="text-center bg-primary card my-auto p-1 mb-3">
                <h6 class="text-white">
                    Logo et images
                </h6>
            </div>
            <div class="row g-6">
                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Logo</label>
                    
                        <input type="file" wire:model="logo" accept="image/*" placeholder="votre logo" class="form-control">
                        @error('logo')
                            <span class="text-danger small"> {{ $message }} </span>
                        @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Icone</label>
                    
                        <input type="file" wire:model="icon" accept="image/*" placeholder="votre icone" class="form-control">
                        @error('icon')
                            <span class="text-danger small"> {{ $message }} </span>
                        @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Image page contact</label>
                    
                        <input type="file" wire:model="logocontact" accept="image/*" placeholder="votre icone" class="form-control">
                        @error('logocontact')
                            <span class="text-danger small"> {{ $message }} </span>
                        @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="multicol-username">Description</label>
                    
                        <textarea type="text" wire:model="description"  placeholder="description" rows="3" class="form-control"> </textarea>
                        @error('description')
                            <span class="text-danger small"> {{ $message }} </span>
                        @enderror
                </div>
               
            </div>

            <hr class="my-6 mx-n4" />
            <div class="text-center bg-primary card my-auto p-1 mb-3">
                <h6 class="text-white">
                    A propos de nous
                </h6>
            </div>
            <div class="row g-6">
                <div class="col-md-12">
                    <label class="form-label" for="multicol-username">Titre A propos de nous</label>
                    
                        <input type="text" wire:model="titre_apropos"  placeholder="Le titre " rows="3" class="form-control"> 
                        @error('titre_apropos')
                            <span class="text-danger small"> {{ $message }} </span>
                        @enderror
                </div>

                <div class="col-md-12">
                    <label class="form-label" for="multicol-username">Description à propos de nous</label>
                    
                        <textarea type="text" wire:model="des_apropos"  placeholder="La description" rows="3" class="form-control"> </textarea>
                        @error('des_apropos')
                            <span class="text-danger small"> {{ $message }} </span>
                        @enderror
                </div>
                 <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Les images à propos de nous </label>
                    
                        <input type="file" wire:model="photos"  multiple name="photos" accept="image/*" placeholder="Cargez les images" class="form-control">
                        @error('photos')
                            <span class="text-danger small"> {{ $message }} </span>
                        @enderror
                </div> 
                
                
                
               
            </div>
            <hr class="my-6 mx-n4" />
            <div class="text-center bg-primary card my-auto p-1 mb-3">
                <h6 class="text-white">
                    Les Addresses et réseaux sociaux
                </h6>
            </div>
            <div class="row g-6">
                <div class="col-md-12">
                    <label class="form-label" for="multicol-first-name">Addresse</label>
                    <input type="text"wire:model="addresse" id="multicol-first-name" class="form-control"
                        placeholder="Addresse" />
                        @error('addresse')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="multicol-last-name">Téléphone</label>
                    <input type="text"wire:model="telephone" id="multicol-last-name" class="form-control"
                        placeholder="Doe" />
                        @error('telephone')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="multicol-last-name">Fax</label>
                    <input type="number"wire:model="fax" id="multicol-last-name" class="form-control"
                        placeholder="Votre fax" />
                        @error('fax')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="multicol-country">Email</label>
                    <input type="email"wire:model="email" id="multicol-last-name" class="form-control"
                        placeholder="Email" />
                    @error('email')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label" for="multicol-country">Facebook</label>
                    <input type="text"wire:model="facebook" id="multicol-last-name" class="form-control"
                        placeholder="Facebook" />
                    @error('facebook')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="multicol-country">Instagram</label>
                    <input type="text" wire:model="instagram" id="multicol-last-name" class="form-control"
                        placeholder="Instagram" />
                    @error('instagram')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="multicol-country">TikTok</label>
                    <input type="text"wire:model="tiktok" id="multicol-last-name" class="form-control"
                        placeholder="TikTok" />
                    @error('tiktok')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="multicol-country">Youtube</label>
                    <input type="text"wire:model="youtube" id="multicol-last-name" class="form-control"
                        placeholder="Youtube" />
                    @error('youtube')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
               
               
               
            </div>


            <hr class="my-6 mx-n4" />
            <div class="text-center bg-primary card my-auto p-1 mb-3">
                <h6 class="text-white">
                    Les statistiques globales
                </h6>
            </div>
            <div class="row g-6">
                <div class="col-md-3">
                    <label class="form-label" for="multicol-first-name">Adhérents</label>
                    <input type="text"wire:model="adherent" id="multicol-last-name" class="form-control"
                        placeholder="Adherents" />
                    @error('adherent')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
               
                
               
                <div class="col-md-3">
                    <label class="form-label" for="multicol-first-name">Nombre de  coachs</label>
                    <input type="text"wire:model="coach" id="multicol-last-name" class="form-control"
                        placeholder="Coachs" />
                    @error('coach')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label" for="multicol-first-name">Tounoirs</label>
                    <input type="text"wire:model="tounoir" id="multicol-last-name" class="form-control"
                        placeholder="Tounoir" />
                    @error('tounoir')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="multicol-first-name">Scéances</label>
                    <input type="text"wire:model="seance" id="multicol-last-name" class="form-control"
                        placeholder="Scéance" />
                    @error('seance')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="pt-6">
                <span wire:loading>
                    <img src="https://i.gifer.com/ZKZg.gif" height="15" alt="" srcset="">
                </span>
                <i class="ri-save-line me-1 fs-16 lh-1"></i>
                <button type="submit" class="btn btn-primary me-4">Enregistrer les changements</button>
                
            </div>
        </form>
    </div>

</div>
