<!--<!DOCTYPE html>-->
<!--<html lang="ru">-->
<!--<head>-->
<!--    --><?php //'views/components/service/head.php'; ?>
<title>Авторизация</title>
<style>
    .auth {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f5f5f5;
    }
    .auth-container {
        width: 100%;
        max-width: 400px;
        padding: 20px;
    }
    .auth-content {
        background: white;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .auth-title {
        text-align: center;
        margin-bottom: 1.5rem;
    }
    .form-group {
        margin-bottom: 1rem;
    }
    .form-label {
        display: block;
        margin-bottom: 0.5rem;
    }
    .form-control {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    .btn {
        display: block;
        width: 100%;
        padding: 0.75rem;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .btn:hover {
        background-color: #0069d9;
    }
    .alert {
        padding: 0.75rem;
        margin-bottom: 1rem;
        border-radius: 4px;
    }
    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    .auth-footer {
        text-align: center;
        margin-top: 1rem;
    }
    .auth-link {
        color: #007bff;
        text-decoration: none;
    }
</style>
<div class="auth">
    <div class="auth-container">
        <div class="auth-content">
            <?php if (isset($_SESSION['error_message'])): ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars($_SESSION['error_message']); ?>
                    <?php unset($_SESSION['error_message']); ?>
                </div>
            <?php endif; ?>

            <form class="card f-auth" action="login" method="post">
                <h2 class="auth-title">Вход</h2>

                <div class="form-group">
                    <label for="login" class="form-label">Логин</label>
                    <input type="text"
                           id="login"
                           name="login"
                           class="form-control"
                           placeholder="Nickname"
                           value="<?php echo isset($_SESSION['login']) ? htmlspecialchars($_SESSION['login']) : ''; ?>"
                           required>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password"
                           id="password"
                           name="password"
                           class="form-control"
                           placeholder="******"
                           required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Войти</button>
            </form>

            <div class="auth-footer">
                <p>У меня еще нет <a href="/register.php" class="auth-link">аккаунта</a></p>
            </div>
        </div>
    </div>
</div>

<?php // include_once __DIR__ . '/source/scripts.php'; ?>