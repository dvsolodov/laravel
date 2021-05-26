<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    News,
    Category,
    Source
};
use App\Jobs\GetNewsJob;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function parseAll()
    {
        $sources = (new Source())->all();

        foreach ($sources as $source) {
            GetNewsJob::dispatch($source);
        }

        return redirect()->route('admin::news::show::all');
    }

}
