<?php
include('classes/Api.php');
include("classes/Helper.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Rick and Morty</title>
    <head>
        <title>Totally Wicked Test</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
</head>
<body>
<?php
$api = new Api();

$api->dataRequest('character');
$characters = $api->getCharacters();

?>
<div class="container">
    <div class="row justify-content-md-center mt-5 mb-5">
        <div class="col-md-auto">
            <form class="form-inline">
                <div class="form-group mx-sm-3 mb-2">

                    <input type="text" class="form-control input-lg" name="name" <?php if (isset($_GET['name'])) {
                        echo "value='" . $_GET['name'] . "'";
                    } ?> placeholder="Character Name">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Search</button>
            </form>
        </div>


    </div>
    <div class="row">


        <?php

        if ($characters) {
            foreach ($characters as $character) {
                ?>

                <div class="col-sm-3">
                    <div class="card mb-5" style="">
                        <img class="card-img-top" src="<?php echo $character->image; ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $character->name; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $character->species; ?>
                                (<?php echo $character->origin->name; ?>)</h6>
                            <p class="card-text"><span
                                        class="font-weight-bold">Episodes: </span><?php echo $helper->getEpisodes($character->episode) ?>
                            </p>

                        </div>
                    </div>

                </div>
            <?php }
        } else {
            echo "<div class='col-sm-12 text-center'>Sorry, No Records Found.</div>";
        }
        ?>


    </div>
    <div class="row mb-5">


        <a class="col text-center mb-5">
            <a href="<?php echo $helper->contentHandler($api->getPrev()); ?>"
               class="btn btn-primary btn-lg <?php if ($api->getPrev() == '') {
                   echo 'disabled';
               } ?> mr-3" role="button" aria-pressed="true">Previous Page</a>
            <a href="<?php echo $helper->contentHandler($api->getNext()); ?>"
               class="btn btn-primary btn-lg <?php if ($api->getNext() == '') {
                   echo 'disabled';
               } ?>" role="button" aria-pressed="true">Next Page</a>
    </div>
</div>

</body>
</html>

