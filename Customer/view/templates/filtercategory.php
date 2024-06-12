<style>
    .li_category ul {
        list-style: none;
        display: none;
    }

    .li_category:hover ul {
        display: block;
    }

</style>

<div class="col-lg-12">
    <form action="?route=book" method="post">
    <div class="input-group w-100 mx-auto d-flex mb-4">
        <input type="search" name="key" class="form-control p-3" placeholder="Từ khóa" aria-describedby="search-icon-1">
        <button type="submit" id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></button>
    </div>
    </form>
    <div class="mb-4">
        <h4>Thể loại</h4>
        <ul class="list-unstyled fruite-categorie">
            <?php foreach ($listcategory as $cate) : ?>
            <li class="li_category">
                <div class="d-flex justify-content-between fruite-name">
                    <a href="?route=book&cateid=<?php echo $cate->getCateid() ?>"><?php echo $cate->getCatename() ?></a>
                    <span>(<?php echo (new CategoryDAO())->getCountBookById($cate->getCateid()) ?>)</span>
                    
                </div>
                <ul>
                    <?php foreach (((new GenreDAO())->getGenreByCateid($cate->getCateid())) as $genre): ?>
                    <li>
                    <div class="d-flex justify-content-between fruite-name">
                        <a href="?route=book&genreid=<?php echo $genre->getGenreid() ?>"><?php echo $genre->getGenrename() ?></a>
                        <span>(<?php echo (new GenreDAO())->getCountBookById($genre->getGenreid()) ?>)</span>
                    </div>
                    </li>
                    <?php endforeach ?>
                </ul>
            </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>