<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class GalleryPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_gallery_page_renders_with_empty_database(): void
    {
        $this->get('/galeri')
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Gallery/Index')
                ->has('gallery', 0));
    }

    public function test_homepage_gallery_props_dynamic_only(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Home/Index')
                ->has('gallery', 0));
    }
}
