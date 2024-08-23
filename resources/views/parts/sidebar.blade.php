<button class="btn btn-primary d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive"
    aria-controls="offcanvasResponsive">Abrir Menu</button>

<div class="col offcanvas-lg offcanvas-end" tabindex="-1" id="offcanvasResponsive"
    aria-labelledby="offcanvasResponsiveLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasResponsiveLabel">Menu Administrador</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <p class="mb-0">
        <div class="position-sticky pt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/dashboard">
                        <span data-feather="home"></span>
                        <h5>Dashboard</h5>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cursos" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="custom-tooltip" data-bs-title="Acesso aos cursos.">
                        <i class="bi bi-cart"></i>
                        Cursos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/alunos" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="custom-tooltip" data-bs-title="Acesso aos alunos.">
                        <i class="bi bi-person-badge"></i>
                        Alunos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/professores" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="custom-tooltip" data-bs-title="Acesso aos Professores.">
                        <i class="bi bi-card-checklist"></i>
                        Professores
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="custom-tooltip" data-bs-title="Acesso aos relatórios.">
                        <i class="bi bi-clipboard-data"></i>
                        Relatórios
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="custom-tooltip" data-bs-title="Acesso ao Calendário Escolar.">
                        <i class="bi bi-calendar"></i> <!-- Corrigido o ícone para "calendar" -->
                        Calendário
                    </a>
                </li>
            </ul>
        </div>
        </p>
    </div>
</div>

<!-- Inicialização do Tooltip -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    })
</script>
