<form action="ex1.php" method="post">
 <p>Número de posições no array: <input type="text" name="name" /></p>
 <p>Numero de inversões: <input type="text" name="age" /></p>
 <p><input type="submit" /></p>
</form>

<?php

echo "<br><pre>";
print_r($_POST);

?>