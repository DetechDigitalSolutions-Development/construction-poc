<?php
// config/filament.php

return [
// Other configurations...
    'navigation' => [
// Add 'Attendance Reports' to the navigation
        'items' => [
            [
                'label' => 'Attendance Reports',
                'url' => '/admin/reports',
                'icon' => 'heroicon-o-document',
            ],
        ],
    ],
];
