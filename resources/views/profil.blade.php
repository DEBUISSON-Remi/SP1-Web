@include('layouts.app')
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<div class="container mt-5">
    <div class="row">
        <div class="card">
            <div class="card-header"><h4>Profil</h4></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <img alt="User Pic"
                             src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg"
                             width="100%" height="auto" id="profile-image1" class="">
                    </div>
                    <div class="col-md-6">
                        <div class="container">
                            <h2>{{$user->lastname}} {{$user->firstname}}</h2>
                        </div>
                        <hr>
                        <ul class="container details">
                            <li><p><span class="glyphicon glyphicon-barcode one"
                                         style="width:50px;"></span>{{$user->code}}</p></li>
                            <li><p><span class="glyphicon glyphicon-envelope one"
                                         style="width:50px;"></span>{{$user->login}}</p></li>
                            <li><p><span class="glyphicon glyphicon-home one"
                                         style="width:50px;"></span>{{$user->address}}</p></li>
                            <li><p><span class="glyphicon glyphicon-map-marker one"
                                         style="width:50px;"></span>{{$user->postalCode}}, {{$user->city}}</p></li>
                            <li><p><span class="glyphicon glyphicon glyphicon-earphone one"
                                         style="width:50px;"></span>{{$user->phone}}</p></li>
                            <li><p><span class="glyphicon glyphicon-calendar one"
                                         style="width:50px;"></span>{{$user->entryDate}}</p></li>
                        </ul>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
