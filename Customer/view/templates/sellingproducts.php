<div class="col-lg-12">
    <h4 class="mb-4">Sách bán chạy</h4>
    <?php foreach($listsellingbooks as $sellingbook): ?>
    <div class="d-flex align-items-center justify-content-start">
        <div class="rounded" style="width: 100px; height: 100px;">
            <img src="<?php echo $sellingbook->getImage() ?>" class="img-fluid rounded" alt="Image">
        </div>
        <div>
            <?php 
                // $bookName = $book->getBookName();
                $bookName = $sellingbook->getBookName();
                $shortenedName = "";
                if(strlen($bookName) > 50){
                    $bookName = substr($bookName, 0, 50);
                    $words = explode(' ', $bookName);
                    $shortenedName = implode(' ', array_slice($words, 0, count($words)-1)) . '...';
                }
                else {
                    $shortenedName = $bookName;
                }
                
            ?>
            <h6 class="mb-2"><a href="?route=bookdetail&bookid=<?php echo $sellingbook->getBookId() ?>"><?php echo $shortenedName ?></a></h6>
            <div class="d-flex mb-2">
                <?php for($i=0; $i < round($sellingbook->getMediumStar()); $i++): ?>
                    <i class="fa fa-star text-secondary"></i>
                <?php endfor ?>
                <?php for($i = round($sellingbook->getMediumStar()); $i < 5; $i++): ?>
                    <i class="fa fa-star"></i>
                <?php endfor ?>
            </div>
            <div class="d-flex mb-2">
                <h5 class="fw-bold me-2"><?php echo number_format($sellingbook->getSalePrice()) . " đ " ?></h5>
                <!-- <h5 class="text-danger text-decoration-line-through">4.11 $</h5> -->
            </div>
        </div>
    </div>
    <?php endforeach ?>
    <div class="d-flex justify-content-center my-4">
        <a href="?route=book&sellingbook=1" class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Xem thêm</a>
    </div>
</div>