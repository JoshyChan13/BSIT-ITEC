<?php
    session_start();
    if(session_destroy()){
    ?>
        <script>
            window.location("Home.php");
        </script>
    <?php
    }
?>