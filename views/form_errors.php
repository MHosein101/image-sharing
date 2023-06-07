<?php if(session_has('errors')): ?>

<div id="errors">

    <?php foreach(session_get('errors') as $e): ?>

        <i> <?=$e?> </i>

    <?php endforeach; ?>

</div>

<?php session_delete('errors'); endif; ?>