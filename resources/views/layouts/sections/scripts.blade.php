<!-- BEGIN: Vendor JS-->
<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset('assets/js/main.js') }}"></script>

<!-- END: Theme JS-->

<!-- Global Alert UI -->
<script>
window.showAlert = function(type, message) {
    const container = document.getElementById('global-alert-container');
    if (!container) return;

    // Mapping type (success/error) to Bootstrap classes & icons
    const bsType = type === 'error' ? 'danger' : (type === 'success' ? 'success' : 'primary');
    const iconClass = type === 'error' ? 'mdi-alert-circle' : 'mdi-check-circle';

    const alertHtml = `
        <div class="alert alert-${bsType} alert-dismissible" role="alert">
            <i class="mdi ${iconClass} me-2"></i>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;

    // Reset container and insert new alert
    container.innerHTML = alertHtml;

    // Optional: auto dismiss after 5 seconds
    setTimeout(() => {
        const alertNode = container.querySelector('.alert');
        if (alertNode) {
            const bsAlert = new bootstrap.Alert(alertNode);
            bsAlert.close();
        }
    }, 5000);
}

window.confirmDelete = function() {
    return new Promise((resolve) => {
        const modalEl = document.getElementById('globalDeleteModal');
        if (!modalEl) { resolve(confirm('Hapus data ini?')); return; }
        
        const modal = new bootstrap.Modal(modalEl);
        const confirmBtn = document.getElementById('globalDeleteConfirmBtn');
        
        // Ganti button dengan clone agar listener lama hilang
        const newConfirmBtn = confirmBtn.cloneNode(true);
        confirmBtn.parentNode.replaceChild(newConfirmBtn, confirmBtn);
        
        newConfirmBtn.addEventListener('click', function() {
            modal.hide();
            resolve(true); // Resolve true saat tombol konfirmasi ditekan
        });
        
        modalEl.addEventListener('hidden.bs.modal', function onHidden() {
            modalEl.removeEventListener('hidden.bs.modal', onHidden);
            resolve(false); // Resolve false jika ditutup/batal (jika sudah true duluan, ini diabaikan)
        });
        
        modal.show();
    });
}

document.addEventListener("DOMContentLoaded", function() {
    const flashMsg = sessionStorage.getItem('flash_message');
    if (flashMsg) {
        showAlert('success', flashMsg);
        sessionStorage.removeItem('flash_message');
    }
    
    // Set global default for DataTables if it is loaded
    if ($.fn.dataTable) {
        $.extend(true, $.fn.dataTable.defaults, {
            dom: "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex justify-content-end'>>" +
                 "<'row'<'col-sm-12'tr>>" +
                 "<'row mt-3'<'col-sm-12 col-md-4 d-flex align-items-center'l><'col-sm-12 col-md-4 d-flex justify-content-center'i><'col-sm-12 col-md-4 d-flex justify-content-end'p>>"
        });
    }
});
</script>
<!-- Pricing Modal JS-->
@stack('pricing-script')
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->
