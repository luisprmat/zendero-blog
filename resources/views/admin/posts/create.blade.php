<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('admin.posts.store', '#create') }}">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agrega el título de tu nueva publicación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {{-- <label for="post-title">Título de la publicación</label> --}}
                        <input type="text" name="title"
                            id="post-title" class="form-control @error('title') is-invalid @enderror"
                            placeholder="Ingresa aquí el título de la publicación"
                            value="{{ old('title') }}"
                            autofocus
                            required
                        >
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-primary">Crear publicación</button>
                </div>
            </div>
        </div>
    </form>
</div>

@push('my_scripts')
    <script>
        const modalCreate = $('#exampleModal')

        if (window.location.hash === '#create') {
            modalCreate.modal('show');
        }

        modalCreate.on('hide.bs.modal', () => {
            window.location.hash = '#';
        });

        modalCreate.on('shown.bs.modal', () => {
            $('#post-title').focus();
            window.location.hash = '#create';
        });
    </script>
@endpush
