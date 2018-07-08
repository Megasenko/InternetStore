<?php if ($data): ?>
    <?php foreach ($data as $product): ?>
        <div class="post-preview">
            <h4 class="post-title">
                <?= $product->product_name; ?>
            </h4>
            <div class="row">
                <div class="col-md-6">
                    <?php if ($product->image): ?>
                        <img width="200" src="<?= $product->image; ?>">
                    <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <h5 class="post-subtitle">
                        <?= $product->description; ?>
                    </h5>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="btn btn-info col-md-4 ">
                    Цена: <?= $product->price ?> $
                </div>
                <span class="col-md-4"></span>
                <button class="btn btn-warning col-md-4">
                    <a style="text-decoration: none" href="/product/page?<?= $product->url; ?>">
                        Посмотреть подробнее
                    </a>
                </button>
            </div>
        </div>
        <hr>
    <?php endforeach; ?>
<?php else: ?>
    <p>Sorry,product not found!</p>
<?php endif; ?>