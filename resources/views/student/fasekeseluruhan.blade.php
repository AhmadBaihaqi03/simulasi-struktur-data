Test JDoodle connectivity dulu

<x-workspace-layout>
    <style>
        body { background-color: #f8fafc; color: #334155; }
        .text-indigo { color: #5c60f5 !important; }
        .bg-indigo { background-color: #5c60f5 !important; }
        .bg-indigo-subtle { background-color: #f0f2ff !important; }
        .border-indigo { border-color: #5c60f5 !important; }

        /* Card Workspace */
        .card-workspace { border-radius: 20px; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); background: white; margin-bottom: 24px;}
        .sticky-panel { top: 24px; position: sticky; border-top: 5px solid #5c60f5; border-radius: 20px;
        }

        /* Form Inputs */
        .answer-box-input {background-color: #fcfdfe; border: 2px solid #f1f5f9; border-radius: 12px;padding: 14px;transition: all 0.2s ease;}
        .answer-box-input:focus {border-color: #5c60f5;box-shadow: 0 0 0 4px rgba(92, 96, 245, 0.1);outline: none;}
        .label-mini {font-size: 0.65rem; font-weight: 800; letter-spacing: 1px; color: #94a3b8; text-transform: uppercase; margin-bottom: 8px;display: block;}

        /* Editor & Terminal (Aksen Indigo) */
        .editor-container { border-radius: 15px; overflow: hidden; border: 1px solid #e2e8f0; }
        .editor-header { background: #1e1e2e; padding: 12px 16px; display: flex; align-items: center; gap: 8px; }
        .dot { width: 10px; height: 10px; border-radius: 50%; background: #475569; } 
        #cOutput {font-family: 'Fira Code', monospace;color: #a5b4fc; /* Light Indigo for text output */min-height: 100px;white-space: pre-wrap;}
    </style>

    <div class="container py-5">
        <form action="{{ route('student.save.all', [$session->session_code, $group->id]) }}" method="POST">
            @csrf

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-5 gap-3">
                <div>
                    <a href="{{ route('beranda') }}" class="text-decoration-none text-muted small fw-bold d-flex align-items-center mb-2 hover-indigo">
                        <i class="bi bi-arrow-left me-1"></i> KEMBALI KE BERANDA
                    </a>
                    <h1 class="fw-bold text-dark mb-1">{{ $session->title }}</h1>
                    <p class="text-muted mb-0">Kelompok: <span class="fw-bold text-indigo">{{ $group->group_name }}</span></p>
                </div>
                
                <div class="bg-white border rounded-pill px-4 py-2 shadow-sm d-flex align-items-center">
                    <small class="text-muted fw-bold text-uppercase me-2 border-end pe-2" style="font-size: 10px; letter-spacing: 1px;">Sesi Aktif</small>
                    <span class="text-indigo fw-bold small uppercase tracking-wider">{{ $session->session_code }}</span>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-8">
                    
                    <div class="card card-workspace p-4 p-md-5">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="bg-indigo text-white rounded-3 p-2 px-3 shadow-s"><i class="bi bi-people-fill fs-5"></i></div>
                            <h5 class="fw-bold m-0 text-indigo">Phase 01 & 02: Tim & Orientasi</h5>
                        </div>

                        <div class="mb-4 px-2">
                            <label class="label-mini text-indigo">Masalah yang dihadapi:</label>
                            <div class="p-3 bg-light rounded-3 italic" style="white-space: pre-wrap;">"{{ $session->f1_context }}"</div>
                        </div>

                        <div class="px-2">
                            <label class="label-mini text-indigo">Anggota Tim:</label>
                            <div id="members-container">
                                @php $members = $group->student_data['members'] ?? ['']; @endphp
                                @foreach($members as $index => $member)
                                    <div class="d-flex align-items-center gap-2 mb-2 member-item">
                                        <input type="text" name="members[]" class="form-control answer-box-input w-100"
                                            placeholder="Nama Anggota" value="{{ $member }}" required> 
                                        <div style="width: 40px;" class="text-center">
                                            <button type="button" class="btn btn-link text-danger remove-member p-0 border-0">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" id="add-member" class="btn btn-link text-indigo fw-bold p-0 mt-2 text-decoration-none small">
                                <i class="bi bi-plus-circle-fill me-1"></i> Tambah Anggota
                            </button>
                        </div>
                    </div>

                    <div class="card card-workspace p-4 p-md-5">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="bg-indigo text-white rounded-3 p-2 px-3 shadow-s"><i class="bi bi-chat-left-text-fill fs-5"></i></div>
                            <h5 class="fw-bold m-0 text-indigo">Phase 03: Inquiry</h5>
                        </div>
                        @foreach($session->f3_questions ?? [] as $index => $q)
                            <div class="mb-4 px-2">
                                <p class="fw-bold mb-2 text-dark" style="font-size: 0.9rem;">{{ $index + 1 }}. {{ $q }}</p>
                                <textarea name="f3_answers[{{ $index }}]" class="form-control answer-box-input"
                                          rows="3" placeholder="Hasil diskusi kelompok...">{{ old("f3_answers.$index", $group->f3_answers[$index] ?? '') }}</textarea>
                            </div>
                        @endforeach
                    </div>

                    <div class="card card-workspace p-4 p-md-5">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="bg-indigo text-white rounded-3 p-2 px-3 shadow-sm"><i class="bi bi-code-slash fs-5"></i></div>
                            <h5 class="fw-bold m-0 text-indigo">Phase 04: Implementation</h5>
                        </div>

                        <div class="editor-container mb-3 shadow-sm">
                            <div class="editor-header">
                                <div class="dot"></div><div class="dot"></div><div class="dot"></div>
                                <span class="text-secondary small ms-2 fw-mono" style="font-size: 10px;">main.c</span>
                            </div>
                            <textarea id="cEditor" name="f4_code" class="form-control border-0"
                                      style="font-family: 'Fira Code', monospace; height: 300px; background: #1e1e2e; color: #d1d5db; padding: 20px; border-radius: 0;">{{ old('f4_code', $group->f4_code ?? "#include <stdio.h>\n\nint main() {\n    printf(\"Hello Indigo Workspace!\\n\");\n    return 0;\n}") }}</textarea>
                        </div>

                        <button type="button" onclick="runCCode()" id="runBtn" class="btn btn-indigo w-100 py-3 fw-bold rounded-3 shadow-sm mb-4">
                            <i class="bi bi-play-fill me-1 fs-5"></i> JALANKAN PROGRAM
                        </button>

                        <div class="bg-dark rounded-3 p-3 mb-4 shadow-lg">
                            <div class="d-flex justify-content-between align-items-center mb-2 border-bottom border-secondary pb-2">
                                <label class="label-mini text-secondary mb-0">Terminal Output</label>
                                <i class="bi bi-terminal text-secondary small"></i>
                            </div>
                            <div id="cOutput">> Ready...</div>
                        </div>

                        <div class="px-2">
                            <label class="label-mini text-indigo">Analisis Kelompok:</label>
                            <p class="fw-bold mb-2 small text-dark">{{ $session->f4_question }}</p>
                            <textarea name="f4_answers" class="form-control answer-box-input" rows="3"
                                      placeholder="Jelaskan logika solusi kalian...">{{ old('f4_answers', $group->f4_answers) }}</textarea>
                        </div>
                    </div>

                    <div class="card card-workspace p-4 p-md-5 mb-5">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="bg-indigo text-white rounded-3 p-2 px-3 shadow-s"><i class="bi bi-stars fs-5"></i></div>
                            <h5 class="fw-bold m-0 text-indigo">Phase 05: Reflection</h5>
                        </div>
                        @foreach($session->f5_questions ?? [] as $index => $r)
                            <div class="mb-4 px-2">
                                <p class="fw-bold mb-2 text-dark small">{{ $r }}</p>
                                <textarea name="f5_answers[{{ $index }}]" class="form-control answer-box-input" rows="3">{{ old("f5_answers.$index", $group->f5_answers[$index] ?? '') }}</textarea>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card card-workspace p-4 sticky-panel border-0 shadow-lg">
                        <div class="text-center mb-4">
                            <h6 class="fw-bold text-dark mb-1 small">PANEL KONTROL</h6>
                            <div class="d-flex align-items-center justify-content-center gap-2">
                                <span class="rounded-circle bg-success shadow-sm" style="width: 8px; height: 8px;"></span>
                                <small class="text-muted fw-bold" style="font-size: 11px;">Koneksi Stabil</small>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" name="action" value="save" class="btn btn-indigo py-3 fw-bold rounded-3 shadow-sm transition-all hover-lift">
                                <i class="bi bi-cloud-check-fill me-2"></i> SIMPAN PROGRES
                            </button>

                            <button type="submit" name="action" value="submit" id="submitBtn" 
                                    class="btn btn-dark py-3 fw-bold rounded-3 shadow-sm transition-all hover-lift">
                                <i class="bi bi-send-fill me-2"></i> SUBMIT TUGAS
                            </button>
                        </div>

                        <div class="bg-indigo-subtle p-3 rounded-3 mt-4 border border-indigo border-opacity-10">
                            <p class="small text-muted mb-0" style="font-size: 0.8rem;">
                                <i class="bi bi-info-circle-fill text-indigo me-1"></i>
                                Simpan perubahan secara berkala agar tidak hilang saat bergantian perangkat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('add-member').addEventListener('click', function() {
            const container = document.getElementById('members-container');
            const newItem = document.createElement('div');
            
            newItem.className = 'd-flex align-items-center gap-2 mb-2 member-item'; 
            newItem.innerHTML = `
                <input type="text" name="members[]" class="form-control answer-box-input w-100" 
                    placeholder="Nama Anggota" required>
                <div style="width: 40px;" class="d-flex justify-content-center align-items-center">
                    <button type="button" class="btn btn-link text-danger remove-member p-0 border-0">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>`;
            container.appendChild(newItem);
        });

        document.addEventListener('click', function(e) {
            if (e.target.closest('.remove-member')) {
                const items = document.querySelectorAll('.member-item');
                if (items.length > 1) {
                    e.target.closest('.member-item').remove();
                } else {
                    alert('Minimal harus ada 1 anggota kelompok.');
                }
            }
        });

        async function runCCode() {
            const outputBox = document.getElementById('cOutput');
            const btn = document.getElementById('runBtn');

            const codeContent = typeof cEditor !== 'undefined' && cEditor.getValue
                                ? cEditor.getValue()
                                : document.getElementById('cEditor').value;

            btn.disabled = true;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Menjalankan...';
            outputBox.innerText = "> Sedang menjalankan kode...";
            outputBox.style.color = "#fbbf24";

            try {
                const response = await fetch('{{ route("execute.c") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-Token': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ code: codeContent })
                });

                // Check HTTP status first
                if (!response.ok) {
                    const errorText = await response.text();
                    outputBox.innerText = `ERROR: HTTP ${response.status}\n${errorText}`;
                    outputBox.style.color = "#f87171";
                    console.error(`HTTP Error ${response.status}:`, errorText);
                    return;
                }

                let data;
                try {
                    data = await response.json();
                } catch (parseError) {
                    outputBox.innerText = "ERROR: Invalid server response\n" + await response.text();
                    outputBox.style.color = "#f87171";
                    console.error('JSON parse error:', parseError);
                    return;
                }

                // Check if demo mode
                if (data._mode === 'demo') {
                    outputBox.style.color = "#fbbf24";
                    outputBox.innerText = (data.stdout || '') + (data.stderr ? '\n' + data.stderr : '');
                    return;
                }

                if (data.stdout) {
                    outputBox.innerText = data.stdout;
                    outputBox.style.color = "#34d399";
                } else if (data.stderr) {
                    outputBox.innerText = "ERROR:\n" + data.stderr;
                    outputBox.style.color = "#f87171";
                } else if (data.error) {
                    outputBox.innerText = "ERROR:\n" + data.error;
                    outputBox.style.color = "#f87171";
                } else {
                    outputBox.innerText = "> Program selesai (tidak ada output).";
                    outputBox.style.color = "#94a3b8";
                }
            } catch (error) {
                outputBox.innerText = "Failed to fetch: " + error.message + "\n\nPastikan server sedang berjalan dan kode C valid.";
                outputBox.style.color = "#f87171";
                console.error('Fetch error:', error);
            } finally {
                btn.disabled = false;
                btn.innerHTML = '<i class="bi bi-play-circle-fill me-2"></i> JALANKAN KODE';
            }
        }

        document.getElementById('submitBtn').addEventListener('click', function(e) {
            // Ambil semua input dan textarea yang wajib diisi
            const inputs = document.querySelectorAll('.answer-box-input');
            let allFilled = true;
            inputs.forEach(input => {
                if (input.value.trim() === "") {
                    allFilled = false;
                    input.classList.add('border-danger'); // Beri tanda merah kalau kosong
                } else {
                    input.classList.remove('border-danger');
                }
            });

            if (!allFilled) {
                e.preventDefault(); // Batalkan submit
                alert('Ups! Mohon lengkapi semua jawaban di setiap fase sebelum mengumpulkan tugas.');
                
                // Scroll ke elemen pertama yang kosong agar murid tahu
                const firstEmpty = document.querySelector('.border-danger');
                if (firstEmpty) firstEmpty.scrollIntoView({ behavior: 'smooth', block: 'center' });
                return false;
            }

            // Konfirmasi akhir
            if (!confirm('Apakah kalian yakin ingin mengumpulkan? Setelah dikumpulkan, jawaban tidak dapat diubah lagi dan akan langsung muncul di halaman evaluasi Guru.')) {
                e.preventDefault();
            }
        });
    </script>
</x-workspace-layout>
