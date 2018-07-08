<div class="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Categories</li>
        </ol>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/adminPanel/addCategory">Add new</a>
            </li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Categories list
                <span style="margin-left: 30px">Categories : <?= count($data); ?> </span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Category_name:</th>
                            <th>Actions:</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Category_name:</th>
                            <th>Actions:</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php $categories = $data; ?>
                        <?php foreach ($categories as $category): ?>
                            <tr>
                                <td><?= $category->title ?></td>
                                <td>
                                    <a href="/adminPanel/editCategory?<?= $category->title; ?>">Edit</a><br>
                                    <a href="/adminPanel/delCategory?<?= $category->title; ?>">Delete</a>
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