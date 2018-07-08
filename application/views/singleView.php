<?php $product = $data; ?>
<?php if ($product): ?>
<div class="row">
    <div class="col-12">
        <div class="post-preview">
            <h3 class="post-title">
                <?= $product->product_name; ?>
            </h3>
            <div class="row">
                <div class="col-md-6">
                    <?php if ($product->image): ?>
                        <img width="300" src="<?= $product->image; ?>">
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
                    <a style="text-decoration: none" href="/product/order?<?= $product->url; ?>">
                        Купить
                    </a>
                </button>
            </div>
        </div>
        <hr>
        <?php else: ?>
            <p>Sorry,product not found!</p>
        <?php endif; ?>
    </div>
</div>