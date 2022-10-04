<?php
    require '../vendor/autoload.php';
    use \Mailjet\Resources;

    $apikey = "04c352a0963e97afada9af0c1ac27ece";
    $seckey = "b396362d6bf20809afe7852205a865b8";
    
    $mj = new \Mailjet\Client($apikey,$seckey,true,['version' => 'v3.1']);

    $emailAddress = $_GET['emailaddress'];
    $emailName = $_GET['fullname'];
    $emailMessage = $_GET['message'];

    $body = [
        'Messages' => [
        [
            'From' => [
            'Email' => "xancave123@gmail.com",
            'Name' => "CHEDROXI"
            ],
            'To' => [
            [
                'Email' => $emailAddress,
                'Name' => $emailName
            ]
            ],
            'Subject' => "CAV Application Status",
            'TextPart' => $emailMessage
        ]
        ]
    ];
    try {
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success() && var_dump($response->getData());
        header('location:../pages/admin/index.php');
    } catch(exception $e) {
        echo $e;
    }


?>
