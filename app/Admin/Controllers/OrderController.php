<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\User\Order;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'));
        $grid->column('product_id', __('Product id'));
        $grid->column('seller_id', __('Seller id'));
        $grid->column('quantity', __('Quantity'));
        $grid->column('status', __('Status'));
        $grid->column('payment_status', __('Payment status'));
        $grid->column('payment_method', __('Payment method'));
        $grid->column('deleted_at', __('Deleted at'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));

        $show->field('user_id', __('User id'));
        $show->field('product_id', __('Product id'));
        $show->field('seller_id', __('Seller id'));
        $show->field('quantity', __('Quantity'));
        $show->field('status', __('Status'));
        $show->field('payment_status', __('Payment status'));
        $show->field('payment_method', __('Payment method'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Order());

        $form->text('user_id', __('User id'));
        $form->text('product_id', __('Product id'));
        $form->text('seller_id', __('Seller id'));
        $form->number('quantity', __('Quantity'))->default(1);
        $form->select('payment_method', __('Payment Method'))->options(['Khalti','COD'])->default('COD');
        $form->select('status', __('Payment Status'))->options(['pending', 'processing', 'shipped', 'delivered', 'cancelled'])->default('pending');
        $form->select('payment_status', __('Payment method'))->options(['unpaid', 'paid'])->default('unpaid');

        return $form;
    }
}
