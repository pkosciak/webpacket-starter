<?php
/**
 * Test methods related to view layer
 *
 * @package Webpacket
 */

namespace Unit;
use App\Core\View;
use App\Exceptions\Core\ViewNotFoundException;
use WP_UnitTestCase;

class ViewTest extends WP_UnitTestCase
{

    public function test_view_not_found_exception()
    {
        $view = new View();

        $this->expectException(ViewNotFoundException::class);
        $view->render('notexistent');
    }
}
