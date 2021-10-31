<html lang="es">
<head>
    <title>Christmas tree</title>
</head>
<body>
<form method="post" action="Christmas_tree.php">
    <label>
        Number:
        <input type="text" name="num"/>
    </label>
    <input type="submit"/>
</form>
<div style="background-color: skyblue; display: inline-block;">
    <?php
    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);

        for ($i = 0; $i <= $num; $i++) {
            for ($k = $num; $k >= $i; $k--) {
                echo "<span style='color: white'>*</span>";
            }

            for ($j = 0; $j < $i; $j++) {
                echo "<span style='color: forestgreen'>*</span>";

            }
            echo "<span style='color: forestgreen'>*</span>";
            for ($j = 0; $j < $i; $j++) {
                echo "<span style='color: forestgreen'>*</span>";

            }
            for ($l = $num;$l>=$i;$l--){
                echo "<span style='color: white'>*</span>";
            }
            echo "<br>";
        }



    }
    ?>
</div>
</body>
</html>