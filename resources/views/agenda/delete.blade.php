{{-- !-- Delete Warning Modal -->  --}}
<form action="{{ route('agenda.destroy', $contato->id) }}" method="post">
    <div>
        @csrf
        @method('DELETE')
        <h5 class="text-center">Are you sure you want to delete {{ $project->name }} ?</h5>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger">Yes, Delete Project</button>
    </div>
</form>