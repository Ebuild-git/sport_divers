<!DOCTYPE html>
<html lang="fr">

<head>
      {!! $template->meta ?? "" !!}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $template->produit->nom }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="shortcut icon" href="{{ Storage::url($template->produit->photo) }}" type="image/x-icon">
    <meta property="og:title" content="{{ $template->produit->titre }}" />
    <meta property="og:description" content="{{ $template->produit->description }}" />
    <meta property="og:image" content="{{ Storage::url($template->produit->photo) }}" />
  
    <!-- End Meta Pixel Code -->
    @livewireStyles
</head>

<body>
    <div class="container pt-5 pb-5">
        <div class="header text-center">
            <h3>
                {{ $template->produit->nom }}
            </h3>
            <h4>
                <span class="badge bg-color">
                    سعر
                </span>
                @if ($template->produit->inPromotion())
                    <strike class="text-danger">
                        {{ $template->produit->prix }} DT
                    </strike>
                @endif
                <b>
                    {{ $template->produit->getPrice() }} DT
                </b>
            </h4>
        </div>
        <div class="row">
            <div class="containt col-sm-6 mx-auto">
                {!! $code !!}
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-sm-6 mx-auto ">
                @livewire('Developper.CommanderTemplate', ['template' => $template])

            </div>
        </div>
    </div>

    <style>
        .card {
            box-shadow: 0px 7px 22px 24px rgba(0, 0, 0, 0.1);
        }

        .containt img {
            max-width: 100%;
            height: auto;
        }

        .containt {
            word-wrap: break-word !important;
        }
        .btn-primary{
            background-color: #027461 !important;
            border: solid 1px #027461 !important;
        }
        .bg-color{
            background-color: #027461 !important;
            color: white !important;
        }
    </style>
    @livewireScripts
</body>

</html>
