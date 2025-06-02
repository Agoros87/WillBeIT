@component('mail::message')
    # Nuevo post creado

    El estudiante {{ $post->user->name }} ha creado un nuevo post en el centro {{ $post->user->center->name ?? 'N/A' }}.

    **Título:** {{ $post->title }}

    @component('mail::button', ['url' => route('posts.show', $post)])
        Ver post
    @endcomponent

    Gracias,<br>
    {{ config('app.name') }}
@endcomponent
