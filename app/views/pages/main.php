<!DOCTYPE html>
<html lang="en">
<? require_once "views/components/service/head.php";?>
<body>
<!--<div style="border-style: double; padding: 5px; margin-top: 30px" class="container menu">-->
<!--    <div class="row">-->
<!--        <div class="col-8 row justify-content-between">-->
<!--            <div class="col-3">-->
<!--                <button>выйти</button>-->
<!--            </div>-->
<!--            <div class="col-3">-->
<!--                <button style="background-color: red">список пидарасов</button>-->
<!--            </div>-->
<!--            <div class="row col-6">-->
<!--                <div class="col-6">-->
<!--                    <button>показать всех</button>-->
<!--                </div>-->
<!--                <div class="col-6">-->
<!--                    <button>добавить</button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-4 row justify-content-end">-->
<!--            <div class="col-4">-->
<!--                <input>-->
<!--            </div>-->
<!--            <div class="col-2">-->
<!--                <button>найти</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<? include "views/components/navigation.php";?>
<?php
// Получаем данные
//$categories = ['танки', 'хилы', 'дд'];
//$sql = "SELECT tier_name FROM `tier`";
//$result = mysqli_query($conn, $sql);
//$tiers = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<style>
    .menu-container {
        border: 4px double #6c757d;
        border-radius: 8px;
        padding: 15px;
        margin-top: 30px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .category-block {
        background-color: white;
        border-radius: 8px;
        padding: 15px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        transition: transform 0.2s;
    }

    .category-block:hover {
        transform: translateY(-3px);
    }

    .category-title {
        font-weight: 700;
        font-size: 1.2rem;
        color: #343a40;
        margin-bottom: 15px;
        text-transform: uppercase;
    }

    .tiers-container {
        margin: 10px 0;
    }

    .tier-button {
        width: 100%;
        margin: 5px 0;
        padding: 6px 12px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        transition: all 0.3s;
    }

    .tier-button:hover {
        background-color: #0056b3;
        transform: scale(1.03);
    }

    .show-all-btn {
        width: 100%;
        padding: 8px;
        margin-top: 10px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 4px;
        font-weight: 500;
        transition: all 0.3s;
    }

    .show-all-btn:hover {
        background-color: #218838;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
</style>

<div class="container menu-container">
    <div class="row justify-content-between">
        <?php foreach ($categories as $category): ?>
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="category-block h-100">
                    <div class="category-title">
                        <?= htmlspecialchars($category) ?>
                    </div>

                    <div class="tiers-container row justify-content-center">
                        <?php foreach ($tiers as $tier): ?>
                            <div class="col-5 mb-2">
                                <button class="tier-button <?= htmlspecialchars($tier['tier_name']) ?>">
                                    <?= htmlspecialchars($tier['tier_name']) ?>
                                </button>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="row justify-content-center mt-2">
                        <div class="col-8">
                            <button class="show-all-btn" data-category="<?= htmlspecialchars($category) ?>">
                                Показать всех
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>