<?php

namespace Tests;

use DOMXPath;
use DOMDocument;
use DOMNodeList;
use Illuminate\Testing\TestResponse;
use Symfony\Component\CssSelector\CssSelectorConverter;
use Illuminate\Support\Str;
use Illuminate\Testing\Assert as PHPUnit;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();

        TestResponse::macro('getSelectorContents', function (string $selector): DOMNodeList
        {
            $dom = new DOMDocument();

            @$dom->loadHTML(
                mb_convert_encoding($this->getContent(), 'HTML-ENTITIES', 'UTF-8'),
                LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
            );

            $converter = new CssSelectorConverter();
            $xpathSelector = $converter->toXPath($selector);

            $xpath = new DOMXPath($dom);
            $elements = $xpath->query($xpathSelector);

            return $elements;
        });

        TestResponse::macro('assertSelectorContains', function (string $selector, string $value) {
            $selectorContents = $this->getSelectorContents($selector);

            if (empty($selectorContents)) {
                PHPUnit::fail("The selector '{$selector}' was not found in the response.");
            }

            foreach ($selectorContents as $element) {
                if (Str::contains($element->textContent, $value)) {
                    PHPUnit::assertTrue(true);

                    return $this;
                }
            }

            PHPUnit::fail("The selector '{$selector}' did not contain the value '{$value}'.");

            return $this;
        });
    }
}
