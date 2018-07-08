<div class="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Products</li>
        </ol>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/adminPanel/addProduct">Add new</a>
            </li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Products list
                <span style="margin-left: 30px">Products : <?= count($data); ?> </span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Product_name:</th>
                            <th>Description:</th>
                            <th>Image:</th>
                            <th>Category:</th>
                            <th>Price:$</th>
                            <th>Actions:</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Product_name:</th>
                            <th>Description:</th>
                            <th>Image:</th>
                            <th>Category:</th>
                            <th>Price:$</th>
                            <th>Actions:</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php $products = $data; ?>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?= $product->product_name ?></td>
                                <td><?= substr($product->description, 0, 100); ?></td>
                                <td><?= $product->image ?></td>
                                <td><?= $product->title ?></td>
                                <td><?= $product->price ?></td>
                                <td>
                                    <a href="/adminPanel/editProduct?<?= $product->url; ?>">Edit</a><br>
                                    <a href="/adminPanel/delProduct?<?= $product->url; ?>">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
