<?php
include_once(PROJECT_ROOT_PATH . "/src/models/ArtistModel.class.php");

function subscribeDialog($params) {
    $id = $params["id_artist"];
    $model = new ArtistModel();
    $artist = $model->getArtistByArtistId($id);
    $name = $artist->name;
    $image_url = $artist->image_url;
    $html = <<< "EOT"
    <div class="dialog-wrapper">
        <div class="dialog" id="dialog-artist" id-artist="$id">
            <input type="text" id="artist-name" value="$name"><br>
            <img id="artist-image-preview" src="$image_url"  alt="Not Found!" onerror="this.src='/image/none.jpg'"/><br>
            <p>Subscribe $name</p>
            <button class="dialog-button dialog-submit" id="dialog-subscribe-submit-button">Subscribe</button>
            <button class="dialog-button" id="dialog-cancel-button">Cancel</button>
        </div>
    </div>
    EOT;
    echo($html);
}