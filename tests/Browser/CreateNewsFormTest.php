<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateNewsForm extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testNewsCreation()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->type('@title', 'Consectetur quia nulla consectetur')
                ->type('@description', 'Consectetur quia nulla consectetur praesentium aliquid eveniet autem.')
                ->type('@text', 'Consectetur quia nulla consectetur praesentium aliquid eveniet autem. Ad praesentium voluptates consectetur quas maiores autem Nostrum doloribus provident architecto sapiente consequuntur minus at voluptatum dolore molestiae illo? Aliquid ullam magnam!')
                ->select('@category_id')
                ->select('@source_id')
                ->press('@create')
                ->assertPathIs('/admin/news/create')
                ->assertSeeIn('@createMsg', __('newsCreateForm.newsIsCreated'));
        });
    }

    public function testNewsCreationFail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->assertSee(__('newsCreateForm.pageTitle'))
                ->press('@create')
                ->assertPathIs('/admin/news/create')
                ->assertSeeAnythingIn('@error');
        });
    }

    public function testClickingLinks()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->assertSeeIn('@backLink', __('newsCreateForm.back'))
                ->clickLink(__('newsCreateForm.back'))
                ->assertPathIs('/admin/news')
                ->assertSee('Панель администратора');
        });
    }

    public function testAttributes()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->assertAttribute('@form', 'method', 'post')
                ->assertAttribute('@form', 'action', route('admin::news::create'))
                ->assertAttribute('[type="hidden"]', 'name', '_token')
                ->assertAttribute('@title', 'name', 'title')
                ->assertAttribute('@title', 'type', 'text')
                ->assertAttribute('@description', 'name', 'description')
                ->assertAttribute('@description', 'type', 'text')
                ->assertAttribute('@text', 'name', 'text')
                ->assertAttribute('@category_id', 'name', 'category_id')
                ->assertAttribute('@source_id', 'name', 'source_id')
                ->assertAttribute('@create', 'name', 'create')
                ->assertAttribute('@create', 'type', 'submit');
        });
    }

}

