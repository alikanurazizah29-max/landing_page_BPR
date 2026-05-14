<?php

$entities = [
    'Product' => [
        'title' => 'Produk', 'route' => 'products', 'var' => 'product',
        'fields' => [
            ['name' => 'title', 'label' => 'Nama Produk', 'type' => 'text', 'rules' => 'required|string|max:255'],
            ['name' => 'icon', 'label' => 'Icon (MDI Class)', 'type' => 'text', 'rules' => 'nullable|string|max:255'],
            ['name' => 'description', 'label' => 'Deskripsi', 'type' => 'textarea', 'rules' => 'required|string'],
        ]
    ],
    'Benefit' => [
        'title' => 'Keunggulan', 'route' => 'benefits', 'var' => 'benefit',
        'fields' => [
            ['name' => 'title', 'label' => 'Judul', 'type' => 'text', 'rules' => 'required|string|max:255'],
            ['name' => 'icon', 'label' => 'Icon (MDI Class)', 'type' => 'text', 'rules' => 'nullable|string|max:255'],
            ['name' => 'description', 'label' => 'Deskripsi', 'type' => 'textarea', 'rules' => 'required|string'],
        ]
    ],
    'InterestRate' => [
        'title' => 'Suku Bunga', 'route' => 'interest-rates', 'var' => 'interestRate',
        'fields' => [
            ['name' => 'product_type', 'label' => 'Tipe Produk', 'type' => 'select', 'options' => ['Tabungan' => 'Tabungan', 'Deposito' => 'Deposito', 'Kredit' => 'Kredit'], 'rules' => 'required|string|max:255'],
            ['name' => 'duration', 'label' => 'Durasi / Tenor', 'type' => 'text', 'rules' => 'required|string|max:255'],
            ['name' => 'rate', 'label' => 'Suku Bunga (%)', 'type' => 'number', 'rules' => 'required|numeric'],
            ['name' => 'description', 'label' => 'Deskripsi', 'type' => 'textarea', 'rules' => 'nullable|string'],
            ['name' => 'is_active', 'label' => 'Status Aktif', 'type' => 'switch', 'rules' => 'nullable'],
        ]
    ],
    'HeroBanner' => [
        'title' => 'Hero Banner', 'route' => 'hero-banners', 'var' => 'heroBanner',
        'fields' => [
            ['name' => 'title', 'label' => 'Judul', 'type' => 'text', 'rules' => 'required|string|max:255'],
            ['name' => 'subtitle', 'label' => 'Sub Judul', 'type' => 'text', 'rules' => 'nullable|string|max:255'],
            ['name' => 'image_path', 'label' => 'File Gambar', 'type' => 'file', 'rules' => 'nullable|image|max:2048'],
            ['name' => 'button_text', 'label' => 'Teks Tombol', 'type' => 'text', 'rules' => 'nullable|string|max:255'],
            ['name' => 'button_url', 'label' => 'URL Tombol', 'type' => 'text', 'rules' => 'nullable|string'],
            ['name' => 'order', 'label' => 'Urutan', 'type' => 'number', 'rules' => 'required|integer'],
            ['name' => 'is_active', 'label' => 'Status Aktif', 'type' => 'switch', 'rules' => 'nullable'],
        ]
    ],
    'Article' => [
        'title' => 'Berita & Artikel', 'route' => 'articles', 'var' => 'article',
        'fields' => [
            ['name' => 'title', 'label' => 'Judul Artikel', 'type' => 'text', 'rules' => 'required|string|max:255'],
            ['name' => 'slug', 'label' => 'Slug (URL)', 'type' => 'text', 'rules' => 'required|string|max:255'],
            ['name' => 'category', 'label' => 'Kategori', 'type' => 'select', 'options' => ['Berita' => 'Berita', 'Pengumuman' => 'Pengumuman', 'Edukasi' => 'Edukasi'], 'rules' => 'nullable|string|max:255'],
            ['name' => 'excerpt', 'label' => 'Ringkasan', 'type' => 'textarea', 'rules' => 'nullable|string'],
            ['name' => 'content', 'label' => 'Konten Utama', 'type' => 'textarea', 'rules' => 'required|string'],
            ['name' => 'image_path', 'label' => 'File Gambar', 'type' => 'file', 'rules' => 'nullable|image|max:2048'],
            ['name' => 'is_published', 'label' => 'Dipublikasikan', 'type' => 'switch', 'rules' => 'nullable'],
        ]
    ],
    'CompanyProfile' => [
        'title' => 'Profil Perusahaan', 'route' => 'company-profiles', 'var' => 'companyProfile',
        'fields' => [
            ['name' => 'title', 'label' => 'Judul Profil', 'type' => 'text', 'rules' => 'required|string|max:255'],
            ['name' => 'type', 'label' => 'Tipe', 'type' => 'select', 'options' => ['Visi' => 'Visi', 'Misi' => 'Misi', 'Sejarah' => 'Sejarah', 'Lainnya' => 'Lainnya'], 'rules' => 'required|string|max:255'],
            ['name' => 'content', 'label' => 'Konten', 'type' => 'textarea', 'rules' => 'required|string'],
            ['name' => 'image_path', 'label' => 'File Gambar', 'type' => 'file', 'rules' => 'nullable|image|max:2048'],
        ]
    ],
    'Branch' => [
        'title' => 'Jaringan Kantor', 'route' => 'branches', 'var' => 'branch',
        'fields' => [
            ['name' => 'name', 'label' => 'Nama Cabang', 'type' => 'text', 'rules' => 'required|string|max:255'],
            ['name' => 'type', 'label' => 'Tipe Kantor', 'type' => 'select', 'options' => ['Pusat' => 'Kantor Pusat', 'Cabang' => 'Kantor Cabang', 'Kas' => 'Kantor Kas'], 'rules' => 'required|string|max:255'],
            ['name' => 'address', 'label' => 'Alamat Lengkap', 'type' => 'textarea', 'rules' => 'required|string'],
            ['name' => 'phone', 'label' => 'Nomor Telepon', 'type' => 'text', 'rules' => 'nullable|string|max:255'],
            ['name' => 'whatsapp', 'label' => 'Nomor WhatsApp', 'type' => 'text', 'rules' => 'nullable|string|max:255'],
            ['name' => 'maps_url', 'label' => 'URL Google Maps', 'type' => 'text', 'rules' => 'nullable|string'],
            ['name' => 'is_active', 'label' => 'Status Aktif', 'type' => 'switch', 'rules' => 'nullable'],
        ]
    ],
    'ContactMessage' => [
        'title' => 'Pesan Masuk', 'route' => 'contact-messages', 'var' => 'contactMessage',
        'fields' => [
            ['name' => 'name', 'label' => 'Nama Pengirim', 'type' => 'text', 'rules' => 'required|string|max:255'],
            ['name' => 'email', 'label' => 'Email', 'type' => 'text', 'rules' => 'required|email|max:255'],
            ['name' => 'subject', 'label' => 'Subjek', 'type' => 'text', 'rules' => 'nullable|string|max:255'],
            ['name' => 'message', 'label' => 'Isi Pesan', 'type' => 'textarea', 'rules' => 'required|string'],
            ['name' => 'is_read', 'label' => 'Sudah Dibaca', 'type' => 'switch', 'rules' => 'nullable'],
        ]
    ],
    'Testimonial' => [
        'title' => 'Testimoni', 'route' => 'testimonials', 'var' => 'testimonial',
        'fields' => [
            ['name' => 'customer_name', 'label' => 'Nama Nasabah', 'type' => 'text', 'rules' => 'required|string|max:255'],
            ['name' => 'content', 'label' => 'Isi Testimoni', 'type' => 'textarea', 'rules' => 'required|string'],
            ['name' => 'rating', 'label' => 'Rating (Bintang)', 'type' => 'select', 'options' => [5=>'5 Bintang', 4=>'4 Bintang', 3=>'3 Bintang', 2=>'2 Bintang', 1=>'1 Bintang'], 'rules' => 'required|integer|min:1|max:5'],
            ['name' => 'image_path', 'label' => 'Foto Nasabah', 'type' => 'file', 'rules' => 'nullable|image|max:2048'],
            ['name' => 'is_active', 'label' => 'Status Aktif', 'type' => 'switch', 'rules' => 'nullable'],
        ]
    ],
    'Faq' => [
        'title' => 'FAQ', 'route' => 'faqs', 'var' => 'faq',
        'fields' => [
            ['name' => 'question', 'label' => 'Pertanyaan', 'type' => 'text', 'rules' => 'required|string|max:255'],
            ['name' => 'answer', 'label' => 'Jawaban', 'type' => 'textarea', 'rules' => 'required|string'],
            ['name' => 'is_active', 'label' => 'Status Aktif', 'type' => 'switch', 'rules' => 'nullable'],
        ]
    ]
];

$basePath = __DIR__;

foreach ($entities as $model => $config) {
    $title = $config['title'];
    $route = $config['route'];
    $var = $config['var'];
    $fields = $config['fields'];
    $route_var = str_replace('-', '_', $route); // e.g. hero_banners
    $single_var = str_replace('-', '_', $var); // e.g. hero_banner
    
    // 1. CREATE CONTROLLER
    $validationRules = [];
    $fileHandlingStore = "";
    $fileHandlingUpdate = "";
    $switchHandling = "";
    
    foreach ($fields as $f) {
        $validationRules[] = "'{$f['name']}' => '{$f['rules']}'";
        
        if ($f['type'] === 'file') {
            $fileHandlingStore .= "
            if (\$request->hasFile('{$f['name']}')) {
                \$validated['{$f['name']}'] = \$request->file('{$f['name']}')->store('uploads/{$route}', 'public');
            }";
            $fileHandlingUpdate .= "
            if (\$request->hasFile('{$f['name']}')) {
                \$validated['{$f['name']}'] = \$request->file('{$f['name']}')->store('uploads/{$route}', 'public');
            }";
        }
        
        if ($f['type'] === 'switch') {
            $switchHandling .= "\n            \$validated['{$f['name']}'] = \$request->has('{$f['name']}') ? 1 : 0;";
        }
    }
    $validationStr = implode(",\n                ", $validationRules);
    
    $controllerContent = "<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\\$model;

class {$model}Controller extends Controller
{
    public function index(Request \$request)
    {
        try {
            \${$route_var} = {$model}::all();
            return view('admin.{$route}.index', compact('{$route_var}'));
        } catch (\Exception \$e) {
            return response()->json(['error' => 'Gagal memuat data {$title}', 'message' => \$e->getMessage()], 500);
        }
    }

    public function create()
    {
        return view('admin.{$route}.create');
    }

    public function store(Request \$request)
    {
        try {
            \$validated = \$request->validate([
                $validationStr
            ]);
            $fileHandlingStore
            $switchHandling
            
            {$model}::create(\$validated);
            return response()->json([
                'success' => true, 
                'message' => '{$title} berhasil ditambahkan.',
                'redirect' => route('admin.{$route}.index')
            ]);
        } catch (\Illuminate\Validation\ValidationException \$e) {
            return response()->json([
                'error' => 'Validasi gagal', 
                'errors' => \$e->errors()
            ], 422);
        } catch (\Exception \$e) {
            return response()->json(['error' => 'Gagal menambahkan {$title}', 'message' => \$e->getMessage()], 500);
        }
    }

    public function edit({$model} \${$single_var})
    {
        return view('admin.{$route}.edit', compact('{$single_var}'));
    }

    public function update(Request \$request, {$model} \${$single_var})
    {
        try {
            \$validated = \$request->validate([
                $validationStr
            ]);
            $fileHandlingUpdate
            $switchHandling
            
            \${$single_var}->update(\$validated);
            return response()->json([
                'success' => true, 
                'message' => '{$title} berhasil diperbarui.',
                'redirect' => route('admin.{$route}.index')
            ]);
        } catch (\Illuminate\Validation\ValidationException \$e) {
            return response()->json([
                'error' => 'Validasi gagal', 
                'errors' => \$e->errors()
            ], 422);
        } catch (\Exception \$e) {
            return response()->json(['error' => 'Gagal memperbarui {$title}', 'message' => \$e->getMessage()], 500);
        }
    }

    public function destroy({$model} \${$single_var})
    {
        try {
            \${$single_var}->delete();
            return response()->json([
                'success' => true, 
                'message' => '{$title} berhasil dihapus.'
            ]);
        } catch (\Exception \$e) {
            return response()->json(['error' => 'Gagal menghapus {$title}', 'message' => \$e->getMessage()], 500);
        }
    }
}
";
    file_put_contents("$basePath/app/Http/Controllers/Admin/{$model}Controller.php", $controllerContent);

    // CREATE VIEWS DIR
    $viewDir = "$basePath/resources/views/admin/{$route}";
    if (!is_dir($viewDir)) {
        mkdir($viewDir, 0755, true);
    }

    // 2. CREATE INDEX VIEW
    $ths = "";
    $tds = "";
    foreach(array_slice($fields, 0, 2) as $f) {
        $ths .= "<th>{$f['label']}</th>\n          ";
        if ($f['type'] === 'file') {
            $tds .= "<td>
            @if(\${$single_var}->{$f['name']})
                <img src=\"{{ asset('storage/' . \${$single_var}->{$f['name']}) }}\" width=\"50\" class=\"rounded\">
            @else
                <span class=\"badge bg-secondary\">No File</span>
            @endif
          </td>\n          ";
        } elseif ($f['type'] === 'switch') {
            $tds .= "<td>
            @if(\${$single_var}->{$f['name']})
                <span class=\"badge bg-success\">Ya</span>
            @else
                <span class=\"badge bg-danger\">Tidak</span>
            @endif
          </td>\n          ";
        } else {
            $tds .= "<td><span class=\"fw-medium\">{{ \${$single_var}->{$f['name']} }}</span></td>\n          ";
        }
    }

    $indexContent = "@extends('layouts/contentNavbarLayout')

@section('title', 'Daftar {$title}')

@section('vendor-style')
<link rel=\"stylesheet\" href=\"https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css\">
@endsection

@section('content')
<h4 class=\"py-3 mb-4\"><span class=\"text-muted fw-light\">Manajemen /</span> Daftar {$title}</h4>

<div class=\"card\">
  <div class=\"card-header d-flex justify-content-between align-items-center\">
    <h5 class=\"mb-0\">Daftar {$title}</h5>
    <a href=\"{{ route('admin.{$route}.create') }}\" class=\"btn btn-primary\"><i class=\"mdi mdi-plus me-1\"></i> Tambah Data</a>
  </div>
  <div class=\"card-datatable table-responsive p-3\">
    <table class=\"table table-bordered table-hover\" id=\"dataTable\">
      <thead>
        <tr>
          <th style=\"width: 50px;\">No</th>
          $ths<th style=\"width: 100px;\">Aksi</th>
        </tr>
      </thead>
      <tbody class=\"table-border-bottom-0\">
        @foreach(\${$route_var} as \${$single_var})
        <tr>
          <td>{{ \$loop->iteration }}</td>
          $tds<td>
            <div class=\"dropdown\">
              <button type=\"button\" class=\"btn p-0 dropdown-toggle hide-arrow\" data-bs-toggle=\"dropdown\"><i class=\"mdi mdi-dots-vertical\"></i></button>
              <div class=\"dropdown-menu\">
                <a class=\"dropdown-item\" href=\"{{ route('admin.{$route}.edit', \${$single_var}->id) }}\"><i class=\"mdi mdi-pencil-outline me-1\"></i> Edit</a>
                <button type=\"button\" class=\"dropdown-item btn-delete\" data-url=\"{{ route('admin.{$route}.destroy', \${$single_var}->id) }}\">
                  <i class=\"mdi mdi-trash-can-outline me-1\"></i> Delete
                </button>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

@section('vendor-script')
<script src=\"https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js\"></script>
<script src=\"https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js\"></script>
@endsection

@section('page-script')
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable({
      \"language\": {
        \"url\": \"//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json\"
      },
      \"order\": [],
      \"columnDefs\": [
        { \"orderable\": false, \"targets\": [0, 3] }
      ]
    });

    $('.btn-delete').on('click', async function() {
        if(confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            const url = $(this).data('url');
            try {
                const response = await fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                });
                if(response.ok) {
                    window.location.reload();
                } else {
                    console.error('Delete failed:', await response.text());
                }
            } catch(e) {
                console.error('Error:', e);
            }
        }
    });
  });
</script>
@endsection
";
    file_put_contents("$viewDir/index.blade.php", $indexContent);

    // 3. CREATE BLADE
    $formFieldsCreate = "";
    foreach ($fields as $f) {
        if ($f['type'] === 'textarea') {
            $formFieldsCreate .= "<div class=\"form-floating form-floating-outline mb-4\">
            <textarea class=\"form-control h-px-100 @error('{$f['name']}') is-invalid @enderror\" id=\"{$f['name']}\" name=\"{$f['name']}\" placeholder=\"{$f['label']}...\" " . (strpos($f['rules'], 'required') !== false ? 'required' : '') . "></textarea>
            <label for=\"{$f['name']}\">{$f['label']}</label>
          </div>\n\n          ";
        } elseif ($f['type'] === 'select') {
            $options = "";
            foreach ($f['options'] as $val => $label) {
                $options .= "<option value=\"{$val}\">{$label}</option>";
            }
            $formFieldsCreate .= "<div class=\"form-floating form-floating-outline mb-4\">
            <select class=\"form-select @error('{$f['name']}') is-invalid @enderror\" id=\"{$f['name']}\" name=\"{$f['name']}\" " . (strpos($f['rules'], 'required') !== false ? 'required' : '') . ">
                <option value=\"\">Pilih {$f['label']}</option>
                $options
            </select>
            <label for=\"{$f['name']}\">{$f['label']}</label>
          </div>\n\n          ";
        } elseif ($f['type'] === 'switch') {
            $formFieldsCreate .= "<div class=\"mb-4\">
            <label class=\"form-label d-block\">{$f['label']}</label>
            <div class=\"form-check form-switch mb-2\">
              <input class=\"form-check-input\" type=\"checkbox\" id=\"{$f['name']}\" name=\"{$f['name']}\" value=\"1\" checked />
              <label class=\"form-check-label\" for=\"{$f['name']}\">Aktif / Ya</label>
            </div>
          </div>\n\n          ";
        } elseif ($f['type'] === 'file') {
            $formFieldsCreate .= "<div class=\"mb-4\">
            <label for=\"{$f['name']}\" class=\"form-label\">{$f['label']}</label>
            <input class=\"form-control @error('{$f['name']}') is-invalid @enderror\" type=\"file\" id=\"{$f['name']}\" name=\"{$f['name']}\" " . (strpos($f['rules'], 'required') !== false ? 'required' : '') . " />
          </div>\n\n          ";
        } else {
            $inputType = $f['type'] === 'number' ? 'number' : 'text';
            $formFieldsCreate .= "<div class=\"form-floating form-floating-outline mb-4\">
            <input type=\"{$inputType}\" class=\"form-control @error('{$f['name']}') is-invalid @enderror\" id=\"{$f['name']}\" name=\"{$f['name']}\" placeholder=\"{$f['label']}\" " . (strpos($f['rules'], 'required') !== false ? 'required' : '') . " />
            <label for=\"{$f['name']}\">{$f['label']}</label>
          </div>\n\n          ";
        }
    }

    $createContent = "@extends('layouts/contentNavbarLayout')

@section('title', 'Tambah {$title}')

@section('content')
<h4 class=\"py-3 mb-4\">
  <span class=\"text-muted fw-light\">Manajemen / <a href=\"{{ route('admin.{$route}.index') }}\">Daftar {$title}</a> /</span> Tambah
</h4>

<div class=\"row\">
  <div class=\"col-12\">
    <div class=\"card mb-4\">
      <h5 class=\"card-header\">Form Tambah {$title}</h5>
      <div class=\"card-body\">
        <form id=\"ajaxForm\" action=\"{{ route('admin.{$route}.store') }}\" method=\"POST\" enctype=\"multipart/form-data\">
          @csrf
          
          $formFieldsCreate
          <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
          <a href=\"{{ route('admin.{$route}.index') }}\" class=\"btn btn-outline-secondary\">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('page-script')
<script>
document.getElementById('ajaxForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const btn = this.querySelector('button[type=\"submit\"]');
    btn.disabled = true;
    btn.innerHTML = 'Menyimpan...';
    
    try {
        const formData = new FormData(this);
        const response = await fetch(this.action, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: formData
        });
        const data = await response.json();
        
        if (response.ok) {
            window.location.href = data.redirect;
        } else {
            console.error('Validation/Server Error:', data);
            alert('Gagal: ' + (data.message || data.error || 'Terjadi kesalahan'));
        }
    } catch(err) {
        console.error('Network Error:', err);
    } finally {
        btn.disabled = false;
        btn.innerHTML = 'Simpan';
    }
});
</script>
@endsection
";
    file_put_contents("$viewDir/create.blade.php", $createContent);

    // 4. EDIT BLADE
    $formFieldsEdit = "";
    foreach ($fields as $f) {
        if ($f['type'] === 'textarea') {
            $formFieldsEdit .= "<div class=\"form-floating form-floating-outline mb-4\">
            <textarea class=\"form-control h-px-100 @error('{$f['name']}') is-invalid @enderror\" id=\"{$f['name']}\" name=\"{$f['name']}\" placeholder=\"{$f['label']}...\" " . (strpos($f['rules'], 'required') !== false ? 'required' : '') . ">{{ \${$single_var}->{$f['name']} }}</textarea>
            <label for=\"{$f['name']}\">{$f['label']}</label>
          </div>\n\n          ";
        } elseif ($f['type'] === 'select') {
            $options = "";
            foreach ($f['options'] as $val => $label) {
                $options .= "<option value=\"{$val}\" {{ \${$single_var}->{$f['name']} == '{$val}' ? 'selected' : '' }}>{$label}</option>";
            }
            $formFieldsEdit .= "<div class=\"form-floating form-floating-outline mb-4\">
            <select class=\"form-select @error('{$f['name']}') is-invalid @enderror\" id=\"{$f['name']}\" name=\"{$f['name']}\" " . (strpos($f['rules'], 'required') !== false ? 'required' : '') . ">
                <option value=\"\">Pilih {$f['label']}</option>
                $options
            </select>
            <label for=\"{$f['name']}\">{$f['label']}</label>
          </div>\n\n          ";
        } elseif ($f['type'] === 'switch') {
            $formFieldsEdit .= "<div class=\"mb-4\">
            <label class=\"form-label d-block\">{$f['label']}</label>
            <div class=\"form-check form-switch mb-2\">
              <input class=\"form-check-input\" type=\"checkbox\" id=\"{$f['name']}\" name=\"{$f['name']}\" value=\"1\" {{ \${$single_var}->{$f['name']} ? 'checked' : '' }} />
              <label class=\"form-check-label\" for=\"{$f['name']}\">Aktif / Ya</label>
            </div>
          </div>\n\n          ";
        } elseif ($f['type'] === 'file') {
            $formFieldsEdit .= "<div class=\"mb-4\">
            <label for=\"{$f['name']}\" class=\"form-label\">{$f['label']}</label>
            <input class=\"form-control @error('{$f['name']}') is-invalid @enderror\" type=\"file\" id=\"{$f['name']}\" name=\"{$f['name']}\" />
            @if(\${$single_var}->{$f['name']})
                <div class=\"mt-2\">
                    <img src=\"{{ asset('storage/' . \${$single_var}->{$f['name']}) }}\" width=\"100\" class=\"rounded\">
                    <small class=\"text-muted d-block\">Biarkan kosong jika tidak ingin mengubah file.</small>
                </div>
            @endif
          </div>\n\n          ";
        } else {
            $inputType = $f['type'] === 'number' ? 'number' : 'text';
            $formFieldsEdit .= "<div class=\"form-floating form-floating-outline mb-4\">
            <input type=\"{$inputType}\" class=\"form-control @error('{$f['name']}') is-invalid @enderror\" id=\"{$f['name']}\" name=\"{$f['name']}\" value=\"{{ \${$single_var}->{$f['name']} }}\" placeholder=\"{$f['label']}\" " . (strpos($f['rules'], 'required') !== false ? 'required' : '') . " />
            <label for=\"{$f['name']}\">{$f['label']}</label>
          </div>\n\n          ";
        }
    }

    $editContent = "@extends('layouts/contentNavbarLayout')

@section('title', 'Edit {$title}')

@section('content')
<h4 class=\"py-3 mb-4\">
  <span class=\"text-muted fw-light\">Manajemen / <a href=\"{{ route('admin.{$route}.index') }}\">Daftar {$title}</a> /</span> Edit
</h4>

<div class=\"row\">
  <div class=\"col-12\">
    <div class=\"card mb-4\">
      <h5 class=\"card-header\">Form Edit {$title}</h5>
      <div class=\"card-body\">
        <form id=\"ajaxForm\" action=\"{{ route('admin.{$route}.update', \${$single_var}->id) }}\" method=\"POST\" enctype=\"multipart/form-data\">
          @csrf
          @method('PUT')
          
          $formFieldsEdit
          <button type=\"submit\" class=\"btn btn-primary\">Simpan Perubahan</button>
          <a href=\"{{ route('admin.{$route}.index') }}\" class=\"btn btn-outline-secondary\">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('page-script')
<script>
document.getElementById('ajaxForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const btn = this.querySelector('button[type=\"submit\"]');
    btn.disabled = true;
    btn.innerHTML = 'Menyimpan...';
    
    try {
        const formData = new FormData(this);
        // PHP/Laravel has a quirk where PUT requests can't parse FormData files properly.
        // The standard workaround is to send a POST request and spoof the PUT method.
        // We already have @method('PUT') in the form which adds _method=PUT to formData.
        const response = await fetch(this.action, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: formData
        });
        const data = await response.json();
        
        if (response.ok) {
            window.location.href = data.redirect;
        } else {
            console.error('Validation/Server Error:', data);
            alert('Gagal: ' + (data.message || data.error || 'Terjadi kesalahan'));
        }
    } catch(err) {
        console.error('Network Error:', err);
    } finally {
        btn.disabled = false;
        btn.innerHTML = 'Simpan Perubahan';
    }
});
</script>
@endsection
";
    file_put_contents("$viewDir/edit.blade.php", $editContent);

    echo "Generated $model \n";
}

echo "All done!\n";
