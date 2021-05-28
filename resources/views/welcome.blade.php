@include('layouts.app')

<h1 align="center">Bienvenue {{ session()->get('firstname') . ' ' . session()->get('lastname')}} !</h1>


