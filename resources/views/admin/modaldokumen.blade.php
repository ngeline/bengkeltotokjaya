<div class="modal fade" id="modal-dokumen-{{ $service->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Foto</h5>
            </div>
            <div class="modal-body">
                <iframe src="{{ asset('upload/photo/'. $service->photo) }}"
                    frameborder="0" height="400px" width="100%"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    onclick="dokumenModal({{ $service->id }})">Kembali</button>
            </div>
        </div>
    </div>
</div>
