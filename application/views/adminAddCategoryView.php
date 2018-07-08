<div class="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/adminPanel">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add category</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <form method="post" action="addCategory">
                    <label class="container">
                        Название категории :
                        <input size="101px" type="text" name="title" class="form-item autofocus"
                               required>
                    </label>

                    <br>
                    <button style="margin: 15px" type="submit" name="add" class="btn btn-success">Добавить категорию
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>