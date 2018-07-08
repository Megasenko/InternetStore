<div class="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/adminPanel">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Update product</li>
        </ol>
        <?php $product = $data;
        if ($product): ?>
        <div class="row">
            <div class="col-12">
                <form method="post" action="/adminPanel/updateProduct?<?= $product->url; ?>"
                      enctype="multipart/form-data">
                    <label class="container">
                        Название товара:
                        <input size="101px" type="text" name="product_name" value="<?= $product->product_name; ?>"
                               class="form-item" autofocus required>
                    </label>
                    <label class="container">
                        Описание товара :
                        <textarea rows="2" cols="100" type="text" name="description" class="form-item" required>
                            <?= $product->description; ?>
                        </textarea>
                    </label>
                    <label class="container">
                        Изображение :
                        <img width="200" src="<?= $product->image; ?>">
                    </label>
                    <label class="container">
                        Изменить изображение :
                        <input type="file" name="image" class="form-item">
                    </label>
                    <label class="container">
                        Категория:
                        <select name="categories_id">
                            <?php if ($cat = new Model()): ?>
                                <?php foreach ($cat->getCategories() as $category): ?>
                                    <?php if ($category->title != $product->title): ?>
                                        <option value="<?= $category->id; ?>"><?= $category->title; ?></option>
                                    <?php else : ?>
                                        <option selected value="<?= $category->id; ?>"><?= $category->title; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </label>
                    <label class="container">
                        Цена :
                        <input size="101px" type="text" name="price" value="<?= $product->price; ?>" class="form-item"
                               required>
                    </label>
                    <br>
                    <button style="margin: 15px" type="submit" name="update" class="btn btn-success">
                        Обновить товар
                    </button>
                </form>
            </div>
            <?php else: ?>
                <p>Product not found!</p>
            <?php endif; ?>
        </div>
    </div>
</div>