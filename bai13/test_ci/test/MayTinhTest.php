<?php
namespace Test;

use PHPUnit\Framework\TestCase;
use App\MayTinh;
class MayTinhTest extends TestCase
{
    public function testSum1()
    {
        $objMayTinh = new MayTinh();
        $your_output = $objMayTinh->sum( 2, 3 );
        $expected_output = 5;
        $this->assertEquals( $your_output,$expected_output );
    }

    public function testSum2()
    {
        $objMayTinh = new MayTinh();
        $your_output = $objMayTinh->sum( 100, 1000 );
        $expected_output = 1100;
        $this->assertEquals( $your_output,$expected_output );
    }
}
