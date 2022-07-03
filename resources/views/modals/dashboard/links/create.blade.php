<form action="{{ route('dashboard.links.store') }}" method="post">
    @csrf
    <div class="modal fade" id="CreateLinkModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">
                        Добавить ссылку
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="material_id" value="{{ $material->id }}">
                    <div class="form-floating mb-3">
                        <input name="title" type="text" class="form-control" placeholder="Добавьте подпись"
                               value=""
                               id="floatingModalSignature">
                        <label for="floatingModalSignature">Подпись</label>
                        <div class="invalid-feedback">
                            Пожалуйста, заполните поле
                        </div>

                    </div>
                    <div class="form-floating mb-3">
                        <input name="url" type="text" class="form-control"
                               value=""
                               placeholder="Добавьте ссылку" id="floatingModalLink">
                        <label for="floatingModalLink">Ссылка</label>
                        <div class="invalid-feedback">
                            Пожалуйста, заполните поле
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Добавить</button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
</form>
