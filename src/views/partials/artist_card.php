<?php
require_once(PROJECT_ROOT_PATH . "/src/models/ArtistModel.class.php");

function artistCard ($id)
{
    $artist_model = new ArtistModel();
    $artist = $artist_model->getArtistByArtistId($id);
    $artist_name = $artist->name;
    $image_url = $artist->image_url;
    $value = $artist->id_artist;
    $button = $_SESSION["role"] == "admin" ? "<div class='edit-artist edit-btn'></div>" : null;
    $premium = $artist->premium == '1' && $_SESSION["role"] != "admin" ? "<br><div class='premium-artist'></div>" : null;
    $html = <<< "EOT"
    <div class="artist-card" value="$value">
        <div class="img-container">
            <img src="$image_url"  alt="Not Found!" onerror="this.src='/image/none.jpg'"/>
        </div>
        <p class="artist-name">$artist_name</p>
        <p class="card-type">Artist</p>
        $button
        $premium
    </div> 
    EOT;

    return $html;

}