<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Seller\Product;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('id', __('Id'));
        $grid->column('product_image', __('Product image'));
        $grid->column('product_name', __('Product name'));
        $grid->column('category_id', __('Category id'));
        $grid->column('user_id', __('User id'));
        $grid->column('product_description', __('Product description'));
        $grid->column('product_price', __('Product price'));
        $grid->column('product_color', __('Product color'));
        $grid->column('product_brand', __('Product brand'));
        $grid->column('product_model', __('Product model'));
        $grid->column('origin_country', __('Origin country'));
        $grid->column('stock', __('Stock'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('deleted_at', __('Deleted at'));

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
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('product_name', __('Product name'));
        $show->field('category_id', __('Category id'));
        $show->field('user_id', __('User id'));
        $show->field('product_description', __('Product description'));
        $show->field('product_price', __('Product price'));
        $show->field('product_color', __('Product color'));
        $show->field('product_brand', __('Product brand'));
        $show->field('product_model', __('Product model'));
        $show->field('origin_country', __('Origin country'));
        $show->field('stock', __('Stock'));
        $show->field('product_image', __('Product image'));
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
        $form = new Form(new Product());

        $form->text('product_name', __('Product name'));
        $form->number('category_id', __('Category id'));
        $form->number('user_id', __('User id'));
        $form->textarea('product_description', __('Product description'));
        $form->decimal('product_price', __('Product price'));
        $form->text('product_color', __('Product color'));
        $form->text('product_brand', __('Product brand'));
        $form->text('product_model', __('Product model'));
        $form->text('origin_country', __('Origin country'));
        $form->number('stock', __('Stock'));
        $form->text('product_image', __('Product image'));

        return $form;
    }
}
