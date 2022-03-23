@extends('layouts.app')

@section('content')
<div class="edit-page-container">

        <div class="account-details-container">
            <div id="modify-field" class="modify-field">
            <button class="modify-btn" id="modify-btn">Éditer</button>
            </div>


            <span class="account-area-title">Information du compte</span>

            <span class="vr"></span>
            
            <form class="edit-form-container" method="POST" action="/account/{{auth()->user()->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                <div class="input-field">
                <label for="first-name">Prenom :</label>
                <input type="text" name="first_name" id="input-first-name" value="{{auth()->user()->first_name}}" disabled class="form-control @error('first_name') is-invalid @enderror">

                                @error('first_name')
                                <script>
                                        document.getElementById("input-first-name").style.borderColor = "red";
                                </script>
                                @enderror
                
                </div>
                <br>
                <div class="input-field">
                <label for="last-name">Nom :</label>
                <input type="text" name="last_name" id="input-last-name" value="{{auth()->user()->last_name}}" disabled class="form-control @error('last_name') is-invalid @enderror">

                                @error('last_name')
                                <script>
                                        document.getElementById("input-last-name").style.borderColor = "red";
                                </script>
                                @enderror

                </div>
                <br>
                <div class="input-field">
                <label for="email">Email :</label>
                <input type="text" name="email" value="{{auth()->user()->email}}" disabled >
                </div>
                <br>
                <div class="input-field">
                <label for="phone">Telephone :</label>
                <input type="text" name="phone" maxlength="10" id="input-phone" value="{{auth()->user()->phone}}" disabled class="form-control @error('phone') is-invalid @enderror">

                                @error('phone')
                                <script>
                                        document.getElementById("input-phone").style.borderColor = "red";
                                </script>
                                @enderror
                </div>
             
                <br>
                

                <input type="button" class="cancel-btn" id="cancel-btn" value="Annuler"/>
                <input type="submit" class="save-btn" id="save-btn" value="Enregistrer">
            </form>
            
        </div>
        <br>
        <div class="address-details-container">
        
            <span class="address-area-title">Adresse</span>
        
            <span class="vr"></span>
        
                <div class="address-card-container">
                    @foreach ($address as $address)

                    <div class="address-card">
                        <form action="/account/{{auth()->user()->id}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="card-name">
                                <span class="name-icon"></span>
                                <input type="text" name="name" value="{{$address->full_name}}" placeholder="Nom Complet" disabled>
                            </div>
                            <div class="card-phone">
                                <span class="phone-icon"></span>
                                <input type="text" name="phone" value="{{$address->phone}}" placeholder="Télephone" disabled>
                            </div>
                            <div class="card-address">
                                <span class="address-icon"></span>
                                <input type="text" name="address-line1" value="{{$address->address_line1}}" placeholder="Addresse ligne 1" disabled>
                                <input type="text" name="address-line2" value="{{$address->address_line2}}" placeholder="Addresse ligne 2" disabled>
                            </div>

                            <input type="text" name="postal" value="{{$address->postal_code}}" placeholder="Code Postal" disabled>
                            <input type="text" name="city" value="Rabat" placeholder="Ville" disabled>
                            
                        </form>
                    </div>

                     @endforeach
                    
                    
                </div>
        </div>

    </div>
@endsection
