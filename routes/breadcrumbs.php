<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

// Breadcrumbs::for('admin.dashboard.citizen', function (BreadcrumbTrail $trail) {
//     $trail->parent('admin.dashboard');
//     $trail->push('Citizens', route('admin.dashboard.citizen'));
// });

Breadcrumbs::for('Resident', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Resident');
});

Breadcrumbs::for('admin.dashboard.resident.birth', function (BreadcrumbTrail $trail) {
    $trail->parent('Resident');
    $trail->push('Births', route('admin.dashboard.resident.birth'));
});

Breadcrumbs::for('admin.dashboard.resident.birth.show', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.resident.birth');
    $trail->push('Details');
});

Breadcrumbs::for('admin.dashboard.resident.birth.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.resident.birth');
    $trail->push('Create');
});

Breadcrumbs::for('admin.dashboard.resident.birth.create-preview', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.resident.birth');
    $trail->push('Create - Preview');
});

Breadcrumbs::for('admin.dashboard.resident.identity', function (BreadcrumbTrail $trail) {
    $trail->parent('Resident');
    $trail->push('Identity Cards', route('admin.dashboard.resident.identity'));
});

Breadcrumbs::for('admin.dashboard.resident.identity.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.resident.identity');
    $trail->push('Create');
});

Breadcrumbs::for('admin.dashboard.resident.identity.create-preview', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.resident.identity');
    $trail->push('Create - Preview');
});

Breadcrumbs::for('admin.dashboard.resident.identity.show', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.resident.identity');
    $trail->push('Details');
});

Breadcrumbs::for('admin.dashboard.profile', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Profile');
});

// Breadcrumbs::for('admin.dashboard.submission', function (BreadcrumbTrail $trail) {
//     $trail->parent('admin.dashboard');
//     $trail->push('Submissions');
// });