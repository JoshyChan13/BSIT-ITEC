<?php 
    include ("Modules/connect.php");
    include ("Modules/header.php");
    $sql = "SELECT * FROM products";
    $result = $con->query($sql);
?>


<BR><BR><BR><BR><BR><BR><BR>
<section class="menu" id="menu">
        <h1 class="heading text-center" style="font-size: 45px;"><strong>Our <span class="text-success">MENU</span></strong> </h1>
        <div class="box-container">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <div class="box">
                        <img class="image" src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="">
                        <div class="content">
                            <h3>' . $row['name'] . '</h3>
                            <p>₱' . $row['price'] . '</p>
                        </div>';
                        echo '<a href="javascript:void(0);" class="btn" onclick="addToCart(' . $row['Item_id'] . ', \'' . addslashes($row['name']) . '\', ' . $row['price'] . ', \'' . 'data:image/jpeg;base64,' . base64_encode($row['image']) . '\')">Add to Cart</a>';
                    echo '</div>';
                }
            } else {
                echo "No products found!";
            }
            ?>
        </div>

    </section>
    <script>
        function addToCart(itemId, name, price) {
            const data = {
                item_id: itemId,
                name: name,
                price: price,
            };
            fetch('add_to_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data), 
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    alert(result.message); 
                } else {
                    alert('Error: ' + result.message); 
                }
            })
            .catch(error => console.error('Fetch error:', error));
        }
    </script>
<BR><BR><BR><BR><BR><BR><BR>

<?php include 'Modules/footer.php'; ?>
