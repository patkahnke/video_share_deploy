<?php

/**
 * @file
 * Contains \Drupal\proof_api\ProofAPIRequests\ProofAPIRequests.
 */

namespace Drupal\proof_api\ProofAPIRequests;

/**
 * Implements CRUD requests on the Proof API.
 */
class ProofAPIRequests
{
  /**
   * Performs a get request for all video resources and related resources from the Proof API.
   * @param $authKey
   * @return mixed
   */
  public function getAllVideos($authKey)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://proofapi.herokuapp.com/videos?page&per_page');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      "X-Auth-Token: " . $authKey
    ));

    $response = curl_exec($ch);
    curl_close($ch);

    $json = json_decode($response, true);
    $response = $json['data'];

    return $response;
  }

  /**
   * Performs a post request for a new video resource to the Proof API.
   * @param $title
   * @param $url
   * @param $slug
   * @param $authKey
   */
  public function postNewMovie($title, $url, $slug, $authKey)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://proofapi.herokuapp.com/videos");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);

    curl_setopt($ch, CURLOPT_POST, TRUE);

    curl_setopt($ch, CURLOPT_POSTFIELDS, "{
            \"title\": \"{$title}\",
            \"url\": \"{$url}\",
            \"slug\": \"{$slug}\"
        }");

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      "Content-Type: application/json",
      "X-Auth-Token: " . $authKey
    ));

    curl_exec($ch);
    curl_close($ch);
  }

  /**
   * Performs a post request for a new positive vote related to a specific video resource from the Proof API.
   * @param $authKey
   * @param $videoID
   */
  public function postNewVoteUp($videoID, $authKey)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://proofapi.herokuapp.com/videos/{$videoID}/votes");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);

    curl_setopt($ch, CURLOPT_POST, TRUE);

    curl_setopt($ch, CURLOPT_POSTFIELDS, "{
        \"opinion\": 1
        }");

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      "Content-Type: application/json",
      "X-Auth-Token: " . $authKey
    ));

    curl_exec($ch);
    curl_close($ch);
  }

  /**
   * Performs a post request for a new negative vote related to a specific video resource from the Proof API.
   * @param $authKey
   * @param $videoID
   */
  public function postNewVoteDown($videoID, $authKey)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://proofapi.herokuapp.com/videos/{$videoID}/votes");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);

    curl_setopt($ch, CURLOPT_POST, TRUE);

    curl_setopt($ch, CURLOPT_POSTFIELDS, "{
        \"opinion\": -1
        }");

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      "Content-Type: application/json",
      "X-Auth-Token: " . $authKey
    ));

    curl_exec($ch);
    curl_close($ch);
  }

  /**
   * Performs a post request for a new view related to a specific video resource from the Proof API.
   * @param $authKey
   * @param $videoID
   */
  public function postNewView($videoID, $authKey)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://proofapi.herokuapp.com/views");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);

    curl_setopt($ch, CURLOPT_POST, TRUE);

    curl_setopt($ch, CURLOPT_POSTFIELDS, "{
        \"video_id\": \"$videoID\"
        }");

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      "Content-Type: application/json",
      "X-Auth-Token: " . $authKey
    ));

    curl_exec($ch);
    curl_close($ch);
  }

  /**
   * Performs a get request for a specific video resource from the Proof API.
   * @param $videoID
   * @param $authKey
   * @return mixed
   */
  public function getVideo($videoID, $authKey)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://proofapi.herokuapp.com/videos/{$videoID}");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      "Content-Type: application/json",
      "X-Auth-Token: " . $authKey
    ));

    $response = curl_exec($ch);
    curl_close($ch);

    $json = json_decode($response, true);
    $response = $json['data'];

    return $response;
  }
}
