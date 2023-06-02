<?php

namespace DiDemo;

use PDO;
use DiDemo\Mailer\SmtpMailer;

/**
 * OMG, I'm a service... because I perform an action (send great opportunities to friends)
 */
class FriendHarvester
{
    public function __construct(private PDO $pdo)
    {
    }

    public function emailFriends(): void
    {
        $mailer = new SmtpMailer('smtp.SendMoneyToStrangers.com', 'smtpuser', 'smtppass', '465');

        $sql = 'SELECT * FROM people_to_spam';
        foreach ($this->pdo->query($sql) as $row) {
            $mailer->sendMessage(
                $row['email'],
                'Yay! We want to send you money for no reason!',
                sprintf(<<<EOF
        Hi %s! We've decided that we want to send you money for no reason!

        Please forward us all your personal information so we can make a deposit and don't ask any questions!
        EOF
                , $row['name']),
                'YourTrustedFriend@SendMoneyToStrangers.com'
            );
        }
    }
}
