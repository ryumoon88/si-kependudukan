<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admins.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admins.dashboard'));
});

Breadcrumbs::for('admins.citizens', function (BreadcrumbTrail $trail) {
    $trail->parent('admins.dashboard');
    $trail->push('Citizens', route('admins.citizens'));
});
