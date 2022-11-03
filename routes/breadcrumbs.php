<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

Breadcrumbs::for('admin.dashboard.citizen', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Citizens', route('admin.dashboard.citizen'));
});

Breadcrumbs::for('admin.dashboard.citizen.show', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.citizen');
    $trail->push('Details');
});

Breadcrumbs::for('admin.dashboard.profile', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Profile', route('admin.dashboard.profile'));
});