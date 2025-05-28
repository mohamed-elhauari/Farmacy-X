@component('mail::message')
# Bonjour {{ $user->name }},

Le statut de votre commande **#CMD{{ $order->id }}** a été mis à jour.

**Nouveau statut**: {{ ucfirst($status) }}

Merci pour votre confiance.

@component('mail::button', ['url' => route('customer.orders.index')])
Voir ma commande
@endcomponent

Cordialement,  

Farmacy
@endcomponent