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

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Global Form & UI Enhancement Scripts -->
<script>
// 1. Modern SweetAlert2 Toast & Alert
window.Toast = typeof Swal !== 'undefined' ? Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3500,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer);
        toast.addEventListener('mouseleave', Swal.resumeTimer);
    }
}) : null;

window.showAlert = function(type, message) {
    if (window.Toast) {
        window.Toast.fire({
            icon: type === 'danger' ? 'error' : type,
            title: message
        });
    }

    const container = document.getElementById('global-alert-container');
    if (container) {
        const bsType = type === 'error' ? 'danger' : (type === 'success' ? 'success' : 'primary');
        const iconClass = type === 'error' ? 'mdi-alert-circle' : 'mdi-check-circle';
        container.innerHTML = `
            <div class="alert alert-${bsType} alert-dismissible fade show" role="alert">
                <i class="mdi ${iconClass} me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
        setTimeout(() => {
            const alertNode = container.querySelector('.alert');
            if (alertNode && typeof bootstrap !== 'undefined' && bootstrap.Alert) {
                const bsAlert = new bootstrap.Alert(alertNode);
                bsAlert.close();
            }
        }, 5000);
    }
};

window.confirmDelete = function(title = 'Hapus data ini?', text = 'Data yang dihapus tidak dapat dikembalikan!') {
    if (typeof Swal !== 'undefined') {
        return Swal.fire({
            title: title,
            text: text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: '<i class="mdi mdi-trash-can-outline me-1"></i> Ya, Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true,
            customClass: {
                confirmButton: 'btn btn-danger me-2',
                cancelButton: 'btn btn-outline-secondary'
            },
            buttonsStyling: false
        }).then(result => result.isConfirmed);
    }

    return new Promise((resolve) => {
        const modalEl = document.getElementById('globalDeleteModal');
        if (!modalEl) { resolve(confirm('Hapus data ini?')); return; }
        
        const modal = new bootstrap.Modal(modalEl);
        const confirmBtn = document.getElementById('globalDeleteConfirmBtn');
        const newConfirmBtn = confirmBtn.cloneNode(true);
        confirmBtn.parentNode.replaceChild(newConfirmBtn, confirmBtn);
        
        newConfirmBtn.addEventListener('click', function() {
            modal.hide();
            resolve(true);
        });
        
        modalEl.addEventListener('hidden.bs.modal', function onHidden() {
            modalEl.removeEventListener('hidden.bs.modal', onHidden);
            resolve(false);
        });
        
        modal.show();
    });
};

// 2. Universal AJAX Form Submitter with Inline Field Error Highlighting
function setupSmartAjaxForms() {
    document.querySelectorAll('form#ajaxForm, form.ajax-form').forEach(form => {
        if (form.dataset.smartBound) return;
        form.dataset.smartBound = 'true';

        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            const btn = this.querySelector('button[type="submit"]');
            const originalHtml = btn ? btn.innerHTML : '';
            if (btn) {
                btn.disabled = true;
                btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Menyimpan...';
            }

            // Bersihkan error validasi sebelumnya
            form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
            form.querySelectorAll('.invalid-feedback.dynamic-error').forEach(el => el.remove());

            try {
                const formData = new FormData(this);
                const response = await fetch(this.action, {
                    method: this.getAttribute('method') || 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                });

                const data = await response.json().catch(() => ({}));

                if (response.ok) {
                    sessionStorage.setItem('flash_message', data.message || 'Data berhasil disimpan.');
                    if (data.redirect) {
                        window.location.href = data.redirect;
                    } else {
                        location.reload();
                    }
                } else if (response.status === 422) {
                    // Validasi gagal (HTTP 422 Unprocessable Content)
                    const errors = data.errors || {};
                    let firstErrorEl = null;

                    for (const [field, messages] of Object.entries(errors)) {
                        const input = form.querySelector(`[name="${field}"]`) || form.querySelector(`[name="${field}[]"]`);
                        if (input) {
                            input.classList.add('is-invalid');
                            const feedback = document.createElement('div');
                            feedback.className = 'invalid-feedback dynamic-error d-block';
                            feedback.innerText = messages[0];

                            const parentFloating = input.closest('.form-floating');
                            const parentInputGroup = input.closest('.input-group');

                            if (parentFloating) {
                                parentFloating.appendChild(feedback);
                            } else if (parentInputGroup) {
                                parentInputGroup.after(feedback);
                            } else {
                                input.after(feedback);
                            }

                            if (!firstErrorEl) firstErrorEl = input;

                            const clearErr = () => {
                                input.classList.remove('is-invalid');
                                feedback.remove();
                                input.removeEventListener('input', clearErr);
                                input.removeEventListener('change', clearErr);
                            };
                            input.addEventListener('input', clearErr);
                            input.addEventListener('change', clearErr);
                        }
                    }

                    if (firstErrorEl) {
                        firstErrorEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        firstErrorEl.focus();
                    }

                    showAlert('error', data.error || data.message || 'Mohon periksa kolom yang ditandai merah.');
                } else {
                    showAlert('error', data.message || data.error || 'Gagal menyimpan data.');
                }
            } catch (err) {
                console.error('Submission Error:', err);
                showAlert('error', 'Terjadi kesalahan jaringan atau sistem.');
            } finally {
                if (btn) {
                    btn.disabled = false;
                    btn.innerHTML = originalHtml;
                }
            }
        }, true); // Menangkap di capturing phase agar listener lama di-bypass
    });
}

// 3. Live Image Preview
function setupLiveImagePreviews() {
    document.querySelectorAll('input[type="file"]').forEach(input => {
        const accept = input.getAttribute('accept') || '';
        const name = input.getAttribute('name') || '';
        const isImage = accept.includes('image') || name.includes('image') || name.includes('foto');

        if (!isImage || input.dataset.previewBound) return;
        input.dataset.previewBound = 'true';

        input.addEventListener('change', function() {
            const file = this.files && this.files[0];
            const parent = this.closest('.mb-4') || this.parentElement;
            let previewEl = parent.querySelector('.image-preview-wrapper');

            if (!file) {
                if (previewEl) previewEl.remove();
                return;
            }

            if (!file.type.startsWith('image/')) {
                showAlert('error', 'File yang dipilih harus berupa gambar.');
                this.value = '';
                if (previewEl) previewEl.remove();
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                if (!previewEl) {
                    previewEl = document.createElement('div');
                    previewEl.className = 'image-preview-wrapper';
                    input.after(previewEl);
                }

                const sizeKB = (file.size / 1024).toFixed(1);
                const sizeText = sizeKB > 1024 ? (sizeKB / 1024).toFixed(2) + ' MB' : sizeKB + ' KB';

                previewEl.innerHTML = `
                    <img src="${e.target.result}" alt="Preview" />
                    <div class="image-preview-info">
                        <div class="file-name">${file.name}</div>
                        <div class="file-size">${sizeText}</div>
                        <button type="button" class="btn-remove-preview mt-1"><i class="mdi mdi-close me-1"></i>Hapus Gambar</button>
                    </div>
                `;

                previewEl.querySelector('.btn-remove-preview').addEventListener('click', function() {
                    input.value = '';
                    previewEl.remove();
                });
            };
            reader.readAsDataURL(file);
        });
    });
}

// 4. Live Auto-Slug Generator
function setupAutoSlug() {
    const titleEl = document.querySelector('#title, input[name="title"]');
    const slugEl = document.querySelector('#slug, input[name="slug"]');

    if (titleEl && slugEl) {
        let isManuallyModified = slugEl.value.trim() !== '';

        slugEl.addEventListener('input', function() {
            isManuallyModified = this.value.trim() !== '';
        });

        titleEl.addEventListener('input', function() {
            if (!isManuallyModified) {
                slugEl.value = this.value
                    .toLowerCase()
                    .trim()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/[\s_-]+/g, '-')
                    .replace(/^-+|-+$/g, '');
            }
        });
    }
}

// Inisialisasi saat DOM siap
document.addEventListener("DOMContentLoaded", function() {
    setupSmartAjaxForms();
    setupLiveImagePreviews();
    setupAutoSlug();

    // Notifikasi flash message
    const flashMsg = sessionStorage.getItem('flash_message');
    if (flashMsg) {
        showAlert('success', flashMsg);
        sessionStorage.removeItem('flash_message');
    }
    
    // Default DataTables styling
    if ($.fn && $.fn.dataTable) {
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
