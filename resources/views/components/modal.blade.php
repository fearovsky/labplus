    <div id="{{ $modalId }}" class="modal">
        <div class="modal_box">
            <div class="modal_content">
                <button class="close-btn btn btn-primary" data-modal-close>Close Modal</button>

                <div class="modal_text">
                    {!! $slot !!}
                </div>
            </div>
        </div>
    </div>
