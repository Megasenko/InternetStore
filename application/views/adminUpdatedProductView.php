<div class="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/adminPanel">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Updated product</li>
        </ol>
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
                    <div class="btn btn-info col-md-4 ">
                        Цена: <?= $product->price ?> $
                    </div>
                </div>
                <hr>
                <?php else: ?>
                    <p>Sorry,product not found!</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
