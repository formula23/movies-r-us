<x-mail::message>
# New Review Submission

{{ __('A review has been submitted for your movie: :movie_name', ['movie_name' => $review->movie->title]) }}

Rating: {{ $review->rating }}

Review:
{{ $review->comment }}

Submitted By: {{ $review->user->name }}

<x-mail::button :url="$url">
    View
</x-mail::button>

Thanks,
{{ config('app.name') }}
</x-mail::message>
