<form id="cart" action="" method="post">
    <h3>
        Страница заказа товара :
    </h3>
    <label> От кого:
        <input class="form-control" type="text" name="from" placeholder="Введите Email"/>
    </label>
    <label> Цена:
        <input class="form-control" type="text" name="price"/>
    </label>
    <label> Наименование детали:
        <input class="form-control" type="text" name="subject"/>
    </label>
    <label> Марка автомобиля:
        <input class="form-control" type="text" name="category"/>
    </label>
    <label> Сообщение:
        <textarea class="form-control" name="message" cols="44" placeholder="Напишите комментарий к заказу" rows="3">
        </textarea>
    </label>
    <br>
    <button type="submit" class="btn" name="send">
        Заказать
    </button>
</form>