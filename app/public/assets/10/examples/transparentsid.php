<?php

ini_set('session.use_cookies', '0');
ini_set('session.use_only_cookies', 0);
ini_set('session.use_trans_sid', 1);
ini_set('session.cache_limiter', '');
session_start();
?>
<a href="transparentsid.php" title="to next page">transparentsid.php</a>
<form action="transparentsid.php" method="post">
    <fieldset>
        <legend>Pizza style</legend>
        <label><input type="radio" name="style" value="normal" id="style_normal">Normal</label>
        <label><input type="radio" name="style" value="calzone" id="style_calzone">Calzone</label>
        <label><input type="radio" name="style" value="deeppan" id="style_deeppan">Deep Pan</label>
        <label><input type="submit" name="btnSubmit" value="Choose toppings &gt;"/></label>
    </fieldset>
</form>
