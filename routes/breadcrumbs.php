<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin-dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('ADMIN-DASHBOARD', route('admin-dashboard'));
}); 

// categories routes
Breadcrumbs::for('categories', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-dashboard');
    $trail->push('CATEGORIES', route('product-categories'));
});
Breadcrumbs::for('categories-add', function (BreadcrumbTrail $trail,$slug) {
    $trail->parent('categories');
    $trail->push('ADD', route('categories-add',['slug'=>$slug]));
});

// subscriptions
Breadcrumbs::for('subscription-options', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-dashboard');
    $trail->push('SUBSCRIPTION-PLANS', route('subscription-options'));
});

// blogs
Breadcrumbs::for('blogs-list', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-dashboard');
    $trail->push('BLOGS', route('blogs-list'));
});
Breadcrumbs::for('blogs-add', function (BreadcrumbTrail $trail,$slug) {
    $trail->parent('blogs-list');
    $trail->push('ADD', route('add-blogs',['slug'=>$slug]));
});
Breadcrumbs::for('blogs-categories', function (BreadcrumbTrail $trail) {
    $trail->parent('blogs-list');
    $trail->push('CATEGORIES', route('blogs-categories'));
});

///Products
Breadcrumbs::for('products', function (BreadcrumbTrail $trail) {
    $trail->parent('admin-dashboard');
    $trail->push('PRODUCTS', route('products'));
});
Breadcrumbs::for('add-products', function (BreadcrumbTrail $trail) {
    $trail->parent('products');
    $trail->push('ADD', route('add-products'));
});
Breadcrumbs::for('edit-products',function (BreadcrumbTrail $trail,$slug) {
    $trail->parent('products');
    $trail->push('EDIT',route('edit-products',['slug'=>$slug]));
});

//Sitemeta details
Breadcrumbs::for('site-detail',function (BreadcrumbTrail $trail) {
    $trail->parent('admin-dashboard');
    $trail->push('SITE-DETAIL',route('site-detail'));
});

Breadcrumbs::for('ourstory',function (BreadcrumbTrail $trail) {
    $trail->parent('site-detail');
    $trail->push('OURSTORY-PAGE',route('ourstory'));
});
Breadcrumbs::for('faqs',function (BreadcrumbTrail $trail,$slug) {
    $trail->parent('site-detail');
    $trail->push('FAQS',route('faqs',['slug'=>$slug]));
});

//Orders
Breadcrumbs::for('orders',function (BreadcrumbTrail $trail){
    $trail->parent('admin-dashboard');
    $trail->push('ORDERS',route('orders'));
});
Breadcrumbs::for('orders-detail',function (BreadcrumbTrail $trail,$slug) {
    $trail->parent('orders');
    $trail->push($slug,route('orders-detail',['slug'=>$slug]));
});

///recurring orders

Breadcrumbs::for('recurringorders',function (BreadcrumbTrail $trail) {
    $trail->parent('admin-dashboard');
    $trail->push('SUBSCRIPTIONS',route('recurringorders'));
});
Breadcrumbs::for('subscription-detail',function (BreadcrumbTrail $trail,$subcription_id) {
    $trail->parent('recurringorders');
    $trail->push($subcription_id,route('subscription-detail',['subcription_id'=>$subcription_id]));
});

//Payments

Breadcrumbs::for('payments',function (BreadcrumbTrail $trail) {
    $trail->parent('admin-dashboard');
    $trail->push('PAYMENTS',route('payments'));
});

///users

Breadcrumbs::for('users',function (BreadcrumbTrail $trail) {
    $trail->parent('admin-dashboard');
    $trail->push('USERS-LIST',route('users'));
});
 
//reviews
Breadcrumbs::for('reviews',function (BreadcrumbTrail $trail) {
    $trail->parent('admin-dashboard');
    $trail->push('REVIEWS',route('reviews'));
});
Breadcrumbs::for('add-reviews',function(BreadcrumbTrail $trail,$slug) {
    $trail->parent('reviews');
    $trail->push('ADD',route('add-reviews',['slug'=>$slug]));
});
Breadcrumbs::for('reviews-category',function(BreadcrumbTrail $trail) {
    $trail->parent('reviews');
    $trail->push('CATEGORIES',route('reviews-category'));
});

//account-setting

Breadcrumbs::for('account-setting',function(BreadcrumbTrail $trail) {
    $trail->parent('admin-dashboard');
    $trail->push('ACCOUNT-SETTING',route('account-setting'));
});

//contactus
Breadcrumbs::for('contact-us',function(BreadcrumbTrail $trail){
    $trail->parent('admin-dashboard');
    $trail->push('CONTACT-US',route('contact-us'));
});


?>