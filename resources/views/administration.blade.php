@include('layouts.app')
<h1 align="center">Dossiers visiteur médical</h1>
<br>

<style>

    h1{
        font-size: 30px;
        color: #fff;
        text-transform: uppercase;
        font-weight: 300;
        text-align: center;
        margin-bottom: 15px;
    }
    table{
        width:100%;
        table-layout: fixed;
    }
    .tbl-header{
        background-color: rgba(255,255,255,0.3);
    }
    .tbl-content{
        height:300px;
        overflow-x:auto;
        margin-top: 0px;
        border: 1px solid rgba(255,255,255,0.3);
    }
    th{
        padding: 20px 15px;
        text-align: left;
        font-weight: 500;
        font-size: 12px;
        color: #fff;
        text-transform: uppercase;
    }
    td{
        padding: 15px;
        text-align: left;
        vertical-align:middle;
        font-weight: 300;
        font-size: 12px;
        color: #fff;
        border-bottom: solid 1px rgba(255,255,255,0.1);
    }


    /* demo styles */

    @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
    body{
        background: -webkit-linear-gradient(left, #00c6ff, #0062cc);
        font-family: 'Roboto', sans-serif;
    }
    section{
        margin: 50px;
    }


    /* follow me template */
    .made-with-love {
        margin-top: 40px;
        padding: 10px;
        clear: left;
        text-align: center;
        font-size: 10px;
        font-family: arial;
        color: #fff;
    }
    .made-with-love i {
        font-style: normal;
        color: #F50057;
        font-size: 14px;
        position: relative;
        top: 2px;
    }
    .made-with-love a {
        color: #fff;
        text-decoration: none;
    }
    .made-with-love a:hover {
        text-decoration: underline;
    }


    /* for custom scrollbar for webkit browser*/

    ::-webkit-scrollbar {
        width: 6px;
    }
    ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    }
    ::-webkit-scrollbar-thumb {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    }
</style>



<section>

    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>Code</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Modifier</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        @forelse($admins as $admin)
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <tr>
                <td>{{$admin->code}}</td>
                <td>{{$admin->lastname}} </td>
                <td>{{$admin->firstname}}</td>
                <td><button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-{{$admin->id}}">Modifier</button>

                    <div class="modal fade" id="modal-{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('administration.update',$admin->id)}}" id="form-{{$admin->id}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <input type="text" style="color: black" placeholder="code" value="{{$admin->code}}" name="code">
                                        <input type="text" style="color: black" placeholder="Adresse" value="{{$admin->address}}" name="address"><hr>
                                        <input type="text" style="color: black" placeholder="Nom" value="{{$admin->lastname}}" name="lastname">
                                        <input type="text" style="color: black" placeholder="Code postal" value="{{$admin->postalCode}}" name="postalCode"><hr>
                                        <input type="text" style="color: black" placeholder="Prénom" value="{{$admin->firstname}}" name="firstname">
                                        <input type="text" style="color: black" placeholder="Ville" value="{{$admin->city}}" name="city"><hr>
                                        <input type="text" style="color: black" placeholder="Téléphone" maxlength="10" value="{{$admin->phone}}" name="phone">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="document.querySelector('#form-{{$admin->id}}').submit()">Modifier</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @empty
            @endforelse
            </tbody>
        </table>
    </div>
</section>


