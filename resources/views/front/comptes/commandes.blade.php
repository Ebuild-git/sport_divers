@extends('front.fixe')
@section('titre', 'Mes commandes ')
@section('body')


<main>
    <div class="breadcrumb">
        <div class="container">
            <h2>Mes Commandes</h2>
          
        </div>
    </div>
<div class="page-content-wrapper">
    <div class="page-content">
        <section class="cart-area pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                    {{--     @livewire('Front.Favoris') --}}
                   {{--  @livewire('Commandes.MesCommandes') --}}
                   <div>
                    <div id="content">
                        
                        <div class="wishlist">
                            <div class="container">
                                <div class="wishlist__table">
                                    <div class="wishlist__table__wrapper">
                                        <table>
                                            <colgroup>
                                                <col style="width: 20%" />
                                                <col style="width: 10%" />
                                               
                                                <col style="width: 15%" />
                                                <col style="width: 10%" />
                                                <col style="width: 20%" />
                                            </colgroup>
                                            <thead  style=" background-color: #b2e21522;">
                                                <tr>
                                                    <th style="width: 80px;">Article</th>
                                                    <th class="product-thumbnail">Montant</th>
                                                    <th class="product-thumbnail">Frais</th>
                                                   
                                                    <th class="product-thumbnail">Date</th>
                                                    <th class="product-quantity">Statut</th>
                                                    <th class="product-remove">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($commandes as $key => $commande)
                                                                <tr>
                                                                    <td>
                                                                       
                                                                        {{ $commande->contenus->count() }}
                                                                    </td>
                                                                    <td >
                                                                        {{ $commande->montant() }} DT
                                                                    </td>
                                                                    <td>
                                                                        {{ $commande->frais ?? 0}} DT
                                                                    </td>
                                                                    <td>
                                                                        {{ $commande->created_at }}
                                                                       
                                                                    </td>
                                                                    <td>
                                                                        
                                                                        {{ $commande->statut }}
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{ route('print_commande',['id'=> $commande->id ]) }}" class="btn btn-sm btn-dark">
                                                                            <img width="20" height="20" src="https://img.icons8.com/wired/20/FFFFFF/bill.png" alt="bill"/>
                                                                            Facture
                                                                        </a>
                                                                    </td>
                                                                   
                                                                </tr>
                                                            @empty
                                                            <tr>
                                                                <td colspan="6 ">
                                                                    
                                                                    <div class="text-center p-5"><img width="50" height="50" src="https://img.icons8.com/?size=100&id=15867&format=png&color=000000" alt="shopping-cart--v1"/>
                                                                        <br>
                                                                        <h5>
                                                                        Pas de  commandes enregistrées pour l'instant.
                                                                        </h5>

                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforelse
                                                        </tbody>
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
        </section>
    </div>
</div>


    {{-- <div class="page-content-wrapper">
        <div class="page-content">
            <section class="cart-area pt-150 pb-150">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form action="#">
                                <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead style="background-color: #b9e479;color: white !important;">
                                            <tr>
                                                <th class="product-thumbnail">Date</th>
                                                <th class="cart-product-name">Montant</th>
                                                <th class="product-price">Frais</th>
                                                <th class="product-quantity">Statut</th>
                                                <th class="product-subtotal">Articles</th>
                                                <th class="product-remove">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($commandes as $key => $commande)
                                                <tr>
                                                    <td>
                                                        {{ $commande->created_at }}
                                                    </td>
                                                    <td >
                                                        {{ $commande->montant() }} DT
                                                    </td>
                                                    <td>
                                                        {{ $commande->frais ?? 0}} DT
                                                    </td>
                                                    <td>
                                                        {{ $commande->statut }}
                                                    </td>
                                                    <td>
                                                        {{ $commande->contenus->count() }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('print_commande',['id'=> $commande->id ]) }}" class="btn btn-sm btn-dark">
                                                            <img width="20" height="20" src="https://img.icons8.com/wired/20/FFFFFF/bill.png" alt="bill"/>
                                                            Facture
                                                        </a>
                                                    </td>
                                                   
                                                </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6">
                                                    <div class="text-center p-5">
                                                        <img width="100" height="100" src="https://img.icons8.com/pastel-glyph/100/578b07/shopping-cart--v2.png" alt="shopping-cart--v2"/>
                                                        <br>
                                                        <h5>
                                                            Aucune commande enregistrée pour l'instant.
                                                        </h5>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div> --}}

</main>

@endsection
