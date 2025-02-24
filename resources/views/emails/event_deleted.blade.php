<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Canceled</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #374151;
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #e5e7eb;
            margin-bottom: 24px;
        }

        .title {
            color: #111827;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .event-details {
            background-color: #f9fafb;
            border-radius: 6px;
            padding: 16px;
            margin: 20px 0;
        }

        .event-title {
            color: #111827;
            font-weight: 600;
        }

        .message {
            margin: 24px 0;
            color: #4b5563;
        }

        .footer {
            text-align: center;
            padding-top: 24px;
            border-top: 1px solid #e5e7eb;
            color: #6b7280;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1 class="title">Event Cancellation Notice</h1>
        </div>

        <p>Dear Participant,</p>

        <div class="event-details">
            <p class="event-title">We regret to inform you that the event <strong>{{ $event->title }}</strong> scheduled for {{ $event->date_heure }} has been canceled.</p>
        </div>

        <p>We apologize for any inconvenience.</p>

        <div class="footer">
            <p>Best Regards,<br>Event Management Team</p>
        </div>
    </div>
</body>

</html>