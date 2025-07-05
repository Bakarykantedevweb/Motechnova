@extends('layouts.frontend')

@section('content')
<section class="py-5 text-center">
    <div class="container">
        <div class="alert alert-success py-4 px-5 shadow-sm border-0 rounded">
            <h1 class="mb-3 fw-bold text-success">🎉 Paiement réussi !</h1>
            <p class="fs-5">Merci pour votre commande. Vous avez désormais accès à vos formations.</p>

            <div class="mt-4">
                <a href="" class="btn btn-success fw-bold px-4 py-2">
                    🎓 Accéder à mes formations
                </a>
                <a href="" class="btn btn-outline-secondary fw-bold px-4 py-2 ms-2">
                    Retour à l’accueil
                </a>
            </div>
        </div>
    </div>
</section>
@endsection