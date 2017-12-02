<?php
include '../database/db_connect.php';
    /* Send an SMS using Twilio. You can run this file 3 different ways:
     *
     * 1. Save it as sendnotifications.php and at the command line, run 
     *         php sendnotifications.php
     *
     * 2. Upload it to a web host and load mywebhost.com/sendnotifications.php 
     *    in a web browser.
     *
     * 3. Download a local server like WAMP, MAMP or XAMPP. Point the web root 
     *    directory to the folder containing this file, and load 
     *    localhost:8888/sendnotifications.php in a web browser.
     */

    // Step 1: Get the Twilio-PHP library from twilio.com/docs/libraries/php, 
    // following the instructions to install it with Composer.
    require_once "../twilio-php-master/Twilio/autoload.php";
    use Twilio\Rest\Client;
    
    // Step 2: set our AccountSid and AuthToken from https://twilio.com/console
    $AccountSid = "AC3cd7b42ad5ddf8bc6047be9cb73184c3";
    $AuthToken = "6e57673394ed8dc91088714442c8720b";

    // Step 3: instantiate a new Twilio Rest Client
    $client = new Client($AccountSid, $AuthToken);


    /*global $conn;
        $find_message = mysqli_query("SELECT * from equpdates");
        while ($row = mysqli_fetch_assoc($find_message))
        {
                      $eqdate = $row["eqdate"];
                      /*$Latitude = $row["Latitude"];
                      $Longitude = $row['Longitude'];
                      $Magnitude = $row['Magnitude'];
                      $Depth = $row['Depth'];
                      $Location = $row['Location'];*/
                  
    // Step 4: make an array of people we know, to send them a message. 
    // Feel free to change/add your own phone number and name here.
    $people = array(
      
        "+639569223310" => "Dominic Fernandez",
        "+639269480362" => "Raymart Zapata",
        "+639268788981" => "Liziel Dugaduga",
        "+639159386707" => "Pebby Claire San Jose"
    );



    // Step 5: Loop over all our friends. $number is a phone number above, and 
    // $name is the name next to it
    foreach ($people as $number => $name) {

        $sms = $client->account->messages->create(

            // the number we are sending to - Any phone number
            $number,

            array(
                // Step 6: Change the 'From' number below to be a valid Twilio number 
                // that you've purchased
                'from' => "(256) 803-1124", 
                
                // the sms body
                'body' => "$name, Your account username is user and your password is 12345."
            )
        );

        // Display a confirmation message on the screen
        //echo "Sent message to $name ; ";
        echo "<script>alert('Message Sent'); window.location.href='sms.php';</script>";
    }