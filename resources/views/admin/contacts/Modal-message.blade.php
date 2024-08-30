<!-- Center modal content -->
<div class="modal fade" id="message-{{ $cat->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="myCenterModalLabel">
              Nom:      <i class='bx bxs-message-rounded-dots' ></i>{{ $cat->nom }}
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>
             Sexe:       {{ $cat->gender ?? '' }}
                </p>
            </div>
            <div class="modal-body">
                <p>
             CNI:       {{ $cat->cni ?? '' }}
                </p>
            </div>
            <div class="modal-body">
                <p>
              Téléphone :    {{ $cat->telephone ?? '' }}
                </p>
            </div>
            <div class="modal-body">
                <p>
              Age :    {{ $cat->age ?? '' }}
                </p>
            </div>
            <div class="modal-body">
                <p>
            Message:        {{ $cat->message ?? '' }}
                </p>
            </div>



        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->