<?php
/**
 * Test methods related to view layer
 *
 * @package Webpacket
 */

namespace Unit;
use Webpacket\Core\View;
use Webpacket\Exceptions\Core\ViewNotFoundException;
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
