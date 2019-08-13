<?php // callback.php
require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');
$access_token = 'vdDDbMJrLQHhYxmAWhG9czicHhR1dbHi9mJlTrgoyy7LhWNnQEb6IjoM1RqSEh+qayZNJdHDcBmNuISJtEKFED6JZ6ERFiVWNttbTCRfDxoHbDzpprOQsXPbmk55fdofx0L2YcBBOhJ15KT1l5db1AdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['source']['userId'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			// Build message to reply back
			$messages = [
				'
    "type": "flex",
    "altText": "Flex Message",
    "contents": {
      "type": "carousel",
      "contents": [
        {
          "type": "bubble",
          "hero": {
            "type": "image",
            "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_5_carousel.png",
            "size": "full",
            "aspectRatio": "20:13",
            "aspectMode": "cover"
          },
          "body": {
            "type": "box",
            "layout": "vertical",
            "spacing": "sm",
            "contents": [
              {
                "type": "text",
                "text": "Arm Chair, White",
                "size": "sm",
                "weight": "bold",
                "wrap": true
              },
              {
                "type": "box",
                "layout": "baseline",
                "contents": [
                  {
                    "type": "text",
                    "text": "$49",
                    "flex": 0,
                    "size": "sm"
                  },
                  {
                    "type": "text",
                    "text": ".99",
                    "flex": 0,
                    "size": "sm",
                    "weight": "bold",
                    "wrap": true
                  }
                ]
              }
            ]
          },
          "footer": {
            "type": "box",
            "layout": "vertical",
            "spacing": "sm",
            "contents": [
              {
                "type": "button",
                "action": {
                  "type": "uri",
                  "label": "Add to Cart",
                  "uri": "https://linecorp.com"
                },
                "style": "primary"
              },
              {
                "type": "button",
                "action": {
                  "type": "uri",
                  "label": "Add to whishlist",
                  "uri": "https://linecorp.com"
                }
              }
            ]
          }
        },
        {
          "type": "bubble",
          "hero": {
            "type": "image",
            "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_6_carousel.png",
            "size": "full",
            "aspectRatio": "20:13",
            "aspectMode": "cover"
          },
          "body": {
            "type": "box",
            "layout": "vertical",
            "spacing": "sm",
            "contents": [
              {
                "type": "text",
                "text": "Metal Desk Lamp",
                "size": "xl",
                "weight": "bold",
                "wrap": true
              },
              {
                "type": "box",
                "layout": "baseline",
                "flex": 1,
                "contents": [
                  {
                    "type": "text",
                    "text": "$11",
                    "flex": 0,
                    "size": "xl",
                    "weight": "bold",
                    "wrap": true
                  },
                  {
                    "type": "text",
                    "text": ".99",
                    "flex": 0,
                    "size": "sm",
                    "weight": "bold",
                    "wrap": true
                  }
                ]
              },
              {
                "type": "text",
                "text": "Temporarily out of stock",
                "flex": 0,
                "margin": "md",
                "size": "xxs",
                "color": "#FF5551",
                "wrap": true
              }
            ]
          },
          "footer": {
            "type": "box",
            "layout": "vertical",
            "spacing": "sm",
            "contents": [
              {
                "type": "button",
                "action": {
                  "type": "uri",
                  "label": "Add to Cart",
                  "uri": "https://linecorp.com"
                },
                "flex": 2,
                "color": "#AAAAAA",
                "style": "primary"
              },
              {
                "type": "button",
                "action": {
                  "type": "uri",
                  "label": "Add to wish list",
                  "uri": "https://linecorp.com"
                }
              }
            ]
          }
        },
        {
          "type": "bubble",
          "body": {
            "type": "box",
            "layout": "vertical",
            "spacing": "sm",
            "contents": [
              {
                "type": "button",
                "action": {
                  "type": "uri",
                  "label": "See more",
                  "uri": "https://linecorp.com"
                },
                "flex": 1,
                "gravity": "center"
              }
            ]
          }
        }
      ]
    }'
			];
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			
/*			
//$servername = "61.19.71.179";
//$username = "sso";
//$password = "075271283";
//$dbname = "line";
// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
//if ($conn->connect_error) {
 //   die("Connection failed: " . $conn->connect_error);
//} 
//$sql = "INSERT INTO profile (UID, name)
//VALUES ('".$text."', 'Doe')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
		*/	
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
			echo $result . "\r\n";
		}
	}
}
echo "OK";
