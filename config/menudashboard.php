<?php
return [
    [
        'label' => 'Dashboard',
        'route' => 'dashboard',
        'icon' => 'zmdi zmdi-home'
    ],
    [
        'label' => 'Loại sản phẩm',
        'route' => 'dashboard.categories',
        'icon'  => 'zmdi zmdi-apps'
    ],
    [
        'label' => 'Danh sách sản phẩm',
        'route' => 'dashboard.products',
        'icon' => 'zmdi zmdi-layers'
    ],
    [
        'label' => 'Đơn hàng',
        'route' => 'dashboard.orders',
        'icon' => 'zmdi zmdi-shopping-cart',
        'items' => [
            [
                'label' => 'Đơn hàng',
                'route' => 'dashboard.comments',
                'icon' => 'zmdi zmdi-layers',
            ]
        ]
    ],
    [
        'label' => 'Danh sách bình luận',
        'route' => 'dashboard.comments',
        'icon' => 'zmdi zmdi-comment-alt-text'
    ],
];
