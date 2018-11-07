<?php

namespace App\Tests\Domain\Model;


use PHPUnit\Framework\TestCase;
use App\Domain\Model\Article;

class ArticleTest extends TestCase
{
    public function testConstruct() {
        $article = new Article('Toto');

        static::assertSame(
            'Toto',
            $article->getArticle()
        );
    }

    public function testItReturnAnEmptyString() {
        $article = new Article('');
        static::assertSame(
            '',
            $article->getArticle()
        );
    }
}