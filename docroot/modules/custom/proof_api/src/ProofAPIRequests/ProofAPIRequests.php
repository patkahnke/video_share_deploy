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
  public function getCurl($authKey, $route)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://proofapi.herokuapp.com/" . $route);
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

  public function postCurl($authKey, $routeID, $postDataKey1, $postDataValue1, $postDataKey2,
                           $postDataValue2, $postDataKey3, $postDataValue3)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://proofapi.herokuapp.com/" . $routeID);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "{
        \"$postDataKey1\": \"$postDataValue1\",
        \"$postDataKey2\": \"$postDataValue2\",
        \"$postDataKey3\": \"$postDataValue3\"
        }");

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      "Content-Type: application/json",
      "X-Auth-Token: " . $authKey
    ));

    curl_exec($ch);
    curl_close($ch);
  }


}
