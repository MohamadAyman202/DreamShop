<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create roles
        $roleSuperAdmin = Role::create(['guard_name' => 'admin', 'name' => 'superadmin']);
        $roleVendor = Role::create(['guard_name' => 'admin', 'name' => 'vendor']);

        // Permissions list
        $permissions = [

            'dashboard.view',

            'category.view',
            'category.create',
            'category.edit',
            'category.delete',

            'subcategory.view',
            'subcategory.create',
            'subcategory.edit',
            'subcategory.delete',
            'brand.view',
            'brand.create',
            'brand.edit',
            'brand.delete',
            'attribute.view',
            'attribute.create',
            'attribute.edit',
            'attribute.delete',
            'tax_rule.view',
            'tax_rule.create',
            'tax_rule.edit',
            'tax_rule.delete',
            'shipping_rule.view',
            'shipping_rule.create',
            'shipping_rule.edit',
            'shipping_rule.delete',
            'product_collection.view',
            'product_collection.create',
            'product_collection.edit',
            'product_collection.delete',
            'bundle_deal.view',
            'bundle_deal.create',
            'bundle_deal.edit',
            'bundle_deal.delete',
            'voucher.view',
            'voucher.create',
            'voucher.edit',
            'voucher.delete',
            'product.view',
            'product.create',
            'product.edit',
            'product.delete',
            'flash_sale.view',
            'flash_sale.create',
            'flash_sale.edit',
            'flash_sale.delete',
            'order.view',
            'order.delete',
            'order.edit',
            'rating_review.view',
            'rating_review.delete',
            'user.view',
            'user.create',
            'user.edit',
            'user.delete',
            'subscriber.view',
            'subscriber.delete',
            'subscription_email_format.view',
            'subscription_email_format.create',
            'subscription_email_format.edit',
            'subscription_email_format.delete',
            'role.view',
            'role.create',
            'role.edit',
            'role.delete',
            'admin.view',
            'admin.create',
            'admin.edit',
            'admin.delete',

            'page.view',
            'page.create',
            'page.edit',
            'page.delete',
            'home_slider.view',
            'home_slider.create',
            'home_slider.edit',
            'home_slider.delete',
            'banner.view',
            'banner.create',
            'banner.edit',
            'banner.delete',
            'site_setting.view',
            'site_setting.edit',
            'footer_link.view',
            'footer_link.create',
            'footer_link.edit',
            'footer_link.delete',
            'setting.view',
            'setting.edit',
            'profile.view',
            'profile.edit',
            'message.view',
            'message.delete',
            'withdrawal_account.view',
            'withdrawal_account.create',
            'withdrawal_account.edit',
            'withdrawal_account.delete',
            'store.view',
            'store.create',
            'store.edit',
            'store.delete',
            'withdrawal_request.view',
            'withdrawal_request.create',
            'withdrawal_request.approve',
            'withdrawal_request.cancel',
            'withdrawal_request.delete',
        ];

        // Assign permissions
        foreach ($permissions as $key => $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'admin']);
        }
    }
}
