<?php
    include('partials/header.php');
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit Post</h2>
        <form action="" enctype="multipart/form-data">
            <input type="text" placeholder="Title">
            <select>
                <option value="1">Wild life</option>
                <option value="1">Travel</option>
                <option value="1">Art</option>
                <option value="1">Techonology</option>
                <option value="1">Food</option>
                <option value="1">Music</option>
            </select>
            <textarea rows="10" placeholder="Body"></textarea>
            <div class="form__controlcinline">
                <input type="checkbox" id="is_featured" checked>
                <label for="is_featured">Featured</label>
            </div>
            <div class="form__control">
                <label for="thumbnail">Update Thumbnail</label>
                <input type="file" id="thumbnail">
            </div>
            <button type="submit" class="btn">Update Post</button>
        </form>
    </div>
</section>

<?php
    include('../partials/footer.php');
?>
