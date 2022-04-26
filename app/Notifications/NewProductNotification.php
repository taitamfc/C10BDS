<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class NewProductNotification extends Notification
{
    
    public function __construct($product)
    {
        $this->product = $product;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'name' => $this->product->name,
            'branch_id' => $this->product->branch_id,
        ];
    }
}
