<div class="container-fluid">
    <?php if (isset($vars['artists']) && count($vars['artists'])): ?>
        <div class="row">
            <?php foreach($vars['artists'] as $artist): ?>
                <div class="col-md-4">
                    <a href="artists/detail?artist_id=<?= $artist->id ?>">
                        <img src="/public/images/electric-guitar.svg" width="150"/>
                        <br/>
                        <h3><?= $artist->first_name . " " . $artist->last_name ?></h3>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    <?php else: ?>
        Geen artiesten gevonden
    <?php endif ?>

</div>