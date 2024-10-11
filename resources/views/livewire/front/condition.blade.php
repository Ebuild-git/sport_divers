
{{-- <div class="col-lg-12 mt-3">
    <div class="form-check">
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
</div> --}}

<!-- Modal -->
<div id="termsModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h5>Conditions Générales d'Utilisation</h5>
        <p>Bienvenue sur notre site dédié aux activités sportives ! En accédant à ce site, vous acceptez de
            respecter les conditions suivantes :</p>
        <h6>1. Acceptation des Conditions</h6>
        <p>En utilisant notre site, vous confirmez que vous avez lu, compris et accepté ces conditions. Si
            vous n'acceptez pas ces conditions, veuillez ne pas utiliser notre site.</p>

        <h6>2. Inscription des Adhérents</h6>
        <p>Pour participer à nos activités sportives, vous devez vous inscrire en tant qu’adhérent.
            L’inscription nécessite de fournir des informations personnelles, notamment votre nom, votre
            adresse e-mail, et d'autres détails pertinents.</p>


        <h6>3. Protection des Données</h6>

        <p>Nous nous engageons à protéger vos données personnelles. Toutes les informations que vous
            fournissez lors de votre inscription seront traitées conformément à notre politique de
            confidentialité.
        </p>

        <h6>4. Activités Sportives</h6>
        <p>
            Nous proposons une variété d'activités sportives, et nous nous réservons le droit de modifier ou
            d'annuler certaines activités selon les disponibilités et les conditions météorologiques.
        </p>

        <h6>5. Responsabilité</h6>
        <p>
            Nous ne sommes pas responsables des blessures ou des accidents survenant lors de la
            participation à nos activités. Il est de votre responsabilité de vous assurer que vous êtes apte
            à
            participer
        </p>
        <h6>6. Modifications des Conditions</h6>
        <p>
            Nous nous réservons le droit de modifier ces conditions à tout moment. Les modifications
            seront publiées sur cette page et prendront effet immédiatement.

        </p>
        <h6>7. Contact</h6>
        <p>
            Pour toute question concernant ces conditions, veuillez nous contacter à [indiquer l’adresse
            e-mail ou le numéro de téléphone].
        </p>
        <!-- Ajoutez le contenu complet de vos termes et conditions ici -->
        <div class="modal-footer">
            <button id="closeModal" class="btn btn-secondary">Fermer</button>
        </div>
    </div>
</div>

<!-- CSS -->
<style>
    /* Styles pour le modal */
    .modal {
    display: none; /* Caché par défaut */
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5); /* Fond semi-transparent */
}


    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        /* Centré */
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        /* Largeur du modal */
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<!-- JavaScript -->
<script>
    // Ouvrir le modal
    document.getElementById('openTermsModal').onclick = function() {
        document.getElementById('termsModal').style.display = "block";
    }

    // Fermer le modal
    document.querySelector('.close').onclick = function() {
        document.getElementById('termsModal').style.display = "none";
    }

    document.getElementById('closeModal').onclick = function() {
        document.getElementById('termsModal').style.display = "none";
    }

    // Fermer le modal en dehors du contenu
    window.onclick = function(event) {
        if (event.target == document.getElementById('termsModal')) {
            document.getElementById('termsModal').style.display = "none";
        }
    }
</script>
