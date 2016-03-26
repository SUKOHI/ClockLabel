# ClockLabel
Laravel package to manage clock labels like `This Month` and so on.  
This package used to be called TimeLabel that gave us errors after using `composer require` command.

# Installation

Execute composer command.

    composer require sukohi/clock-label:2.*

Set the service provider in app.php

    'providers' => [
        ...Others...,  
        Sukohi\ClockLabel\ClockLabelServiceProvider::class,
    ]

Also alias

    'aliases' => [
        ...Others...,  
        'ClockLabel'   => Sukohi\ClockLabel\Facades\ClockLabel::class
    ]

# Usage

    $clock_label = ClockLabel::setLabel([
        'today' => 'Today',
        'yesterday' => 'Yesterday',
        'this_month' => 'This Month',
        'last_month' => 'Last Month',
        'other' => 'M, Y'   // You need to set date format only here.
    ]);
    $date_clocks = [
        Carbon::now(),
        Carbon::now(),
        Carbon::now()->subDay(),
        Carbon::now()->subDay(),
        Carbon::now()->subDays(2),
        Carbon::now()->subDays(4),
        Carbon::now()->subDays(4),
        Carbon::now()->subDays(5),
        Carbon::now()->subDays(10),
        Carbon::now()->subDays(20),
        Carbon::now()->subDays(50),
        Carbon::now()->subDays(150),
    ];

    foreach($date_clocks as $dt) {

        if($clock_label->isFirst($dt)) {

            echo $clock_label->get($dt) .'<br>';

        }

        echo $dt .'<hr>';

    }

# License

This package is licensed under the MIT License.
Copyright 2016 Sukohi Kuhoh