@extends('layouts.app')


@section('content')

    <div class="card">
        <h2>{{ $title }}</h2>

        <p>
            Vous souhaitez nous contactez ? Remplassez ci-dessous et nous vous répodrons dans les plus brefs délais.
        </p>
        @if (session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('contact.send') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nam :</label>
                <input type="text" name="name" id="name" class="from-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" class="from-control" required>
            </div>

            <div class="form-group">
                <label for="message">Message :</label>
                <textarea type="text" name="message" id="message" class="from-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Envoyer</button>
        </form>
    </div>
@endsection
