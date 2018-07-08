<div class="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/adminPanel">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add product</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <form method="post" action="addProduct" enctype="multipart/form-data">
                    <label class="container">
                        Название товара:
                        <input size="101px" type="text" name="product_name" value="" class="form-item autofocus"
                               required>
                    </label>
                    <label class="container">
                        Добавить картинку
                        <input type="file" name="image" class="form-item">
                    </label>
                    <label class="container">
                        Описание товара :
                        <textarea rows="2" cols="100" type="text" name="description" class="form-item"
                                  required></textarea>
                    </label>
                    <label class="container">
                        Категория:
                        <select name="categories_id" required>
                            <option selected disabled>Выберите категорию</option>
                            <?php if ($cat = new Model()): ?>
                                <?php foreach ($cat->getCategories() as $category): ?>
                                    <option value="<?= $category->id; ?>"><?= $category->title; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </label>
                    <label class="container">
                        Цена:
                        <input size="101px" type="text" name="price" value="" class="form-item "
                               required>
                    </label>
                    <br>
                    <button style="margin: 15px" type="submit" name="add" class="btn btn-success">Добавить товар
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>