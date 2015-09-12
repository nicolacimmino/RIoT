<?php namespace tests\Middleware\RIoT;


use app\Http\Middleware\RIoT\CopperNuggetValidator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;

class CopperNuggetValidatorTest extends \TestCase
{
    /**
     * @dataProvider handleTestDataProvider
     */
    public function testHandle($nugget)
    {
        Request::shouldReceive('get')->once()->andReturn(["nugget" => 123]);

        $copperNuggetValidator = App::make(CopperNuggetValidator::class);

        $copperNuggetValidator->handle(App::make(Request::class));

    }

    public function handleTestDataProvider()
    {
        return [
            ["test"]
        ];
    }
}