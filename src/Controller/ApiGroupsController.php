<?php

declare(strict_types=1);

namespace Fop\Core\Controller;

use Nette\Utils\DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ApiGroupsController extends AbstractController
{
    /**
     * @var mixed[]
     */
    private array $groups = [];

    public function __construct(array $groups)
    {
        $this->groups = $groups;
    }

    /**
     * Note: beware the dot in the route name! @see https://github.com/symfony/symfony/issues/26099
     * @Route(path="api/groups.json", name="api_groups_json", methods={"GET"})
     */
    public function __invoke(): Response
    {
        $generatedAt = DateTime::from('now')->format('Y-m-d H:i:s');

        return $this->json([
            'generated_at' => $generatedAt,
            'group_count' => count($this->groups),
            'groups' => $this->groups,
        ]);
    }
}
