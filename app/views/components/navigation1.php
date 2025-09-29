<div class="container-fluid bg-white shadow-sm py-2">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
        <!-- Лого / Профиль -->
        <div class="d-flex align-items-center gap-3">
            <div class="dropdown">
                <button class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-2"
                        data-bs-toggle="dropdown">
                    <span class="d-none d-md-inline"><?=$_SESSION['login']?></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Профиль</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Настройки</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="/logout.php"><i class="bi bi-box-arrow-right me-2"></i>Выйти</a></li>
                </ul>
            </div>
        </div>

        <!-- Основные кнопки -->
        <div class="d-flex flex-wrap gap-2">
            <button class="btn btn-sm btn-outline-danger">
                <i class="bi bi-people-fill"></i>
                <span class="ms-1 d-none d-sm-inline">Пользователи</span>
            </button>
            <button class="btn btn-sm btn-outline-primary">
                <i class="bi bi-list-ul"></i>
                <span class="ms-1 d-none d-sm-inline">Все</span>
            </button>
            <button class="btn btn-sm btn-success">
                <i class="bi bi-plus-lg"></i>
                <span class="ms-1 d-none d-sm-inline">Добавить</span>
            </button>
        </div>

        <!-- Поиск (сворачивается на мобильных) -->
        <div class="flex-grow-1 flex-md-grow-0" style="min-width: 200px; max-width: 300px;">
            <div class="input-group input-group-sm">
                <input type="text" class="form-control" placeholder="Поиск...">
                <button class="btn btn-outline-secondary" type="button">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
    </div>
</div>