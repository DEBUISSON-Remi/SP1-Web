@include('layouts.app')
<h1 align="center">Liste des Praticiens</h1>
<br>

<table class="table table-striped">
    <thead>
    <tr>
        <th class="text-active">Nom</th>
        <th class="text-active">Prénom</th>
        <th class="text-active">Profession médicale</th>
        <th class="text-active">Adresse</th>
        <th class="text-active">Télephone</th>
        <th class="text-active">Action</th>
    </tr>
    </thead>
    <tbody>
    @forelse($users as $user)
        <tr>
            <td class="text-active">{{$user->firstname}}</td>
            <td class="text-active">{{$user->lastname}}</td>
            <td class="text-active">{{$user->complementarySpeciality}}</td>
            <td class="text-active">{{$user->address}}</td>
            <td class="text-active">{{$user->tel}}</td>
            <td>
                @if(count($user->visits) > 0)
                    <button type="button" class="btn btn-dark" data-toggle="modal"
                            data-target="#modal-{{ $user->id }}">Visites</button>
                    <div class="modal fade" id="modal-{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Visites</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @forelse($user->visits as $visit)
                                        <div>
                                            <p>{{$visit->employee->firstname}} {{$visit->employee->lastname}}</p>
                                            <p>Le : {{ $visit->attendedDate }}</p>
                                            @forelse($visit->visits_reports as $visitReport)
                                                <p>{{$visitReport->comment}}</p>
                                            @empty

                                            @endforelse
                                            <p>Etat : {{$visit->visit_state->name}}</p>
                                        </div>
                                        <hr>
                                    @empty

                                    @endforelse
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </td>
        </tr>
    @empty

    @endforelse
</table>
</tbody>
