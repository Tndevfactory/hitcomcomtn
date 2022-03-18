<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\VerifyController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ResetPasswordController;
use Symfony\Component\Console\Output\StreamOutput;

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

    Route::Redirect('/', '/fr');

    Route::group(['prefix'=>'{language}'], function(){ 

    //currency zone
    Route::get('/c', [CurrencyController::class, "changeCurrency"])->name('change-currency');

    Route::get('/t', [ThemeController::class, "SelectTheme"])->name('change-theme');

    //home zone
    Route::get('/', [HomeController::class, "home"])->name('home');
    Route::get('/about-us', [HomeController::class, "aboutUs"])->name('about-us');
    Route::get('/contact-us', [HomeController::class, "contactUs"])->name('contact-us');
    Route::get('/seller-application', [HomeController::class, "sellerApplication"])->name('seller-application');
    
    //login zone
    Route::get('/login-form', [LoginController::class, 'loginFormDisplay'])->middleware('xguest')->name('login');
    Route::post('/login', [LoginController::class, 'authLogin'])->name('auth-login');
    Route::get('/register-form', [LoginController::class, 'registerFormDisplay'])->middleware('xguest')->name('register-form');
    Route::post('/register', [LoginController::class, 'authRegister'])->name('auth-register');
    Route::get('/logout', [LoginController::class, 'authLogout'])->name('auth-logout');


    //password reset zone
    Route::get('/forgot-password', [ResetPasswordController::class, "passwordEmailForm"])->name('password.email.form');
    // send reset link to mail recepient
    Route::post('/forgot-password', [ResetPasswordController::class, "passwordResetLink"])->name('password.reset.link');
    // generating reset form view when click reset link from mail recipient
    Route::get('/reset-password', [ResetPasswordController::class, "passwordResetForm"])->name('password.reset.form');
    // reset password finaly in db
    Route::post('/reset-password', [ResetPasswordController::class, "passwordUpdate"])->name('password.update');


    //verification zone
    Route::get('/verification-form', [VerifyController::class, "verifyEmailView"])->middleware('xauth')->name('verification-form');
    // if user delete the first mail notice
    Route::post('/verification-resend-link', [VerifyController::class, "verifyEmailLink"])->middleware(['xauth', 'throttle:6,1'])->name('verification-resend');
    // handle request after click email link , 'signed'
    Route::get('/verification-callback', [VerifyController::class, "handleVerifyCallback"])->middleware(['xauth'])->name('verification-callback');
        
    // admin zone --------------------------------------
    Route::prefix('admin')->middleware(['xauth', 'admin.role', 'account.verify'])->group(function(){

        // stock area--------------------------------------
        Route::get('/stock-list/{id?}',[AdminController::class, "adminStockList"])->name('admin-stock-list');
        Route::get('/stock-add/{id?}',[AdminController::class, "adminAddstock"])->name('admin-stock-add');

        // categories area--------------------------------------
        Route::get('/categories-list/{id?}',[AdminController::class, "adminCategoriesList"])->name('admin-categories-list');
        Route::get('/category-add/{id?}',[AdminController::class, "adminAddCategory"])->name('admin-category-add');

        // subcategories area--------------------------------------
        Route::get('/subcategories-list/{id?}',[AdminController::class, "adminSubcategoriesList"])->name('admin-subcategories-list');
        Route::get('/subcategory-add/{id?}',[AdminController::class, "adminAddSubcategory"])->name('admin-subcategory-add');

         // users area--------------------------------------
        Route::get('/users-list/{id?}',[AdminController::class, "adminManageUsers"])->name('admin-users-list');
        Route::get('/user-add/{id?}',[AdminController::class, "adminAddUser"])->name('admin-user-add');

         // shops area--------------------------------------
        Route::get('/shops-list/{id?}',[AdminController::class, "adminManageShops"])->name('admin-shops-list');
        Route::get('/shop-add/{id?}',[AdminController::class, "adminShopAdd"])->name('admin-shop-add');

         // products area--------------------------------------
        Route::get('/products-list/{id?}',[AdminController::class, "adminManageProducts"])->name('admin-products-list');
        Route::get('/product-add/{id?}',[AdminController::class, "adminAddProduct"])->name('admin-product-add');

        // commercials compaigns area--------------------------------------
        Route::get('/compaigns-list/{id?}',[AdminController::class, "adminManageCompaigns"])->name('admin-compaigns-list');

        // orders area--------------------------------------
        Route::get('/orders-list/{id?}',[AdminController::class, "adminManageOrders"])->name('admin-orders-list');

        // coupons area--------------------------------------
        Route::get('/coupons-list/{id?}',[AdminController::class, "adminManageCoupons"])->name('admin-coupons-list');
        Route::get('/coupon-add/{id?}',[AdminController::class, "adminAddCoupon"])->name('admin-coupon-add');

        // taxes area--------------------------------------
        Route::get('/taxes-list/{id?}',[AdminController::class, "adminManageTaxes"])->name('admin-taxes-list');
        Route::get('/tax-add/{id?}',[AdminController::class, "adminAddTax"])->name('admin-tax-add');

        // analytics area--------------------------------------
        Route::get('/analytics-list/{id?}',[AdminController::class, "adminManageAnalytics"])->name('admin-analytics-list');
        

        // notifications area- for admin -------------------------------------
        Route::get('/notification-list/{id?}',[AdminController::class, "adminManageNotifications"])->name('admin-notifications-list');
        Route::get('/notification-form/{id?}',[AdminController::class, "adminNotificationForm"])->name('admin-notification-form');
        Route::post('/notification-send/{id?}',[AdminController::class, "adminNotificationSend"])->name('admin-notification-send');

        // admin profile area--------------------------------------
        Route::get('/manage-profile/{id?}',[AdminController::class, "adminManageProfile"])->name('admin-manage-profile');
       
    });// end admin zone--------------------------------------


    // manager zone-------------------------------------- 
    Route::prefix('manager')->middleware(['xauth', 'manager.role', 'account.verify'])->group(function(){
        Route::get('/profile/{id?}',[ManagerController::class, "managerProfile"])->name('manager-profile');

    });// end manager zone--------------------------------------


    // shop zone-------------------------------------- 
    Route::prefix('seller')->middleware(['xauth', 'seller.role', 'account.verify'])->group(function(){
        Route::get('/profile/{id?}',[ShopController::class, "sellerProfile"])->name('seller-profile');

    });// end shop zone--------------------------------------


    // client zone-------------------------------------- 
    Route::prefix('client')->middleware(['xauth', 'client.role', 'account.verify'])->group(function(){

        Route::get('/profile/{id?}',[ClientController::class, "clientProfile"])->name('client-profile');
        // notifications area- for client -------------------------------------
        Route::get('/notification-list/{id?}',[ClientController::class, "clientManageNotifications"])->name('client-notifications-list');
        Route::get('/notification-form/{id?}',[ClientController::class, "clientNotificationForm"])->name('client-notification-form');
        Route::post('/notification-send/{id?}',[ClientController::class, "clientNotificationSend"])->name('cluent-notification-send');

    });// end client zone--------------------------------------


    
    // Cart  zone- front------------------------------------- 
    Route::get('/add-to-cart',[CartController::class, "addToCart"])->name('add-to-cart');
    Route::get('/show-cart',[CartController::class, "showCart"])->name('show-cart');
    Route::get('/clear-all-cart-items',[CartController::class, "clearAllCartItems"])->name('clear-all-cart-items');
    Route::get('/update-cart-quantity-item',[CartController::class, "updateCartItemQty"])->name('update-cart-quantity-item');
    Route::get('/delete-cart-item',[CartController::class, "deleteCartItem"])->name('delete-cart-item');
    
    // checkout  zone- front---paiement---------------------------------- 
    Route::get('/checkout-order-invoice',[CheckoutController::class, "viewOrderInvoice"])->name('view-order-invoice');


    // wishlist zone-------------------------------------- 
    Route::get('/add-to-wishlist',[WishlistController::class, "addToWishlist"])->name('add-to-wishlist');
    Route::get('/show-whishlist',[WishlistController::class, "showWishlist"])->name('show-wishlist');

    
    //products zone--front-------------------------------------
    Route::get('/product/{slug?}',[ProductController::class, "showProduct"])->name('show-product');


    //categories  zone---front ------------------------------------
    Route::get('/category/{slug?}',[CategoryController::class, "showCategory"])->name('show-category');
    Route::get('/filter-category/{slug?}',[CategoryController::class, "filterCategory"])->name('filter-category');

   
    //subcategories  zone---front ------------------------------------
    Route::get('/subcategory/{slug?}',[SubcategoryController::class, "showSubcategory"])->name('show-subcategory');
   

    //search zone- front -------------------------------------
    Route::get('/search',[SearchController::class, "searchQuery"])->name('search-query');
   
    //seller zone- front -------------------------------------
    Route::get('/show-seller',[ShopController::class, "showSeller"])->name('show-seller');
   


    // ----------------------------------------------------------------------------
    // maintenance zone

			Route::get('/php-info', function() {

				return view('php-info');
			});

			Route::get('/route-cache', function() {
                $stream = fopen("php://output", "w");
                Artisan::call('route:cache', [
                    // '--path' => 'database/migrations/customer',
                    // '--force' => true,
                    // '--database' => $connectionName
                ], new StreamOutput($stream));

                $callResponse = ob_get_clean();

				return "<h1>response artisan:   $callResponse  </h1>";
			});

			Route::get('/config-cache', function() {
                $stream = fopen("php://output", "w");
                Artisan::call('config:cache', [
                    // '--path' => 'database/migrations/customer',
                    // '--force' => true,
                    // '--database' => $connectionName
                ], new StreamOutput($stream));

                $callResponse = ob_get_clean();

				return "<h1>response artisan:   $callResponse  </h1>";
			});

			Route::get('/optimize', function() {
                $stream = fopen("php://output", "w");
                Artisan::call('optimize', [
                    // '--path' => 'database/migrations/customer',
                    // '--force' => true,
                    // '--database' => $connectionName
                ], new StreamOutput($stream));

                $callResponse = ob_get_clean();

				return "<h1>response artisan:   $callResponse  </h1>";
			});
            
			Route::get('/migrate', function() {
                $stream = fopen("php://output", "w");
                Artisan::call('migrate', [
                    // '--path' => 'database/migrations/customer',
                    // '--force' => true,
                    // '--database' => $connectionName
                ], new StreamOutput($stream));

                $callResponse = ob_get_clean();

				return "<h1>response artisan:   $callResponse  </h1>";
			});

			Route::get('/storage-link', function() {
                $stream = fopen("php://output", "w");
                Artisan::call('storage:link', [
                    // '--path' => 'database/migrations/customer',
                    // '--force' => true,
                    // '--database' => $connectionName
                ], new StreamOutput($stream));

                $callResponse = ob_get_clean();

				return "<h1>response artisan:   $callResponse  </h1>";
			});

			Route::get('/cache-clear', function() {
                $stream = fopen("php://output", "w");
                Artisan::call('cache:clear', [
                    // '--path' => 'database/migrations/customer',
                    // '--force' => true,
                    // '--database' => $connectionName
                ], new StreamOutput($stream));

                $callResponse = ob_get_clean();

				return "<h1>Cache cleared ,   $callResponse  </h1>";
			});
			Route::get('/config-clear', function() {
                $stream = fopen("php://output", "w");
                Artisan::call('config:clear', [
                    // '--path' => 'database/migrations/customer',
                    // '--force' => true,
                    // '--database' => $connectionName
                ], new StreamOutput($stream));

                $callResponse = ob_get_clean();

				return "<h1>Cache cleared ,   $callResponse  </h1>";
			});
			Route::get('/view-clear', function() {
                $stream = fopen("php://output", "w");
                Artisan::call('view:clear', [
                    // '--path' => 'database/migrations/customer',
                    // '--force' => true,
                    // '--database' => $connectionName
                ], new StreamOutput($stream));

                $callResponse = ob_get_clean();

				return "<h1>Cache cleared ,   $callResponse  </h1>";
			});
			Route::get('/route-clear', function() {
                $stream = fopen("php://output", "w");
                Artisan::call('route:clear', [
                    // '--path' => 'database/migrations/customer',
                    // '--force' => true,
                    // '--database' => $connectionName
                ], new StreamOutput($stream));

                $callResponse = ob_get_clean();

				return "<h1>Cache cleared ,   $callResponse  </h1>";
			});

			Route::get('/composer-update', function() {
                $stream = fopen("php://output", "w");
                Artisan::call('composer update', [
                    // '--path' => 'database/migrations/customer',
                    // '--force' => true,
                    // '--database' => $connectionName
                ], new StreamOutput($stream));

                $callResponse = ob_get_clean();

				return "<h1>Cache cleared ,   $callResponse  </h1>";
			});

			Route::get('/queue-monitor', function() {
                $stream = fopen("php://output", "w");
                Artisan::call('queue:monitor database:default', [
                    // '--connection' => 'database',
                    //  '--queue' => 'default',
                    // '--database' => $connectionName
                ], new StreamOutput($stream));

                $callResponse = ob_get_clean();

				return "<h5>$callResponse</h5>";
			});

			Route::get('/queue-listen', function() {
                $stream = fopen("php://output", "w");
                Artisan::call('queue:listen', [
                    // '--connection' => 'database',
                    //  '--queue' => 'default',
                    // '--database' => $connectionName
                ], new StreamOutput($stream));

                $callResponse = ob_get_clean();

				return "<h5>$callResponse</h5>";
			});

            Route::get('/queue-clear', function() {
                $stream = fopen("php://output", "w");
                Artisan::call('queue:clear', [
                    // '--connection' => 'database',
                    //  '--queue' => 'default',
                    // '--database' => $connectionName
                ], new StreamOutput($stream));

                $callResponse = ob_get_clean();

				return "<h5>$callResponse</h5>";
			});



}); // end group lang prefix 


