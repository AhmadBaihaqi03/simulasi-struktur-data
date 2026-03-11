<x-workspace-layout>
    <div class="container py-4">
        
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
            <a href="/" class="text-decoration-none text-muted fw-bold small">
                <i class="bi bi-arrow-left me-2"></i> KEMBALI KE BERANDA
            </a>
            <div class="bg-white border rounded-pill px-4 py-2 shadow-sm d-flex align-items-center">
                <small class="text-muted fw-bold text-uppercase me-2 border-end pe-2" style="font-size: 10px; letter-spacing: 1px;">Sesi Aktif</small>
                <span class="text-indigo fw-bold small uppercase tracking-wider">{{ $session->session_code }}</span>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-5">
            
            <div class="card-body p-4 p-md-5 border-bottom">
                <h1 class="display-6 fw-bold text-dark mb-3">{{ $session->title }}</h1>
                <p class="text-secondary mb-0">Pahami konteks permasalahan di bawah ini sebelum mulai berkolaborasi dengan tim.</p>
            </div>

            <div class="card-body p-4 p-md-5 bg-light">
                <div class="position-relative bg-white p-4 p-md-5 rounded-4 border shadow-sm group">
                    <div class="position-absolute top-0 start-0 translate-middle bg-indigo text-white rounded-3 shadow d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; margin-left: 10px; margin-top: 10px;">
                        <i class="bi bi-quote fs-3"></i>
                    </div>
                    
                    <div class="pt-2">
                        <p class="fs-5 text-dark lh-lg mb-0" style="white-space: pre-wrap; font-style: italic; font-weight: 500;">
                            "{{ $session->f1_context }}"
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-body p-5 text-center bg-white border-top">
                <p class="text-uppercase text-muted fw-bold mb-4" style="font-size: 10px; letter-spacing: 2px;">Siap Menuju Langkah Berikutnya?</p>
                
                <button type="button" 
                        class="btn btn-indigo btn-lg px-5 py-3 shadow d-inline-flex align-items-center gap-3 rounded-3" 
                        data-bs-toggle="modal" 
                        data-bs-target="#joinGroupModal">
                    <span class="text-uppercase fw-bold" style="font-size: 14px; letter-spacing: 1px;">SAYA SIAP MENGERJAKAN</span>
                    <i class="bi bi-rocket-takeoff-fill fs-5"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="joinGroupModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 shadow-lg">
                <div class="modal-body p-5 text-center">
                    <div class="bg-light text-indigo rounded-4 d-flex align-items-center justify-content-center mx-auto mb-4 shadow-sm" style="width: 64px; height: 64px;">
                        <i class="bi bi-people-fill fs-2"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-2">Identitas Kelompok</h4>
                    <p class="text-muted small mb-4">Masukkan nama kelompok untuk masuk ke workspace atau melanjutkan progres tim.</p>

                    <form action="{{ route('student.join.group', $session->session_code) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="text-uppercase fw-bold text-muted mb-2 d-block" style="font-size: 9px; letter-spacing: 2px;">Nama Kelompok</label>
                            <input type="text" name="group_name" 
                                   class="form-control form-control-lg text-center fw-bold bg-light border-0 py-3 rounded-3" 
                                   placeholder="CONTOH: TIM KODING" required autofocus
                                   style="text-transform: uppercase;">
                        </div>

                        <button type="submit" class="btn btn-dark w-100 py-3 fw-bold rounded-3 shadow-sm border-0" style="background-color: #1e293b;">
                            MASUK PBL WORKSPACE <i class="bi bi-arrow-right ms-2"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-workspace-layout>