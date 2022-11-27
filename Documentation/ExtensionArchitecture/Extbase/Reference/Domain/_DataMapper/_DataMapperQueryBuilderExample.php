<?php

declare(strict_types=1);

use T3docs\BlogExample\Domain\Model\Blog;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper;
use TYPO3\CMS\Extbase\Persistence\Repository;

final class SomeRepository extends Repository
{
    public function __construct(
        protected readonly DataMapper $dataMapper,
        protected readonly ConnectionPool $connectionPool,
        // ...
    ) {
        parent::__construct();
    }

    public function mapRecordsFromQueryBuilder(): array
    {
        $tableName = 'tx_blogexample_domain_model_blog';
        $queryBuilder = $this->connectionPool->getQueryBuilderForTable($tableName);
        $result = $queryBuilder
            ->select('*')
            ->from($tableName)
            ->setMaxResults(10)
            ->executeQuery();
        return $this->dataMapper->map(Blog::class, $result->fetchAllAssociative());
    }
}
