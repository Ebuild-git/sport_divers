@section('titre', 'Liste des videos')
@extends('admin.fixe')

@section('body')



    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item">
                                                <a href="javascript: void(0);">{{ config('app.name') }}</a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="{{ route('videos') }}">Galeries</a>
                                            </li>
                                            <li class="breadcrumb-item active">Liste</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- videos List Table -->

                        <div class="card radius-15">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="card-title">
                                        <h5 class="mb-0 my-auto">
                                            Liste des galeries
                                        </h5>
                                    </div>
                                    <div>
                                        {{-- <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                          data-bs-target="#import">
                                          <i class="ri-user-add-line"></i>
                                          Importer fiche exel
                                      </button> --}}


                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#add">
                                            <i class="ri-user-add-line"></i>
                                            Ajouter une galerie
                                        </button>
                                    </div>
                                </div>
                                <hr />
                                @include('components.alert')

                                <div class="table-responsive-sm">
                                    <table id="basic-datatable" class="datatables-users table" {{-- class="table table-striped dt-responsive nowrap w-100" --}}>
                                        <thead class="table-dark cusor">
                                            <tr>

                                                <th>Titre</th>
                                                <th>Image</th>

                                                <th>Video</th>

                                                <th>Date de création</th>
                                                <th scope="col" width="15%">Actions</th>


                                            </tr>

                                        </thead>


                                        <tbody>
                                            @forelse ($videos as $video)
                                                <tr>

                                                    <td>
                                                        {{ $video->titre }}
                                                    </td>
                                                    <td>
                                                         <img src="{{ Storage::url($video->image) }}" width="50" height="50"
                                                             class="rounded shadow" alt="">
                                                    </td>

                                                    <td>

                                                        <button type="button" class="btn btn-primary"
                                                            onclick="openModal('{{ Storage::url($video->video ?? ' ') }}')">Lire
                                                            la
                                                            vidéo</button>



                                                    </td>
                                                    </td>
                                                    <td>{{ $video->created_at }} </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col">
                                                                <form action="{{ route('videos.destroy', $video->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <input name="_method" type="hidden" value="DELETE">
                                                                    <button type="submit"
                                                                        class="btn btn-xs btn-danger btn-flat show_confirm"
                                                                        data-toggle="tooltip" title='Delete'>
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 24 24" width="20"
                                                                            style="background-color: #e0610d22; fill:#dbd7d7;"
                                                                            height="22" fill="currentColor">
                                                                            <path
                                                                                d="M6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455ZM13.4142 11L15.8891 8.52513L14.4749 7.11091L12 9.58579L9.52513 7.11091L8.11091 8.52513L10.5858 11L8.11091 13.4749L9.52513 14.8891L12 12.4142L14.4749 14.8891L15.8891 13.4749L13.4142 11Z">
                                                                            </path>
                                                                        </svg>
                                                                    </button>

                                                                </form>
                                                            </div>
                                                            <div class="col">

                                                                <a href="{{ route('video_update', ['id' => $video->id]) }}">
                                                                    <i class="ri-edit-2-line"></i>
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 24 24" width="35" hight="38"
                                                                        fill="currentColor">
                                                                        <path
                                                                            d="M16.7574 2.99677L9.29145 10.4627L9.29886 14.7098L13.537 14.7024L21 7.23941V19.9968C21 20.5491 20.5523 20.9968 20 20.9968H4C3.44772 20.9968 3 20.5491 3 19.9968V3.99677C3 3.44448 3.44772 2.99677 4 2.99677H16.7574ZM20.4853 2.09727L21.8995 3.51149L12.7071 12.7039L11.2954 12.7063L11.2929 11.2897L20.4853 2.09727Z">
                                                                        </path>
                                                                    </svg>

                                                                </a>

                                                            </div>

                                                        </div>




                                                    </td>


                                                </tr>

                                            @empty
                                                <tr>
                                                    <td colspan="9" class="text-center">Aucun video trouvé</td>
                                                </tr>

                                                <!-- Modal Structure -->
                                                <div class="modal fade" id="videoModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="videoModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">

                                                            </div>
                                                            <div class="modal-body">
                                                            <video id="videoPlayer" class="w-100 rounded shadow"
                                                                    width="400" height="500" controls>

                                                                    <source id="videoSource"
                                                                        src="{{ Storage::url($video->video ?? ' ') }}"
                                                                        type="video/mp4">


                                                                    Votre navigateur ne supporte pas la balise vidéo.
                                                                </video>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforelse

                                        </tbody>







                                    </table>
                                </div>


                            </div>
                        </div>


                    </div>



                </div>

            </div>




        </div>
    </div>
 

    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="myCenterModalLabel">
                        Ajouter une video à la  gallerie.
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{--  @livewire('Sponsors.AddSponsor',['sponsor'=> null]  ) --}}
                <form action="{{ route('store.video') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        @include('components.alert')
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="titre" class="form-label">Titre *</label>
                                    <input type="text" id="titre" name="titre" class="form-control">
                                    @error('titre')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description *</label>
                                    <textarea id="description" name="description" class="form-control"></textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="video" class="form-label">Vidéo *</label>
                                    <input type="file" id="video" name="video" class="form-control">
                                    @error('video')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image *</label>
                                    <input type="file" id="image" name="image" class="form-control">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                            </div>

                            <script>
                                document.getElementById('video').addEventListener('change', function() {
    var file = this.files[0];
    if (file.size > 100 * 1024 * 1024) { // 100MB
        alert('Le fichier est trop volumineux.');
        this.value = '';
    }
});

                            </script>




                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>


                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>


    <script>
        function openModal(url) {
            var videoPlayer = document.getElementById('videoPlayer');
            var videoSource = document.getElementById('videoSource');

            videoSource.src = url;
            videoPlayer.load();

            // Show the modal
            $('#videoModal').modal('show');
        }

        // Optional: Clean up video when the modal is hidden
        $('#videoModal').on('hidden.bs.modal', function() {
            var videoPlayer = document.getElementById('videoPlayer');
            videoPlayer.pause();
            videoPlayer.currentTime = 0;
        });
    </script>

    <script src="../../assets/js/app-user-list.js"></script>



    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Etre vous sur  de supprimer ?`,
                    text: " Faites un click sur OK pour supprimer.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>

@endsection
