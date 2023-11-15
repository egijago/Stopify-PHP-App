<?php
require_once(PROJECT_ROOT_PATH . "/src/models/MusicModel.class.php");
require_once(PROJECT_ROOT_PATH . "/src/models/LikesModel.class.php");
require_once(PROJECT_ROOT_PATH . "/src/models/Subscription.class.php");
require_once(PROJECT_ROOT_PATH . "/src/views/partials/pagination_item.php");
require_once(PROJECT_ROOT_PATH . "/src/views/partials/icon.php");
require_once(PROJECT_ROOT_PATH . "/src/views/partials/limit_page.php");

function musicDetail($params)
{
    $music_id = $params["music_id"];

    $albumModel = new MusicModel();
    $musicDetail = $albumModel->getDetailMusic($music_id);

    $likesModel = new LikesModel();
    $liked = $likesModel->checkLikes($_SESSION["id_user"], $music_id) ? true : false;

    $html = icon($_SESSION["username"]);
    $html .= ' <input type="hidden" id="id_user" name="id_user" value="'.$_SESSION["id_user"].'">';
    $html .= '<h1 style="margin-top: 5vw;">Good morning, ' . $_SESSION["username"] . '</h1>';
    $html .= songDetail($musicDetail->image_url, $musicDetail->album_title, $musicDetail->music_title, $musicDetail->genre_name, $musicDetail->artist_name, $liked);
    $html .= songPlayer($musicDetail->audio_url);

    if($musicDetail->premium == '1'){
        $subscriptionModel = new SubscriptionModel();
        $subscription = $subscriptionModel->getSubscriptionbyIdUserAndIdArtist($_SESSION["id_user"], $musicDetail->id_artist);
        if(!$subscription){
            $htmlSubscription = ' <input type="hidden" id="id_user" name="id_user" value="'.$_SESSION["id_user"].'">';
            $htmlSubscription .= "
                <div class='subscription-container'>
                    <h3>Subscribe to this artist to listen to this song</h3>
                    <button class='subscription-button' id='subscribeButton' onclick='handleSubscribe()'>Subscribe</button>
                </div>
            ";
            echo $htmlSubscription;
            return;
        }
        if($subscription->status == 'CONFIRM'){
            echo $html;
            return;
        }
        else if($subscription->status == 'REJECT'){
            echo '<p> you cant subscrib this artist<p/>';
        }
        else
        {
            echo '<p> wait to confirm<p/>';
        }
    }
    else{
        echo $html;
    }
}

function songDetail($img_url, $album, $title, $genre, $artist, $liked)
{
    $likedStatus = $liked ? "Unlike" : 'Like';

    $html = "
        <div class='play-song-container'>
            <img src='$img_url'  alt='Not Found!' onerror='this.src=\"/image/none.jpg\"'>
            <div class='play-song-detail'>
                <h3>$album</h3>
                <h4>$title</h4>
                <br>
                <p>$genre</p>
                <p>$artist</p>
                <button class='love-button' id='likeButton' onclick='handleLoveButtonClick()'>$likedStatus ❤️</button>
            </div>
        </div>
    ";

    return $html;
}

function songPlayer($audio_url)
{   
    $ext = pathinfo($audio_url, PATHINFO_EXTENSION);
    $html = <<<EOT
        <div class='audio-player'>
            <audio controls>
                <source src="$audio_url" type="audio/$ext">
            </audio>
        </div>
    EOT;
    return $html;
}

