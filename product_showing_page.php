<div class="col-md-6 col-xl-4">
    <div class="card h-100 border-0 shadow-sm product-card">
        <div class="position-relative product-card overflow-hidden">
            <span class="badge bg-primary position-absolute m-3 top-0 start-0 z-1">New</span>
            <img src="uploads/<?php echo $show_items['image'] ?>" class="card-img-top p-2 rounded-4" alt="Product">
            <div class="product-actions d-flex flex-column gap-2">
                <a class="btn btn-white shadow-sm"><i class="bi bi-cart"></i></a>
                <a class="btn btn-white shadow-sm"><i class="bi bi-eye"></i></a>
            </div>
        </div>
        <div class="card-body">
            <p class=" badge bg-light text-secondary rounded-pill small mb-2"><?php echo $show_items['type'] ?></p>
            <h6 class="card-title fw-bold"><?php echo $show_items['title'] ?></h6>
            <small class="card-text ">In Stock : <?php echo $show_items['quantity'] ?></small>
            <div class="d-flex justify-content-between align-items-center mt-1">
                <span class="h5 fw-bold mb-0 text-primary"><?php echo $show_items['price'] ?>$</span>
            </div>
        </div>
    </div>
</div>