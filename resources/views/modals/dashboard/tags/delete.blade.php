<form action="{{ route('dashboard.tags.destroy', $tag) }}" method="post">
    @method('DELETE')
    @csrf
    <div id="TagDelete{{$tag->id}}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Удаление тега</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Вы точно хотите удалить данный тег?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Удалить</button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Отмена</button>
                </div>
            </div>
        </div>
    </div>
</form>
