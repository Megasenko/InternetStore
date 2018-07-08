<div class="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/adminPanel">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Update category</li>
        </ol>
        <?php $category = $data;
        if ($category): ?>
        <div class="row">
            <div class="col-12">
                <form method="post" action="/adminPanel/updateCategory?<?= $category->title; ?>"
                      enctype="multipart/form-data">
                    <label class="container">
                        Название категории:
                        <input size="101px" type="text" name="title" value="<?= $category->title; ?>"
                               class="form-item"
                               autofocus required>
                    </label>
                    <br>
                    <button style="margin: 15px" type="submit" name="update" class="btn btn-success">Обновить категорию
                    </button>
                </form>
            </div>
            <?php else: ?>
                <p>Category not found!</p>
            <?php endif; ?>
        </div>
    </div>
</div>