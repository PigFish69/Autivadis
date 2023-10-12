    <?php

    use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\SMTP;
    // use PHPMailer\PHPMailer\Exception;


    function sendMail($activityId)
    {
        $user = new user(getUserById($_COOKIE['CurrUser']));
        $activity = new activity(getActivityById($activityId));

        require '../../vendor/autoload.php';

        // Initialize PHPMailer
        $mail = new PHPMailer(true);

        // Event details
        $eventTitle = $activity->getName();
        $eventDescription = $activity->getDescription();
        $eventLocation = $activity->getLocation();
        $eventStartDateTime =
            $activity->getStartTime();; // Replace with your event's start date and time
        $eventEndDateTime =
            $activity->getEndTime();;   // Replace with your event's end date and time

        // Generate the ICS content with updated event details
        $ics = "BEGIN:VCALENDAR
VERSION:2.0
BEGIN:VEVENT
DTSTAMP:" . date('Ymd') . 'T' . date('His') . "Z
DTSTART:" . date('Ymd', strtotime($eventStartDateTime)) . 'T' . date('His', strtotime($eventStartDateTime)) . "Z
DTEND:" . date('Ymd', strtotime($eventEndDateTime)) . 'T' . date('His', strtotime($eventEndDateTime)) . "Z
SUMMARY:$eventTitle
DESCRIPTION:$eventDescription
LOCATION:$eventLocation
END:VEVENT
END:VCALENDAR";

        // Directory where the ICS file will be saved
        $icsDirectory = 'ics';

        // Ensure the directory exists, or create it if it doesn't
        if (!is_dir($icsDirectory)) {
            mkdir($icsDirectory, 0755, true);
        }

        // Specify a fixed filename for the ICS file
        $icsFileName = $icsDirectory . '/event.ics';

        // Save the ICS content to the file
        file_put_contents($icsFileName, $ics);

        // Determine the URL for the ICS file on localhost
        $baseUrl = 'http://127.0.0.1/Autivadis/hyb/Actievadis';  // Replace with your website's base URL
        $icsUrl = $baseUrl . '/' . basename(__FILE__) . '/' . $icsFileName;

        // Recipient's email address
        $to = $user->getEmail(); // Replace with the recipient's Outlook email

        // Email subject
        $subject = "Voeg activiteit toe aan kalender";

        // Sender's Outlook email address
        $fromEmail = 'ricksschooltesting@outlook.com'; // Replace with your Outlook email address
        $fromPassword = 'Testerinio'; // Replace with your Outlook password

        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com'; // Outlook SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = $fromEmail; // Your Outlook email address
        $mail->Password = $fromPassword; // Your Outlook password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use STARTTLS
        $mail->Port = 587;

        // Compose the email message
        $message = "Klik op de link hier onder om deze activiteit toe tevoegen aan uw kalender:<br>";
        $message .= '<a href="' . $icsUrl . '">Voeg toe aan kalender</a>';

        // Set the "From" email address
        $mail->setFrom($fromEmail, 'Autivadis');

        // Add the recipient
        $mail->addAddress($to);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Attach the ICS file
        $mail->addAttachment($icsFileName);

        // Send the email
        if ($mail->send()) {
            echo "Er is een email naar u verstuurd met een bevesteging voor de activiteit";
        } else {
            echo "Email kon niet worden verstuurd. Error: " . $mail->ErrorInfo;
        }
    }
    ?>
    </body>

    </html>