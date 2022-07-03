<form action="{{ route('dashboard.materials.tag-detach', $material, $tag->id) }}" method="post">
    @method('PUT')
    @csrf
    <div id="TagDetach{{$tag->id}}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Открепить тег</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Вы точно хотите открепить данный тег от материала?</p>
                    <input type="hidden" name="tag_id" value="{{ $tag->id }}">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Открепить</button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Отмена</button>
                </div>
            </div>
        </div>
    </div>
</form>
