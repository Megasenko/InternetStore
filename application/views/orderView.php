<?php $product = $data; ?>
<?php if ($product): ?>
    <form id="order" action="sendOrder" method="post">
        <h3>
            Страница заказа товара :
        </h3>
        <label> От кого:
            <input class="form-control" type="email" name="email" placeholder="Введите Email" required autofocus/>
        </label>
        <label> Цена:
            <input class="form-control" type="text" name="price" value=" <?= $product->price ?> $"/>
        </label>
        <label> Наименование детали:
            <input class="form-control" type="text" name="product_name" value="<?= $product->product_name; ?>"/>
        </label>
        <label> Марка автомобиля:
            <input class="form-control" type="text" name="category" value="<?= $product->title; ?>"/>
        </label>
        <label> Сообщение:
            <textarea class="form-control" name="message" cols="44" placeholder="Оставте комментарий к заказу" rows="3">
            </textarea>
        </label>
        <br>
        <button class="btn" name="order">
            Заказать
        </button>
    </form>
<?php else: ?>
    <p>
        Sorry,product not found!
    </p>
<?php endif; ?>