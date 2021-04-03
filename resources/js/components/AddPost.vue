<template>
    <div class="container">
        <div class="row">

            <form class="add-post col-8">
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <label for="subcategory">Выберите подкатегорию:</label>
                    <select class="form-control" id="subcategory">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="post">Текст публикации</label>
                    <textarea class="form-control" id="post" rows="6"></textarea>
                </div>
                <div class="form-group">
                    <label for="file">Прикрепите изображение:</label>
                    <input type="file" class="form-control-file" id="file">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-secondary btn-post">Опубликовать</button>
                    <button class="btn btn-outline-secondary btn-post">Отменить</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
name: "AddPost"
}
</script>

<style scoped>
* {
    margin: 0 auto;
}

.add-post {
    margin: 40px auto;
    font-family: "Nunito", sans-serif;
    font-size: 1rem;
    font-weight: 400;
    color: #494f54;
}

.btn-post {

    border-radius: 25px;
}

</style>
