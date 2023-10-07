<div class="container pt-3">
    {{-- action="{{ $action }}"= è un segnaposto  --}}
    <form action="{{ $action }}" class="row g-3" method="POST">
        @csrf()
        {{-- @method($method) = è un segnaposto --}}
        @method($method)

        <div class="col-12">
            <label for="inputTitle" class="form-label">Nome repository</label>
            {{-- value="{{ old('email'= ottenere il valore precedentemente inviato --}}
            {{-- , $name?->email) }} = stampare il valore di email --}}
            {{-- , $name?->email) }} = "?" se la variabile $name non è definito assegna "null"  --}}
            <input type="text" class="form-control @error('title') is-invalid @enderror"
                value="{{ old('title', $project?->title) }}" id="inputTitle" name="title">
            @error('title')
                <div class="invalid_feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12">
            <div class="form-floating">
                <textarea class="form-control @error('description')is-invalid @enderror" name="description"
                    placeholder="Leave a comment here" id="floatingTextarea">{{ old('description', $project?->description) }}</textarea>
                <label for="floatingTextarea">Descrizione</label>
                @error('description')
                    <div class="invalid_feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <label for="inputThumbnail" class="form-label">Miniatura</label>
            <input type="text"
                class="form-control @error('thumbnail')
                is-invalid
            @enderror"
                id="inputThumbnail" name="thumbnail" value="{{ old('thumbnail', $project?->thumbnail) }}">
            @error('thumbnail')
                <div class="invalid_feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputLink" class="form-label">Link</label>
            <input type="text" class="form-control @error('link')
                is-invalid
            @enderror"
                id="inputLink" name="link" value="{{ old('link', $project?->link) }}">
            @error('link')
                <div class="invalid_feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-2">
            <label for="inputDate" class="form-label">Data</label>
            <input type="date" class="form-control @error('date')
                is-invalid
            @enderror"
                id="inputDate" name="date" value="{{ old('date', $project?->date->format('Y-m-d')) }}">
            @error('date')
                <div class="invalid_feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-10">
            <label for="inputLanguage" class="form-label">Linguaggi</label>
            <input type="text"
                class="form-control @error('language')
                is-invalid
            @enderror"
                id="inputLanguage" name="language"
                value="{{ old('language', implode(', ', $project?->language ?? [])) }}">
            @error('language')
                <div class="invalid_feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Conferma</button>
            <a href="{{ $btnBack }}" class="btn btn-danger ">Indietro</a>
        </div>
    </form>
</div>
