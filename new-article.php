<?php include 'header.php';
include 'sidebar.php'; ?>

<!-- Main pages -->

<div class="col-lg-9 my-5">
    <form class="w-75">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="title form-control" id="title" aria-describedby="titlehelp">
        </div>
        <div class="form-group">
            <label for="textarea">Contenu article</label>
            <input type="textarea" class="contenu form-control" id="textarea">
        </div>
        <!-- <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
        <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>



</div>
<?php include 'footer.php'; ?>