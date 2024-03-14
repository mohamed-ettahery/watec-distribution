@component('mail::message')
    # Message de la page de contact

    Name: {{ $name }}
    Email: {{ $email }}
    Téléphone: {{ $phone }}
    Sujet: {{ $subject }}

    {{ $message }}
@endcomponent
