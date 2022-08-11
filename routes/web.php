<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/userhome', function () {
    return view('userhome');
})->middleware(['auth'])->name('userhome');

require __DIR__ . '/auth.php';

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function () {




        //seller Details
    Route::get('seller_registration' , 'SellersDetailsController@index')->name('admin/seller_registration');
    Route::post('seller-registration', 'SellersDetailsController@sellerRegistration')->name('admin/seller-registration');

    //seller plans
    Route::get('plans', 'SellersDetailsController@plan')->name('admin/plans');


    //admin login route
    Route::match(['get', 'post'], 'login', 'AdminController@login')->name('admin/login');

    Route::group(['middleware' => ['admin']], function () {
        //Admin Dashboard Route
        Route::get('dashboard', 'AdminController@dashboard')->name('admin/dashboard');

        //update admin password
        Route::match(['get', 'post'], 'update-admin-password', 'AdminController@updateadminpassword')->name('admin/update-admin-password');

        //Check Admin Password
        Route::post('check-admin-password', 'AdminController@checkAdminPassword');

        //Update Admin Details
        Route::match(['get', 'post'], 'update-admin-details', 'AdminController@updateAdminDetails')->name('admin/update-admin-details');

        //update vendor details
        Route::match(['get', 'post'], 'update_sellers_details/{slug}', 'AdminController@updateSellerDetails');


         //view seller's details by seller
         Route::get('seller_view/{id}' , 'SellersDetailsController@sellerview');

         //update seller's details by seller
         Route::post('seller_view/{id}' , 'SellersDetailsController@sellerupdate');

        //update seller's plan
        Route::get('seller_plan/{id}', 'PlanController@viewplan');

         //update selle's plan
         Route::post('update_plan/{id}', 'PlanController@update_plan');

        //view Admin / Sellers
        Route::get('admins/{type?}', 'AdminController@admins');

        //view seller's details by superadmin
        Route::get('view-seller-details/{id}', 'AdminController@viewSellerDetails')->name('admin/view-seller-details/{id}');

        //update admin status
        Route::post('update-admin-status', 'AdminController@updateAdminStatus');

        //Admin logout
        Route::get('logout', 'AdminController@logout')->name('admin/logout');

        //Section
        Route::get('sections', 'SectionController@sections')->name('admin/sections');

        //update section status
        Route::post('update-section-status', 'SectionController@updateSectionStatus');

        //delete section
        Route::get('delete-section/{id}', 'SectionController@deletesection');

        // add edit section
        Route::match(['get', 'post'], 'add_edit_section/{id?}',  'SectionController@addEditSection');

        Route::get('deleted_sections', 'SectionController@deletedSection');
        Route::get('restore_section/{id}', 'SectionController@restoreSection');

        //categories
        Route::get('categories', 'CategoryController@categories')->name('admin/categories');

        //update section status
        Route::post('update-category-status', 'CategoryController@updateCategoryStatus');

        // add edit section
        Route::match(['get', 'post'], 'add_edit_categories/{id?}',  'CategoryController@addEditCategory');

        //append categoreis level
        Route::get('append-categories-level', 'CategoryController@appendCategoryLevel');


        //delete category
        Route::get('delete-category/{id}', 'CategoryController@deleteCategory');

        //delete category image
        Route::get('delete-category-image/{id}', 'CategoryController@deleteCategoryImage');

        //deleted categories
        Route::get('deleted_categories', 'CategoryController@deletedCategory');
        Route::get('restore_category/{id}', 'CategoryController@restoreCategory');


        //brand
        Route::get('brands', 'BrandController@brands')->name('admin/brands');

        //update brand status
        Route::post('update-brand-status', 'BrandController@updateBrandStatus');

        //delete brand
        Route::get('delete-brand/{id}', 'BrandController@deleteBrand');

        // add edit brand
        Route::match(['get', 'post'], 'add_edit_brand/{id?}',  'BrandController@addEditBrand');

        //append brands level
        Route::get('append-brand-level', 'BrandController@appendBrandLevel');

        Route::get('deleted_brands', 'BrandController@deletedBrands');
        Route::get('restore_brand/{id}', 'BrandController@restoreBrands');


        //Products
        Route::get('products', 'ProductsController@products')->name('admin/products');

        //update products status
        Route::post('update-product-status', 'ProductsController@updateProductStatus');

        //delete products
        Route::get('delete-product/{id}', 'ProductsController@deleteProduct');

        // add edit products
        Route::match(['get', 'post'], 'add_edit_products/{id?}',  'ProductsController@addEditProduct');


        //delete product image
        Route::get('delete-product-image/{id}', 'ProductsController@deleteProductImage');

        //Restore the product
        Route::get('deleted_products', 'ProductsController@deletedProduct');
        Route::get('restore_product/{id}', 'ProductsController@restoreProduct');


        //Product attributes
        Route::match(['get', 'post'], 'add_attributes/{id}', 'ProductsAttributeController@addAttributes');

        //update attributes status
        Route::post('update-attribute-status', 'ProductsAttributeController@updateAttributeStatus');

        //delete attributes
        Route::get('delete-attribute/{id}', 'ProductsAttributeController@deleteAttribute');

        //edit attribute
        Route::match(['get', 'post'], 'edit-attribute/{id}', 'ProductsAttributeController@editAttribute');


        //Add Multiple Product Images
        Route::match(['get', 'post'], 'add_images/{id}', 'ProductsController@addImages');

        //update attributes status
        Route::post('update-image-status', 'ProductsController@updateImageStatus');

        //delete attributes
        Route::get('delete-image/{id}', 'ProductsController@deleteImage');

        //Banners
        Route::get('banners', 'BannerController@banners')->name('admin/banners');

        //update Banner status
        Route::post('update-banner-status', 'BannerController@updateBannerStatus');

        //delete Banner
        Route::get('delete-banner/{id}', 'BannerController@deleteBanner');

        //Restore the Banner
        Route::get('deleted_banners', 'BannerController@deletedBanner');
        Route::get('restore_banner/{id}', 'BannerController@restoreBanner');

        //Add / Edit Banners
        Route::match(['get', 'post'], 'add-edit-banner/{id?}', 'BannerController@addEditBanner');
    });
});


//Frontend

Route::namespace('App\Http\Controllers\Front')->group(function () {

    Route::get('/', 'IndexController@index');

    //View All Catgories
    Route::get('all_categories', 'IndexController@allCategories');

    //section view
    Route::get('collection/{section_url}', 'CollectionController@sectionView');


    //Product controller for listing categories
    // Get all the category url's
    $catUrl = Category::select('category_url')->where('status', '1')->get()->pluck('category_url')->toArray();
    // echo "<pre>" ; print_r($catUrl); die;
    foreach ($catUrl as $url) {
        Route::get('/' . $url, 'ProductsController@listing')->name('listing_products');
    }

    //Product Detail
    Route::get('{product_url}/{id}', 'ProductsController@detail');

    //get product Attribute price
    Route::post('/get-product-price', 'ProductsController@getProductPrice');

    //Add to cart for fashion
    Route::post('/add-to-cart', 'ProductsController@addToCart');

    //Add to cart for other products than fashion
    //Route::post('/add-products-to-cart', 'SecondCartController@addToCart');
    Route::post('/add-products-to-cart', 'ProductsController@add_To_Cart');


    //shopping cart route for fashion
    Route::get('/cart', 'ProductsController@cart');
     //Add to cart for other products than fashion
     //Route::get('/cart', 'SecondCartController@cart');


    //update-cart-item-qty
    Route::post('/update-cart-item-qty', 'ProductsController@updateCartItemQty');

    //delete-cart-item-qty
    Route::post('/delete-cart-item', 'ProductsController@deleteCartItem');
    //    Route::get('/delete-cart-item/{id}' , 'ProductsController@deleteCartItem');

    //User Login
    Route::get('/login', 'UsersController@login')->name('login');

    //User  Register
    Route::get('/register', 'UsersController@Register')->name('register');


    //user login
    Route::post('/login', 'UsersController@loginUser');

    //user register
    Route::post('/register', 'UsersController@registerUser');

    //check if email  already exists
    Route::match(['get', 'post'], '/check-email', 'UsersController@checkEmail');
    //confirm user account
    Route::match(['get , post'], '/confirm/{code}', 'UsersController@confirmAccount');

    //forgot password
    Route::match(['get', 'post'], '/forgot-password', 'UsersController@forgotPassword');

    //user account details
    Route::match(['get', 'post'], '/useraccount', 'UsersController@userAccount');
    //user logout
    Route::get('/logout', 'UsersController@logout')->name('logout');


    //user logout
    // Route::get('logout', 'IndexController@logout')->name('user/logout');
});
