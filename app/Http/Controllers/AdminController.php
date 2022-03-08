<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\MessageNotification;

class AdminController extends Controller
{

    // admin for listing and button add and profile admin // other mecanics in appropriate controller

     // stock area--------------------------------------
     
     public function adminStockList(Request $request){


        $permission = Permission::where('name', 'list-product')->select('id')->first();
        $all_user_permissions = Auth::user()->permissions()->pluck('id');

        $can['list-product']= true;
        // $can['update-product']= $all_user_permissions->contains($permission->id);
        session()->put('can', $can);
        // dd(session()->get('can'));

        // if (! $all_user_permissions->contains($permission->id) ){ abort(403);  }

        return view('users.admin.stock.stock-list');
        
      }

      public function adminAddstock(){

        return view('users.admin.stock.stock-add');
        
        }

     // categories area--------------------------------------
 
      public function adminCategoriesList(){

        return view('users.admin.categories.categories-list');
        
      }

      public function adminAddCategory(){

        return view('users.admin.categories.category-add');
        
        }

     // subcategories area--------------------------------------

      public function adminSubcategoriesList(){

        return view('users.admin.subcategories.subcategories-list');
        
      }

      public function adminAddSubcategory(){

        return view('users.admin.subcategories.subcategory-add');
        
        }
     
     // users area--------------------------------------

     public function adminManageUsers(){

    return view('users.admin.roles.users-list');
    
    }

    public function adminAddUser(){

      return view('users.admin.users.user-add');
      
    }
     // shops area---------------------------------------

     public function adminManageShops(){

    return view('users.admin.shops.shops-list');
    
    }
     public function adminShopAdd(){

    return view('users.admin.shops.shop-add');
    
    }


    // products area------------------------------------------

     public function adminManageProducts(){

    return view('users.admin.products.products-list');
    
    }
     public function adminAddProduct(){

    return view('users.admin.products.product-add');
    
    }


    //  Compaign area--------------------------------------
    
      public function adminManageCompaigns(){

        return view('users.admin.compaigns.compaigns-list');
        
        }

    // orders area--------------------------------------
    
      public function adminManageOrders(){

        return view('users.admin.orders.orders-list');
        
        }

    // coupons area--------------------------------------

      public function adminManageCoupons(){

        return view('users.admin.coupons.coupons-list');
        
      }
      public function adminAddCoupon(){

        return view('users.admin.coupons.coupon-add');
        
      }
    // taxes area--------------------------------------

      public function adminManageTaxes(){

        return view('users.admin.taxes.taxes-list');
        
      }

      public function adminAddTax(){

        return view('users.admin.taxes.tax-add');
        
      }

    // analytics area--------------------------------------

    public function adminManageAnalytics(){

      return view('users.admin.analytics.analytics-list');
      
      }

    // notifications area--------------------------------------

      public function adminManageNotifications(){

          return view('users.admin.roles.notifications-list');
          
          }
      public function adminNotificationForm(){

        return view('users.admin.roles.notification-form');
        
        }
      public function adminNotificationSend(Request $request){

      // put email validation
      // search user to notify $user=User::where('email', $request->email)
      
        $user=Auth::user(); 
      $data=[
        'subject'=>$request->subject,
        'message'=>$request->message,
        'language'=>$request->language,
      ];
        $inf=$user->notify(new MessageNotification($data));
        

        return redirect()->back()->with('success', 'message sent to '.$request->email);
        
        }

        // admin profile area--------------------------------------

        public function adminManageProfile(){

          return view('users.admin.roles.admin-profile');
          
          }
}
