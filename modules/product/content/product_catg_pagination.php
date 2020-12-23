
<nav>
    <ul class="pagination">
        <!-- <li>
            <a href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            </a>
        </li> -->
    <?php 
        for($i = 1; $i <= $totalPage; $i++) {
    ?>
        <li><a href="<?php
            if(isset($_GET['type']) && !isset($_GET['search'])) {
                echo "index.php?p=product&type=".$_GET['type']."&page=".$i;
            }
            if (!isset($_GET['type']) && isset($_GET['search'])) {
                echo "index.php?p=product&search=".$_GET['search']."&page=".$i;
            }
            if (!isset($_GET['type']) && !isset($_GET['search'])) {
                echo "index.php?p=product&page=".$i;
            }
        ?>"><?php echo $i; ?></a></li>
    <?php
        }
    ?>
        <!-- <li>
            <a href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            </a>
        </li> -->
    </ul>
</nav>