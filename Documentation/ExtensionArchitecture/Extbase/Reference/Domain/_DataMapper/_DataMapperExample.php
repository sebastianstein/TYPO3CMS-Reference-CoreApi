<?php

declare(strict_types=1);

use T3docs\BlogExample\Domain\Model\Blog;
use TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper;
use TYPO3\CMS\Extbase\Persistence\Repository;

final class SomeRepository extends Repository
{
    public function __construct(
        protected readonly DataMapper $dataMapper,
        // ...
    ) {
        parent::__construct();
    }

    public function mapExampleData(): Blog
    {
        $properties = [
            'pid' => 123,
            'title' => 'My Blog',
            'description' => 'Lorem Impsum Dolor'
        ];
        $myBlogs = $this->dataMapper->map(Blog::class, [$properties]);
        return $myBlogs[0];
    }

    public function mapExampleDataManually(): Blog
    {
        $properties = [
            'pid' => 123,
            'title' => 'My Blog',
            'description' => 'Lorem Impsum Dolor'
        ];
        $myBlog = new Blog();
        $myBlog->setPid($properties['pid']);
        $myBlog->setTitle($properties['title']);
        $myBlog->description = $properties['description'];
        return $myBlog;
    }
}
